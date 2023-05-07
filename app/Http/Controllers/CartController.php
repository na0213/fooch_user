<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderHistory;
use App\Models\ProductImage;
use App\Models\Store;
use App\Models\Payment;
use App\Services\CartService;
use App\Models\ShippingPattern;
use App\Mail\ThanksMail;
use App\Mail\OrderedMail;

class CartController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $prefecture = $user->prefecture; // ユーザーの都道府県情報を取得
        $cartItems = Cart::where('user_id', Auth::id())->get();
    
        $displayItems = [];
        $totalPrice = 0;
        $totalShippingFee = 0;
    
        foreach ($cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem->product_id);
            $quantity = $cartItem->quantity;
            $shippingPattern = $product->shipping_patterns_id ? ShippingPattern::findOrFail($product->shipping_patterns_id) : null;
            $shippingFee = $shippingPattern ? $shippingPattern->calculateShippingFee($prefecture) : 0;
    
            $firstImage = $product->productImages->first();

            $displayItems[] = [
                'product' => $product,
                'quantity' => $quantity,
                'shipping_fee' => $shippingFee,
                'image' => $firstImage ? $firstImage->image : null
            ];
    
            $totalPrice += $product->price * $quantity;
            $totalShippingFee += $shippingFee;
        }

        return view('cart.index', [
            'display_items' => $displayItems,
            'total_price' => $totalPrice,
            'total_shipping_fee' => $totalShippingFee,
        ]);
    }

    public function show()
    {
        $user = User::findOrFail(Auth::id());
        $prefecture = $user->prefecture; // ユーザーの都道府県情報を取得
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $defaultCard = Payment::getDefaultcard($user);
    
        $displayItems = [];
        $totalPrice = 0;
        $totalShippingFee = 0;
    
        foreach ($cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem->product_id);
            $quantity = $cartItem->quantity;
            $shippingPattern = $product->shipping_patterns_id ? ShippingPattern::findOrFail($product->shipping_patterns_id) : null;
            $shippingFee = $shippingPattern ? $shippingPattern->calculateShippingFee($prefecture) : 0;
    
            $firstImage = $product->productImages->first();

            $displayItems[] = [
                'product' => $product,
                'quantity' => $quantity,
                'shipping_fee' => $shippingFee,
                'image' => $firstImage ? $firstImage->image : null
            ];
    
            $totalPrice += $product->price * $quantity;
            $totalShippingFee += $shippingFee;
        }

        return view('cart.show', [
            'display_items' => $displayItems,
            'total_price' => $totalPrice,
            'total_shipping_fee' => $totalShippingFee,
            'user' => $user,
            'default_card' => $defaultCard,
        ]);
    }

    public function destroyShippingAddress($id)
    {
        $user = User::findOrFail(Auth::id());
        $shipping_address = $user->shipping_address()->where('id', $id)->firstOrFail();

        $shipping_address->delete();

        return redirect()->back()->with('success', '配送先住所を削除しました。');
    }


    // カート追加
    public function add(Request $request)
    {
        // dd($request);
        // $userinfos = User::findOrFail(Auth::id());
        $itemInCart = Cart::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())->first();

        if($itemInCart){
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
        // dd('test');
        return redirect()->route('cart.index');
    }

    // カート削除
    public function delete($id)
    {
        Cart::where('product_id', $id)
        ->where('user_id', Auth::id())
        ->delete();

        return redirect()->route('cart.index');
    }

    public function getShippingFee($prefecture)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalShippingFee = 0;

        foreach ($cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem->product_id);
            $shippingPattern = $product->shipping_patterns_id ? ShippingPattern::findOrFail($product->shipping_patterns_id) : null;
            $shippingFee = $shippingPattern ? $shippingPattern->calculateShippingFee($prefecture) : 0;

            $totalShippingFee += $shippingFee;
        }

        return response()->json(['shipping_fee' => $totalShippingFee]);
    }


    // Stripe決済
    public function checkout(Request $request)
{
    $user = User::findOrFail(Auth::id());
    $prefecture = $user->prefecture;// ユーザーの都道府県情報を取得
    $cartItems = Cart::where('user_id', Auth::id())->get();

    $lineItems = [];
    $totalPrice = 0;
    $shippingFeeTotal = 0;

    foreach ($cartItems as $cartItem) {
        $product = Product::findOrFail($cartItem->product_id);
        $quantity = $cartItem->quantity;

        // 在庫確認
        $stockQuantity = Stock::where('product_id', $product->id)->sum('quantity');
        if ($quantity > $stockQuantity) {
            return view('user.cart');
        }

        // 商品の合計金額を計算
        $productPrice = $product->price * $quantity;

        // 商品の送料を計算
        $shippingPattern = $product->shipping_patterns_id ? ShippingPattern::findOrFail($product->shipping_patterns_id) : null;
        $shippingFee = $shippingPattern ? $shippingPattern->calculateShippingFee($prefecture) : 0;
        $shippingFeeTotal += $shippingFee;

        $lineItems[] = [
            'name' => $product->name,
            'description' => $product->info,
            'amount' => $product->price,
            'currency' => 'jpy',
            'quantity' => $quantity,
        ];

        // 在庫を減らす
        Stock::create([
            'product_id' => $product->id,
            'type' => \Constant::PRODUCT_LIST['reduce'],
            'quantity' => $quantity * -1
        ]);
    }

    // 追加: 送料を lineItems に追加
    if ($shippingFeeTotal > 0) {
        $lineItems[] = [
            'name' => '送料',
            'description' => '送料',
            'amount' => $shippingFeeTotal,
            'currency' => 'jpy',
            'quantity' => 1,
        ];
    }

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [$lineItems],
        'mode' => 'payment',
        'success_url' => route('cart.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('cart.cancel'),
    ]);

    $publicKey = env('STRIPE_PUBLIC_KEY');

    return view('cart.checkout', compact('session', 'publicKey'));
}

public function success(Request $request)
{
    $total_price = $request->input('total_price');
    $user = User::findOrFail(Auth::id());
    $cartItems = Cart::where('user_id', Auth::id())->get();

    $purchasedItems = [];
    $shippingFeeTotal = 0;

    foreach ($cartItems as $cartItem) {
        $product = Product::findOrFail($cartItem->product_id);
        $quantity = $cartItem->quantity;
        // 商品の合計金額を計算
        $productPrice = $product->price * $quantity;

        // 商品の送料を計算
        $shippingPattern = $product->shipping_patterns_id ? ShippingPattern::findOrFail($product->shipping_patterns_id) : null;
        $shippingFee = $shippingPattern ? $shippingPattern->calculateShippingFee($user->prefecture) : 0;
        $shippingFeeTotal += $shippingFee;
        
        // 商品情報を配列に追加
        $purchasedItems[] = [
            'product' => $product,
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $product->price,
            'store_email' => $product->store->email,
            'owner_email' => $product->store->owner->email,
            'store_name' => $product->store->name,
            'shipping_fee' => $shippingFee
        ];
            // Orderテーブルに保存
        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'store_id' => $product->store_id,
            'quantity' => $quantity,
            'price' => $product->price,
            'total_price' => $productPrice,
            'shipping_fee' => $shippingFeeTotal,
            'order_status' => 'prior',
            'shipping_name' => $user->name,
            'shipping_zipcode' => $user->zipcode,
            'shipping_prefecture' => $user->prefecture,
            'shipping_city' => $user->city,
            'shipping_tel' => $user->tel,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $order_history = new OrderHistory([
            'status' => 'prior',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $order->orderHistories()->save($order_history);
    }

    $shipping_address = [
        'name' => $user->name,
        'zipcode' => $user->zipcode,
        'prefecture' => $user->prefecture,
        'city' => $user->city,
        'tel' => $user->tel
    ];

    //userへ購入完了メール
    \Mail::to($user->email)->send(new ThanksMail($user, $purchasedItems, $shipping_address));
    //ownerへ注文メール
    foreach ($purchasedItems as $item) {
        \Mail::to($item['owner_email'])->send(new OrderedMail($item, $user, $shipping_address));
    }

    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('cart.index');
}

public function cancel()
{
    $user = User::findOrFail(Auth::id());

    //在庫を戻す
    foreach($user->products as $product){
        Stock::create([
            'product_id' => $product->id,
            'type' => \Constant::PRODUCT_LIST['add'],
            'quantity' => $product->pivot->quantity
        ]);
    }
    return redirect()->route('cart.index');
}

}

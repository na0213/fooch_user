<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Category;
use App\Models\Exclusion;

use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;

class TopController extends Controller
{
    public function welcome(Request $request)
    {
        // SendThanksMail::dispatch();
        $categories = Category::all();
        // $categories = config('category');
        $exclusions = Exclusion::all(); 
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate(8);

        return view('welcome', compact('products','categories','exclusions'));
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        // $categories = config('category');
        $exclusions = Exclusion::all(); 
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate(20);

        return view('top.index', compact('products','categories','exclusions'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        // $categories = config('category');
        $exclusions = Exclusion::all(); 

        $product_images = ProductImage::where('product_id', $id)
        ->orderBy('sort_num', 'asc')
        ->get();

        $imagearray = array();
        foreach($product_images as $image){
            $image = $image->image;

            $imagearray[] = $image;
        }

        $stockQuantity = Stock::where('product_id', $product->id)->sum('quantity');
        $maxPurchaseQuantity = $product->max_purchase_quantity;
        // 在庫数とmax_purchase_quantityの小さい方を選択肢として表示する
        $quantity = min($stockQuantity, $maxPurchaseQuantity);

        if($quantity > 9){
            $quantity = 9;
        }

        return view('top.show', compact('product','categories','quantity','product_images', 'imagearray','exclusions'));
    }

    public function store(Request $request, Store $store)
    {
        $categories = Category::all();
        // $categories = config('category');
        $exclusions = Exclusion::all(); 
        $products = Product::availableItems($request->exclusion_id)
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->where('product_stores.id', $store->id) // この条件を追加
            ->paginate(20);
    
        return view('top.store', compact('store', 'products','categories','exclusions'));
    }  
    // public function store(Store $store)
    // {
    //     return view('top.store', compact('store'));
    // }

    public function specificBusinessTransaction(Store $store)
    {
        $specificBusinessTransaction = $store->specificBusinessTransaction;
    
        if (!$specificBusinessTransaction) {
            abort(404, 'Specific Business Transaction not found');
        }
    
        return view('top.specific-business-transaction', compact('specificBusinessTransaction'));
    }

    public function ownercontact()
    {
        return view('top.owner_contact');
    }
    public function sendOwnerContact(Request $request)
    {
        $data = $request->validate([
            'terms' => ['required', 'accepted'],
            'name' => 'required|max:255',
            'email' => 'required|email',
            'body' => 'nullable|string|max:500'
            // 'body' => 'required',
        ]);
    
        // 管理者へのメール送信
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->subject('出店希望');
        });
        
        // オーナーへの確認メール送信
        Mail::send('emails.confirmation', $data, function ($message) use ($data) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->to($data['email'], $data['name']);
            $message->subject('出店希望を受け付けました');
            // $message->subject('出店希望の確認: '.$data['name']);
        });

        return redirect()->route('top.owner_contact')
        ->with([
            'message' => 'メッセージが送信されました。登録が完了するまでお待ちください。',
            'status' => 'info'
        ]);
    }

    public function foochfaq()
    {
        return view('top.fooch_faq');
    }
    public function faq100()
    {
        return view('top.faq.faq100');
    }
    public function faq101()
    {
        return view('top.faq.faq101');
    }
    public function faq102()
    {
        return view('top.faq.faq102');
    }
    public function faq103()
    {
        return view('top.faq.faq103');
    }
    public function faq104()
    {
        return view('top.faq.faq104');
    }
    public function faq105()
    {
        return view('top.faq.faq105');
    }
    public function faq106()
    {
        return view('top.faq.faq106');
    }
    public function faq107()
    {
        return view('top.faq.faq107');
    }
    public function faq200()
    {
        return view('top.faq.faq200');
    }
    public function faq201()
    {
        return view('top.faq.faq201');
    }
    public function faq202()
    {
        return view('top.faq.faq202');
    }
    public function faq203()
    {
        return view('top.faq.faq203');
    }
    public function faq204()
    {
        return view('top.faq.faq204');
    }
    public function faq205()
    {
        return view('top.faq.faq205');
    }
    public function faq206()
    {
        return view('top.faq.faq206');
    }
    public function faq207()
    {
        return view('top.faq.faq207');
    }
    public function faq208()
    {
        return view('top.faq.faq208');
    }
    public function faq209()
    {
        return view('top.faq.faq209');
    }
    public function faq210()
    {
        return view('top.faq.faq210');
    }
    public function faq211()
    {
        return view('top.faq.faq211');
    }
    public function faq212()
    {
        return view('top.faq.faq212');
    }
    public function faq213()
    {
        return view('top.faq.faq213');
    }
    public function faq214()
    {
        return view('top.faq.faq214');
    }
    public function faq215()
    {
        return view('top.faq.faq215');
    }
    public function faq216()
    {
        return view('top.faq.faq216');
    }
    public function faq217()
    {
        return view('top.faq.faq217');
    }
    public function faq218()
    {
        return view('top.faq.faq218');
    }
    public function faq219()
    {
        return view('top.faq.faq219');
    }

    public function whatis()
    {
        return view('top.whatis');
    }

    public function terms()
    {
        return view('terms');
    }

    public function legal()
    {
        return view('legal');
    }

    public function privacy()
    {
        return view('privacy');
    }
    public function about()
    {
        return view('about');
    }
}

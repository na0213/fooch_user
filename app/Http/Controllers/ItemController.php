<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Owner;
use App\Models\Store;
use App\Models\Order;
use App\Models\Category;
use App\Models\Exclusion;
use App\Models\ShippingPattern;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('item');
            if(!is_null($id)){
                $itemId = Product::availableItems($request->exclusion_id)
                ->where('products.id', $id)->exists();
                  if(!$itemId){
                      abort(404);
                    }
            }
        return $next($request);
        });
    }

    public function index(Request $request)
    {
        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate(20);
        // ->paginate($request->pagination ?? '20');

        // 実行されるクエリを表示
        \Log::debug('Query: ', ['query' => Product::availableItems($request->exclusion_id)->toSql()]);

        return view('items.index', compact('products','categories','exclusions'));
    }

    public function show($id)
    {
        $user = Auth::user(); // ログインユーザーを取得
        $user_prefecture = $user->prefecture; // ユーザーの都道府県を取得
        $product = Product::with('shipping_pattern')->findOrFail($id);
        $categories = config('category');
        $exclusions = config('exclusion');

        $product_images = ProductImage::where('product_id', $id)
        ->orderBy('sort_num', 'asc')
        ->get();

        $imagearray = array();
        foreach($product_images as $image){
            $image = $image->image;

            $imagearray[] = $image;
        }

        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        if($quantity > 9){
            $quantity = 9;
        }

        return view('items.show', compact('product','categories','quantity','product_images', 'imagearray','exclusions', 'user_prefecture'));
    }

    public function favorite(Request $request, Product $product)
    {
        $isFavorite = $product->isFavoriteBy($request->user());
    
        $isFavorite ? $product->favorites()->detach($request->user()) : $product->favorites()->attach($request->user());
    
        $favoritesCount = $product->favorites()->count();
    
        return ['isFavorite' => !$isFavorite, 'favoritesCount' => $favoritesCount];
    }    

    public function favorites(Request $request)
    {
        $products = Product::availableItems($request->exclusion_id)
            ->whereHas('favorites', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->paginate($request->pagination ?? '20');
            
        $categories = config('category');
        $exclusions = config('exclusion');
        
        return view('items.favorites', compact('products', 'categories', 'exclusions'));
    }

}

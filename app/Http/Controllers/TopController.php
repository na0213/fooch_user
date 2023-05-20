<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Stock;
use App\Models\Store;

class TopController extends Controller
{
    public function welcome(Request $request)
    {
        // SendThanksMail::dispatch();

        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '20');

        $products = $products->unique('id');


        return view('welcome', compact('products','categories','exclusions'));
    }

    public function index(Request $request)
    {
        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '20');

        $products = $products->unique('id');


        return view('top.index', compact('products','categories','exclusions'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
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

        return view('top.show', compact('product','categories','quantity','product_images', 'imagearray','exclusions'));
    }

    public function store(Store $store)
    {
        return view('top.store', compact('store'));
    }

    public function ownercontact()
    {
        return view('top.owner_contact');
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
}

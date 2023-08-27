<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;

class StoreController extends Controller
{
    public function show(Request $request, Store $store)
    {
        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->where('product_stores.id', $store->id) // この条件を追加
            ->paginate(20);
    
        return view('stores.show', compact('store', 'products','categories','exclusions'));
    }    

    public function specificBusinessTransaction(Store $store)
    {
        $specificBusinessTransaction = $store->specificBusinessTransaction;
    
        if (!$specificBusinessTransaction) {
            abort(404, 'Specific Business Transaction not found');
        }
    
        return view('stores.specific-business-transaction', compact('specificBusinessTransaction'));
    }
    
}

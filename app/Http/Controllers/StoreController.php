<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
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

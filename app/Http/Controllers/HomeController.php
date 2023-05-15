<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
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
        // SendThanksMail::dispatch();

        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '20');

        $products = $products->unique('id');


        return view('dashboard', compact('products','categories','exclusions'));
    }

    public function show(Request $request)
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


        return view('home.index', compact('products','categories','exclusions'));
    }
}

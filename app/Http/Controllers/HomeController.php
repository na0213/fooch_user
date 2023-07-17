<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
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
        $categories = config('category');
        $exclusions = config('exclusion');
        $products = Product::availableItems($request->exclusion_id)
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate(8);
        // ->paginate($request->pagination ?? '8');

        return view('dashboard', compact('products','categories','exclusions'));
    }

    public function show(Request $request)
    {
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
    public function foochfaq()
    {
        return view('home.fooch_faq');
    }
    public function faq100()
    {
        return view('home.faq.faq100');
    }
    public function faq101()
    {
        return view('home.faq.faq101');
    }
    public function faq102()
    {
        return view('home.faq.faq102');
    }
    public function faq103()
    {
        return view('home.faq.faq103');
    }
    public function faq104()
    {
        return view('home.faq.faq104');
    }
    public function faq105()
    {
        return view('home.faq.faq105');
    }
    public function faq106()
    {
        return view('home.faq.faq106');
    }
    public function faq107()
    {
        return view('home.faq.faq107');
    }
    
    public function whatis()
    {
        return view('home.whatis');
    }

    public function terms()
    {
        return view('home.terms');
    }

    public function legal()
    {
        return view('home.legal');
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function about()
    {
        return view('home.about');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('user');
            if(!is_null($id)){
                $userinfoUserId = User::findOrFail($id);
                $userinfoId = $userinfoUserId;
                $userId = Auth::id();
                if($userId !== $userinfoId){
                    abort(404);
                }
            }
        return $next($request);
        });
    }

    public function index()
    {
        $user = User::with('shipping_address')->findOrFail(Auth::id());

        return view('user.index', compact('user'));
    }

    public function edit($id) 
    {
        $users = User::findOrFail($id);

        return view('user.edit', compact('users'));
    }

    public function update(Request $request) {

        // dd($request);
        $users = User::findOrFail(Auth::id());

        $users->name = $request->name;
        $users->name_pronunciation = $request->name_pronunciation;
        $users->email = $request->email;
        $users->zipcode = $request->zipcode;
        $users->prefecture = $request->prefecture;
        $users->city = $request->city;
        $users->tel = $request->tel;
        $users->age = $request->age;
        $users->gender = $request->gender;
        $users->birth_year = $request->birth_year;
        $users->birth_month = $request->birth_month;
        $users->birth_day = $request->birth_day;

        $userinfos->save();

        return redirect()->route('user.index')
        ->with([
            'message' => '会員情報を更新しました',
            'status' => 'info'
        ]);
    }
}

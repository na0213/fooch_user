<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidDateException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('user');
            if(!is_null($id)){
                $userinfo = User::findOrFail($id);
                $userId = Auth::id();
                if($userId !== $userinfo->id){ // $userinfoId を $userinfo->id に変更
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
    // public function index()
    // {
    //     $user = User::findOrFail(Auth::id());

    //     return view('user.index', compact('user'));
    // }

    public function edit($id) 
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function editName()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.edit-name', compact('user'));
    }
    
    public function updateName(Request $request)
    {
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'user_name_pronunciation' => ['required', 'string', 'max:255'],
        ]);
    
        $user = User::findOrFail(Auth::id());
        $user->update([
            'name' => $request->user_name,
            'name_pronunciation' => $request->user_name_pronunciation,
        ]);
    
        return redirect()->route('user.index')
        ->with(['message' => '名前が更新されました。', 'status' => 'info']);
    }

    //メール
    public function editMail()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.edit-mail', compact('user'));
    }

    public function updateMail(Request $request)
    {
        $request->validate([
            'user_email' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update([
            'email' => $request->user_email,
        ]);

        return redirect()->route('user.index')
        ->with(['message' => 'メールアドレスが更新されました。', 
        'status' => 'info']);
    }

    //住所
    public function editAddress()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.edit-address', compact('user'));
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'zipcode' => ['required', 'string', 'max:7'],
            'prefecture' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update([
            'zipcode' => $request->zipcode,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
        ]);

        return redirect()->route('user.index')
        ->with(['message' => 'メールアドレスが更新されました。', 
        'status' => 'info']);
    }

    public function editTel()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.edit-tel', compact('user'));
    }

    public function updateTel(Request $request)
    {
        $request->validate([
            'user_tel' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update([
            'tel' => $request->user_tel,
        ]);

        return redirect()->route('user.index')
        ->with(['message' => 'メールアドレスが更新されました。', 
        'status' => 'info']);
    }

    //生年月日
    public function editBirth()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.edit-birth', compact('user'));
    }

    public function updateBirth(Request $request)
    {
        $request->validate([
            'birth_year' => 'required|integer|min:1900|max:' . date("Y"),
            'birth_month' => 'required|integer|min:1|max:12',
            'birth_day' => 'required|integer|min:1|max:31',
        ]);
    
        $user = User::findOrFail(Auth::id());
    
        $birth_year = $request->input('birth_year');
        $birth_month = $request->input('birth_month');
        $birth_day = $request->input('birth_day');
    
        try {
            $birthdate = Carbon::createSafe($birth_year, $birth_month, $birth_day);
        } catch (InvalidDateException $e) {
            return back()->with('birthdate_error', '正しい生年月日を入力してください。');
        }
    
        $now = Carbon::now();
        $age = $birthdate->diffInYears($now);
        if ($age < 18) {
            return back()->with('birthdate_error', '18歳未満の方は登録できません。');
        }
    
        $user->update([
            'birth_year' => $request->birth_year,
            'birth_month' => $request->birth_month,
            'birth_day' => $request->birth_day,
        ]);
    
        return redirect()->route('user.index')
        ->with(['message' => '生年月日が更新されました。', 
        'status' => 'info']);
    }

    public function confirmDelete($id)
    {
        $user = User::find($id);
        if ($user->carts->count() > 0 || $user->orders->where('order_status', '!=', 'completed')->count() > 0) {
            return redirect()->route('user.index')->with([
                'message' => 'カートに商品が残っているか、配送が完了していない商品があります。',
                'status' => 'alert',
            ]);
        }

        return view('user.confirmDelete', compact('user'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('welcome')->with([
            'message' => '退会しました。ご利用いただきありがとうございました。',
            'status' => 'alert',
        ]);
    }

    
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function check(Request $request): View
    {
        $request->validate([
            'terms' => ['required', 'accepted'],
            'name' => ['required', 'string', 'max:255'],
            'name_pronunciation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'zipcode' => ['required', 'string', 'max:7'],
            'prefecture' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:20'],
            'birth_year' => 'required|integer|min:1900|max:' . date("Y"),
            'birth_month' => 'required|integer|min:1|max:12',
            'birth_day' => 'required|integer|min:1|max:31',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $birth_year = $request->input('birth_year');
        $birth_month = $request->input('birth_month');
        $birth_day = $request->input('birth_day');

        try {
            $birthdate = Carbon::create($birth_year, $birth_month, $birth_day);
        } catch (Exception $e) {
            return back()->withErrors(['birthdate' => '正しい生年月日を入力してください。']);
        }
    
        $now = Carbon::now();
        $age = $birthdate->diffInYears($now);
        if ($age < 18) {
            return back()->withErrors(['birthdate' => '18歳未満の方は登録できません。']);
        }
        $request->flashOnly( 'name','name_pronunciation','email','tel','age','zipcode','city');
    
        $data = [
            'name' => $request->name,
            'name_pronunciation' => $request->name_pronunciation,
            'tel' => $request->tel,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'password' => $request->password, // ハッシュ化されていないパスワードを格納
            'email_verify_token' => base64_encode($request->email),
            'birth_year' => $request->birth_year,
            'birth_month' => $request->birth_month,
            'birth_day' => $request->birth_day,
        ];
    
        return view('auth.check', ['data' => $data]);
    }
    
    public function store(Request $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'name_pronunciation' => $request->name_pronunciation,
            'tel' => $request->tel,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'password' => Hash::make($request->password),// パスワードをハッシュ化
            'email_verify_token' => base64_encode($request->email),
            'birth_year' => $request->birth_year,
            'birth_month' => $request->birth_month,
            'birth_day' => $request->birth_day,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     // $request->authenticate();

    //     // $request->session()->regenerate();
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);
    
    //     $user = User::where('email', $request->email)->first();
    
    //     if ($user && $user->trashed()) {
    //         return back()->withErrors([
    //             'email' => 'The provided credentials are incorrect.',
    //         ]);
    //     }
    
    //     if (! Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
    //         return back()->withErrors([
    //             'email' => 'The provided credentials are incorrect.',
    //         ]);
    //     }
    
    //     session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

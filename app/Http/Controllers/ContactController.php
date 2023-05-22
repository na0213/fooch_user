<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use App\Mail\ContactAdminmail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'terms' => ['required', 'accepted'],
            'email' => ['required', 'email'],
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $inputs = $request->all();

        return view('contact.confirm', ['inputs' => $inputs,]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body'  => 'required'
        ]);

        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);
        } else {
            //メールを送信
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            // dd($inputs);
            \Mail::to(config('mail.admin_mail.address'))->send(new ContactAdminmail($inputs));

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('contact.thanks');
            
        }
    }

}

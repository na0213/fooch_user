<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return view('user.payment.index');
    }

    public function store(Request $request)
    {
        $token = $request->stripeToken;
        $user = \Auth::user();
        $ret = null;

        if ($token) {
            if (!$user->stripe_id) {
                $result = Payment::setCustomer($token, $user);

                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/user/payment/index')->withErrors($errors);
                }

            } else {
                $defaultCard = Payment::getDefaultcard($user);
                if (isset($defaultCard['id'])) {
                    Payment::deleteCard($user);
                }

                $result = Payment::updateCustomer($token, $user);

                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/user/payment/index')->withErrors($errors);
                }
            }
        } else {
            return redirect('/user/cart/index')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってみてください。');
        }
        return redirect('/user/cart/index')->with("success", "カード情報の登録が完了しました。");
    }

}

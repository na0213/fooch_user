<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $orders = Order::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

       return view('order.index', compact('orders','user'));
    }

    public function show(Order $order)
    {
        // ユーザーIDと注文のユーザーIDが一致するか確認
        if (Auth::id() != $order->user_id) {
            abort(403);
        }

        return view('order.show', compact('order'));
    }

    public function updateStatus(Order $order)
    {
        // ユーザーIDと注文のユーザーIDが一致するか確認
        if (Auth::id() != $order->user_id) {
            abort(403);
        }

        // ステータスが'shipped'の場合のみ更新
        if ($order->order_status == 'shipped') {
            $order->update(['order_status' => 'completed']);
        }

        return redirect()->route('order.show', $order->id)->with('status', '配送ステータスが更新されました');
    }
}

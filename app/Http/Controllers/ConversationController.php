<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\Conversation;
use App\Models\Message;
use App\Mail\MessageSent;

class ConversationController extends Controller
{
    public function show(Order $order)
    {
        $conversation = Conversation::where('order_id', $order->id)->first();

        $messages = [];
        if($conversation) {
            $messages = $conversation->messages()->orderBy('created_at', 'asc')->get();
        }

        return view('order.conversation', compact('messages', 'order', 'conversation'));
    }

    public function send(Request $request, Order $order)
    {
        if(auth()->id() !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $conversation = Conversation::firstOrCreate(
            ['order_id' => $order->id],
            ['user_id' => $order->user_id, 'store_id' => $order->store_id]
        );
    
        // 送信者のIDを設定
        $sender_id = auth()->id();
    
        // Messageを作成時、user_idに送信者のIDをセット
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => $sender_id,
            'message' => $request->message
        ]);
    
        if($sender_id === $order->user_id) {
            // $sownerから$storeOwnerに変更
            $storeOwner = $order->store->owner;
            // $ownerから$storeOwnerに変更
            Mail::to($storeOwner->email)->send(new MessageSent($message));
        }
    
        return redirect()->route('order.conversation', ['order' => $order->id]);
    }    

}

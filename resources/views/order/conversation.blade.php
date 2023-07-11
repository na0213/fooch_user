<x-app-layout>
<style>
  h1 {
      font-size: 70px;
      color: #FFF67F;
  }
  .title-font {
      font-size: 50px;
      color: #c9ccce;
  }
</style>
<div class="mb-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h1 class="text-start">M<span class="title-font">ESSAGE</h1>
      <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
        <p class="font-bold">【配達完了】になるとメッセージ画面は見れなくなります。</p>
        <p>発送遅延や予測外のトラブルが起こった場合などにご利用ください。</p>
      </div>
      <div class="flex flex-col space-y-4">
        @foreach ($messages as $message)
            <div class="{{ $message->store_id ? 'self-start' : 'self-end' }} w-2/3">
                <div class="{{ $message->store_id ? 'bg-blue-200' : 'bg-green-200' }} rounded p-2">
                    <p>{{ $message->message }}</p>
                </div>
                <p class="text-xs text-gray-500">{{ $message->created_at }}</p>
            </div>
        @endforeach
      </div>

    <form action="{{ route('conversation.send', ['order' => $order->id]) }}" method="POST" class="mt-8" onsubmit="return confirm('本当に送信しますか？')">
        @csrf
        <textarea name="message" class="w-full p-2 border rounded" placeholder="メッセージを入力..."></textarea>
        <div class="p-2 w-full flex justify-around mt-4">
        <button type="submit" class="bg-lyellow border-0 py-2 px-8 focus:outline-none hover:bg-yellow-400">送信</button>
        </div>
    </form>
  </div>
</div>
<div class="p-2 w-full flex justify-around mt-4">
  <button type="button" onclick="location.href='{{ route('order.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400">戻る</button>
</div>
</x-app-layout>
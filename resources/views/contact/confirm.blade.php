<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        お問い合わせ内容確認
    </h2>
</x-slot>
<div class="container">
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <div class="p-4 w-2/2 mx-auto">
            <div class="form-group mt-5">
                <label>メールアドレス</label>
                <p class="form-group">
                {{ $inputs['email'] }}
                </p>
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
            </div>
        </div>
        <div class="p-4 w-2/2 mx-auto">
            <div class="form-group mt-5">
                <label>タイトル</label>
                <p class="form-group">
                {{ $inputs['title'] }}
                </p>
                <input name="title" value="{{ $inputs['title'] }}" type="hidden">
            </div>
        </div>
        <div class="p-4 w-2/2 mx-auto">
            <div class="form-group mt-5">
                <label>お問い合わせ内容</label>
                <p class="form-group">
                {!! nl2br(e($inputs['body'])) !!}
                </p>
                <input name="body" value="{{ $inputs['body'] }}" type="hidden">
            </div>
        </div>
    
        <div class="text-center p-2  mt-2 mb-5">
        <button type="submit" name="action" value="back" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">
            入力内容修正
        </button>
        <button type="submit" name="action" value="submit" class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">
            送信する
        </button>
        </div>
    </form>
</div>
</x-app-layout>
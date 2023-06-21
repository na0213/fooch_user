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
        <h1 class="text-start">C<span class="title-font">ONTACT</h1>
        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf
            {{-- <div class="p-2 w-2/2 mx-auto">
                <label for="additives" class="leading-7 text-sm text-gray-600">お名前</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
            </div> --}}
            <div class="p-2 w-2/2 mx-auto">
                <label for="additives" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="p-2 w-2/2 mx-auto">
                <label for="additives" class="leading-7 text-sm text-gray-600">タイトル</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @if ($errors->has('title'))
                <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="p-2 w-2/2 mx-auto">
                <label for="additives" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                <textarea name="body" rows="10" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </div>

            <div class="text-center p-2  mt-2 mb-5">
            <button type="submit" class="text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-700 rounded text-lg">
                入力内容確認
            </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
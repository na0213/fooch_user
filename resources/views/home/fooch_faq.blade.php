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
    #exclusions label {
        display: block;
        float: left;
        width: 150px;
        cursor: pointer;
        margin: 0 0 20px 30px;
    }
    input[type=checkbox] {
        transform: scale(1.5);
        margin: 0 15px 0 0;
    }
    .search-button {
        clear: both;
    }
</style>
<div class="mb-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-start">F<span class="title-font">AQ</h1>
    </div>
</div>
<div class="container mx-auto my-2 px-4">
    <div class="flex py-8 px-6 md:flex">
      <div class="w-1/2">
        <button id="userButton" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-lyellow text-xs md:text-base">購入者様向け</button>
      </div>
    </div>
    <div id="userFaq" style="display: none;" class="container mx-auto my-4 py-4 px-4 border">
        <p class="pt-2 leading-relaxed font-semibold text-sm md:text-base">決済について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq100') }}">支払い方法はクレジットカードのみですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq101') }}">先払いのみですか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">購入後について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq102') }}">購入した商品をキャンセルしたいです</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq103') }}">届いた商品に不備がありました</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq104') }}">配送ステータスとはなんですか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">取引画面について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq105') }}">取引画面とはなんですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq106') }}">取引画面が使えないが店舗と連絡をとりたい</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">退会について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('home.faq.faq107') }}">退会はできますか？</a>
            </div>
    </div>

</div>

</x-app-layout>
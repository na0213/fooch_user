<x-guest-layout>
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
        <button id="userButton" class="bg-lyellow border-0 py-2 px-8 focus:outline-none hover:bg-lyellow text-xs md:text-base">購入者様向け</button>
      </div>
      <div class="w-1/2">
        <button id="ownerButton" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-lyellow text-xs md:text-base">出店者様向け</button>
      </div>
    </div>
    <div id="userFaq" style="display: block;" class="container mx-auto my-4 py-4 px-4 border">
        <p class="pt-2 leading-relaxed font-semibold text-sm md:text-base">決済について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq100') }}">支払い方法はクレジットカードのみですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq101') }}">先払いのみですか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">購入後について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq102') }}">購入した商品をキャンセルしたいです</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq103') }}">届いた商品に不備がありました</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq104') }}">配送ステータスとはなんですか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">取引画面について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq105') }}">取引画面とはなんですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq106') }}">取引画面が使えないが店舗と連絡をとりたい</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">退会について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq107') }}">退会はできますか？</a>
            </div>
    </div>
    <div id="ownerFaq" style="display: none;" class="container mx-auto my-4 py-4 px-4 border">
        <p class="pt-2 leading-relaxed font-semibold text-sm md:text-base">商品の発送について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq200') }}">注文から何日後までに発送すればよいですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq201') }}">設定した「発送日目安」より遅れそうです</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">取引画面について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq202') }}">取引画面とはなんですか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">手数料について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq203') }}">手数料はかかりますか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">送料について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq204') }}">送料はどのように設定しますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq205') }}">一度に複数個の購入があった時は、送料は追加されますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq206') }}">一度に複数個の購入があった時は、送料は追加されますか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">売上金について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq207') }}">売上はどのように確定しますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq208') }}">売上金の受け取りはいつですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq209') }}">振込手数料はかかりますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq210') }}">売上がなかった月はどうなりますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq211') }}">売上が少なかった場合は翌月に繰越できますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq212') }}">振込確認はできますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq213') }}">売上詳細は確認できますか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq214') }}">入金額の納品書はもらえますか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">登録内容の変更・削除について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq215') }}">登録内容を変更したい場合はどうすればよいですか？</a>
            </div>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq216') }}">商品の写真は変更できますか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">注文のキャンセルについて</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq217') }}">購入された商品をキャンセルしたいです</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">退会について</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq218') }}">退会はできますか？</a>
            </div>

        <p class="pt-8 leading-relaxed font-semibold text-sm md:text-base">トラブルについて</p><br>
            <div class="w-full text-sm md:text-base text-gray-700 py-1 px-3 leading-8">
                <a href="{{ route('top.faq.faq219') }}">トラブルがあった場合はどうすればよいですか？</a>
            </div>
    </div>
</div>

<script>
    var userButton = document.getElementById('userButton');
    var ownerButton = document.getElementById('ownerButton');

    ownerButton.addEventListener('click', function() {
        document.getElementById('ownerFaq').style.display = 'block';
        document.getElementById('userFaq').style.display = 'none';
        this.classList.add('bg-lyellow');
        userButton.classList.remove('bg-lyellow');
        userButton.classList.add('bg-gray-200');
    });

    userButton.addEventListener('click', function() {
        document.getElementById('ownerFaq').style.display = 'none';
        document.getElementById('userFaq').style.display = 'block';
        this.classList.add('bg-lyellow');
        ownerButton.classList.remove('bg-lyellow');
        ownerButton.classList.add('bg-gray-200');
    });
</script>
</x-guest-layout>
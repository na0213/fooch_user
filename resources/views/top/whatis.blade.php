<x-guest-layout>
  <style>
    h1 {
      font-size: 90px;
      color: #FFF67F;
    }
    .title-font {
      font-size: 70px;
      color: #c9ccce;
    }
    .subtitle{
      text-decoration:underline solid 2px #FFF67F;
      position: relative;
      display: inline-block;
    }
   .under {
      content: " ";
      text-decoration:underline solid 2px #c9ccce;
    }
    .content {
      line-height: 2.0;
    }
  </style>
  <x-slot name="title">
    '【原材料から選ぶ】食の総合マーケット'
  </x-slot>
  <x-slot name="description">
      'グルテンフリー、無添加食品、アレルギーなど、食の多様化が進む時代に、指定した原材料を除外して検索できる食の総合サイトです。
      探したい商品をより探しやすく。'
  </x-slot>
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-10 items-left justify-center flex-col">
          <h1 class="text-start">S<span class="title-font">TORY</h1>

          <div class="container mx-auto flex flex-col md:flex-row px-5 py-10">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">FOOCH<span class="under">の思い</span></h2>
            <p class="content mb-4 ml-2 w-full md:w-2/3 ml-10 text-xs sm:text-base">食物アレルギーを持つ人<br>
              グルテンフリー生活を送る人<br>
              添加物を気にする人<br>
              原材料は気にしたことなかったけれど、選べるなら選んでみたい人<br>
              体質、生き方、好き嫌い、<br>
              100人いれば100通りの食生活があり<br>
              食の多様化が進んでいます。
            </p>
          </div>
          <div class="container mx-auto flex justify-between px-5 pb-10">
            <img class="w-2/5 object-contain" src="../../../images/fooch1.jpg" alt="image description">
            {{-- <img class="w-2/5 object-contain" src="../../../images/fooch3.jpg" alt="image description"> --}}
          </div>

          <div class="container mx-auto flex flex-col md:flex-row px-5 relative">
            <h2 class="subtitle mb-4 w-full md:w-1/3 text-2xl"></h2>
            <p class="content mb-4 ml-2 w-full md:w-2/3 ml-10 text-xs sm:text-base">ネットで簡単に食品を購入できるようになった今、<br>
              なかなか目的の商品に辿り着けないことが増えてきました。<br>
              私もそのような悩みを抱えていた一人です。<br><br>
              目的の商品をもっと探しやすくできないだろうか？<br>
              その可能性を追求していこうと歩み出したのがFOOCH（フーチ）です。<br><br>
              {{-- 食品（food）だけに特化した検索（search）ができるマーケットへ。<br> --}}
            </p>
          </div>

          <div class="container mx-auto flex flex-col md:flex-row px-5 py-10">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">食べたいものを<br><span class="under">原材料から選んでみよう</h2>
            <p class="content mb-4 ml-2 w-full md:w-2/3 ml-10 text-xs sm:text-base">キーワードやカテゴリーでは探したい商品を入力・選択できます。<br>
              さらに、商品に含まれてほしくない原材料を選択する機能がついています。<br>
              チェックボックスにチェックを入れた原材料は、基本的に商品に含まれていないものとなります。<br><br>
              目的の商品に、より簡単に辿り着けるはずです。<br>
            </p>
          </div>
  
          <div class="container mx-auto flex px-5 py-5"> 
            <p class="test font-semibold text-sm sm:text-base leading-relaxed">
              食物アレルギーに関しては、商品の原材料および各店舗様へご確認願います。<br>
              重度の食物アレルギーがある方やご不明点等は各店舗様へ直接お問い合わせください。
            </p>
            <br>
          </div>
          <div class="container mx-auto flex px-5 py-5"> 
            <p class="text-xs sm:text-base leading-relaxed">
              ご購入には会員登録が必要となります。<br>
            </p>
          </div>
          <a href="{{ route('register') }}" class="px-5">
            <p class="text-xs sm:text-base font-bold leading-relaxed text-gray-700 underline decoration-solid hover:text-yellow-500">▷ 会員登録</p>
          </a>
      </section>
    </div>
  </div>
</x-guest-layout>
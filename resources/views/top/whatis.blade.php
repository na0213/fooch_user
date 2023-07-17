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
    .underlined-text {
      position: relative;
      display: inline;
    }
    .underlined-text.orange {
      text-decoration: underline solid 2px #FFF67F;
    }
    .underlined-text.gray::before {
      content: "";
      position: absolute;
      bottom: 4px;
      left: 0;
      right: 0;
      border-bottom: 2px solid #c9ccce;
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

            <div class="container mx-auto px-5 py-2 md:flex md:flex-row">
              <h2 class="mb-4 mr-2 w-full md:w-1/5 text-2xl">
                <span class="underlined-text orange">FOOCHの思い</span>
              </h2>
              <div class="flex flex-row items-start md:w-4/5">
                  <p class="content ml-2 w-3/5 md:w-3/4 ml-10 text-sm sm:text-base">「食物アレルギーがある人」<br>
                    「グルテンフリー生活をする人」<br>
                    「添加物を気にする人」<br>
                    体質、生き方、好き嫌い、<br>
                    100人いれば100通りの食生活があり、食の多様化が進んでいます。</p>
                  <img class="w-2/5 md:w-1/4 object-contain md:self-center" src="../../../images/welcome.jpg" alt="image description">
              </div>
            </div>

            <div class="container md:mb-10 mx-auto px-5 py-2 md:flex md:flex-row">
              <div class="flex flex-row items-start md:w-4/5">
                <img class="w-1/3 md:w-2/5 object-contain" src="../../../images/welcome2.jpg" alt="image description">
                <p class="content mb-4 ml-2 w-full md:w-3/5 ml-10 text-sm sm:text-base">ネットで簡単に食品を購入できるようになった今、
                  なかなか目的の商品に辿り着けないことが増えてきました。<br>
                  私もそのような悩みを抱えていた一人です。<br><br>
                  目的の商品をもっと探しやすくできないだろうか？<br>
                  その可能性を追求していこうと歩み出したのがFOOCH（フーチ）です。<br><br>
                </p>
              </div>
            </div>

            <div class="container md:mb-10 mx-auto flex flex-col md:flex-row px-5 py-5">
              <h2 class="mb-4 mr-2 w-full md:w-1/3 text-2xl">
                <span class="underlined-text orange">食べたいものを原材料から選んでみよう</span>
              </h2>
              <p class="content mb-4 ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">キーワードやカテゴリーでは探したい商品を入力・選択できます。<br>
                さらに、商品に含まれてほしくない原材料を選択する機能がついています。<br>
                チェックボックスにチェックを入れた原材料は、基本的に商品に含まれていないものとなります。<br><br>
                目的の商品に、より簡単に辿り着けるはずです。<br>
              </p>
            </div>

            <div class="container mx-auto flex px-5 py-5"> 
              <p class="test font-semibold text-lred text-sm sm:text-base leading-relaxed">
                食物アレルギーに関しては、商品の原材料および各店舗様へご確認願います。<br>
                重度の食物アレルギーがある方やご不明点等は各店舗様へ直接お問い合わせください。
              </p>
              <br>
            </div>
            <div class="container mx-auto flex px-5 py-5"> 
              <p class="text-sm sm:text-base leading-relaxed">
                ご購入には会員登録が必要となります。<br>
              </p>
            </div>
            <div class="container mx-auto flex px-5 py-5"> 
              <a href="{{ route('register') }}" class="px-5">
                <p class="text-sm sm:text-base font-bold leading-relaxed text-gray-700 underline decoration-solid hover:text-yellow-500">▷ 会員登録</p>
              </a>
            </div>
        </div>
      </section>
    </div>
  </div>
</x-guest-layout>
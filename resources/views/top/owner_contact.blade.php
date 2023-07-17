<x-guest-layout>
<x-slot name="header">
</x-slot>
<x-slot name="title">
  '【原材料から選ぶ】食の総合マーケット'
</x-slot>

<x-slot name="description">
    '食べてくれる方への思いを込めて作った大切な商品を、より探してもらいやすくするために。
    グルテンフリー、白砂糖不使用など、食の多様化が進む時代に合わせて作った商品を、多くの人に知ってもらうために。
    '
</x-slot>
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
  .flex-item {
    display: block;
    float: left;
    width: 130px;
  }
  .flex-container{
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
  }
</style>
<div class="py-1">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-flash-message status="session('status')" />
    <section class="text-gray-600 body-font">
      <div class="container mx-auto flex px-5 py-10 items-left justify-center flex-col">
        <h1 class="text-start">S<span class="title-font">TORE</h1>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-5">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">こだわりの商品を<br>もっと知ってもらいたい</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">ご訪問ありがとうございます。<br>
              皆様の、思いを込めて作られた大切な商品が、<br>
              ECサイトが普及する時代に埋もれてしまうことがないように。<br>
              本当に求めている人に、お届けできる仕組みを作っていきたい。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 relative">
            <h2 class="subtitle mb-4 w-full md:w-1/3 text-2xl"></h2>
            <p class="content mb-4 ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">きっかけは私自身がなかなか目的の商品に辿り着けなかったことでした。<br><br>
              「ネットで簡単に検索できる時代なのになぜだろう？」<br>
              「商品が見つけやすくなることは、作り手からも見つけてもらいやすくなるきっかけになるのではないか？」<br><br>
              FOOCH（フーチ）はそこから始まりました。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-10">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">食品表示を見る人は<br>6割以上</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">食品表示に関して、下記インターネット調査を行いました。<br>
            </p>
          </div>
          <div class="container mx-auto font-semibold px-5 py-3">Q：食品表示を見る人の割合</div>
          <div class="container mx-auto font-semibold px-5 py-3 text-lred">A：20代〜50代以降までの各世代において６割以上</div>
          <div class="container mx-auto flex justify-between px-5 pb-10">
            <img class="w-full object-contain" src="../../../images/food1.jpg" alt="image description">
          </div>
          <div class="container mx-auto font-semibold px-5 py-3">Q：なぜ食品表示を見ますか？</div>
          <div class="container mx-auto font-semibold px-5 py-3 text-lred">A：<br>
            1位：添加物が気になるため<br>
            2位：アレルギーがあるため<br>
            3位：健康のため<br>
          </div>
          <div class="container mx-auto flex justify-between px-5 pb-5">
            <img class="w-full object-contain" src="../../../images/food2.jpg" alt="image description">
          </div>
          {{-- <div class="container mx-auto flex flex-col md:flex-row px-5 relative">
            <h2 class="subtitle mb-4 w-full md:w-1/3 text-2xl"></h2>
            <p class="content mb-5 ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">食品表示をみる割合は、各世代において6割以上でした。<br>
              食品表示を見る理由として、「アレルギーがある」「添加物が気になる」が半数を占めていました。<br>
            </p>
          </div> --}}
          <div class="container mx-auto font-semibold px-5 py-3">Q：ネットで食品を購入する際に不便なことはありますか？</div>
          <div class="container mx-auto font-semibold px-5 py-3 text-lred">A：<br>
            1位：食品表示がわかりにくい<br>
            2位：商品が探しにくい<br>
            3位：内容量がわかりにくい<br>
          </div>
          <div class="container mx-auto flex justify-between px-5 pb-10">
            <img class="w-full object-contain" src="../../../images/food3.jpg" alt="image description">
          </div>
          <div class="container mt-4 mx-auto flex flex-col md:flex-row px-5 relative">
            <h2 class="subtitle mb-4 w-full md:w-1/3 text-2xl"></h2>
            <p class="content mb-5 ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">以上の結果から、食品表示は半数以上の方が見ていることがわかりました。<br>
              その理由としては、「避けたいものがある」ことを理由としている方が半数以上いることもわかりました。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-5">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">人と食とのマッチング</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">さらに、「特定の原材料を除外して食品を検索できるようなECサイトがあったら利用するか」について確認したところ、<br>
              <span class="font-semibold">「利用したい」が約4割</span><br>
              <span class="font-semibold">「訪問したい」が約4割</span><br>
                <span class="font-semibold">「検索に利用したい」が約1割</span><br>
              と、9割の方に好意的な印象をいただきました。<br><br>
              多くの方に良い商品をみつけてもえるよう、FOOCHは、<br>
              <span class="text-lred font-semibold">「食品（food）を原材料から検索（search）する」</span>という意味のほか、<br>
              <span class="text-lred font-semibold">「食品（food）とマッチ（match）できる場である」</span>という意味も込められています。<br><br>
              多くの方に、大切な商品が届くきっかけを目指していきます。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-5">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">手数料10％</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">登録料、ご使用料は無料ですが、手数料として売上金の10％を頂戴いたします。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-5">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">売上金の受取</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">売上金額は銀行振込にて受け取ることができます。<br>
              別途振込手数料（一律200円）がかかりますので予めご了承ください。<br>
              売上金の受取申請は、申請された月の月末までに確定した売上金を、翌月末にお振込みいたします。<br>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-5">
            <h2 class="subtitle mb-4 mr-2 w-full md:w-1/3 text-2xl">ご登録方法</h2>
            <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">下記フォームに、お名前、メールアドレス、簡単なお店のご紹介（ホームページやカテゴリー等）をご入力ください。<br>
              送信後1週間以内に、ご登録メールに仮パスワードとログインURLのご案内をお送りいたします。</p>
            </p>
          </div>
          <div class="container mx-auto flex flex-col md:flex-row px-5 py-10">
            <form method="POST" action="{{ route('top.send_owner_contact') }}">
              @csrf
              <label for="additives" class="leading-7 text-sm text-gray-600">お名前</label>
              <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              @if ($errors->has('name'))
              <p class="error-message">{{ $errors->first('name') }}</p>
              @endif

              <label for="additives" class="leading-7 text-sm text-gray-600">メールアドレス</label>
              <input type="text" name="email" value="{{ old('email') }}" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              @if ($errors->has('email'))
              <p class="error-message">{{ $errors->first('email') }}</p>
              @endif

              <label for="additives" class="leading-7 text-sm text-gray-600">お店のご紹介等</label>
              <textarea name="body" rows="5" required class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('body') }}</textarea>
              @if ($errors->has('body'))
              <p class="error-message">{{ $errors->first('body') }}</p>
              @endif
              <div class="mt-4">
                <div class="flex items-center">
                  <div>
                    <label for="terms" class="inline-flex items-center">
                      <input id="terms" type="checkbox" name="terms" required>
                      <span class="ml-2"><a href="{{ route('terms') }}" target="_blank" class="underline hover:text-yellow-500">{{ __('利用規約に同意しました') }}</a></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="text-center w-full mt-10">
                <button type="submit" name="action" onclick="return confirm('送信しますか？');" value="submit" class="bg-mimosa border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600">
                  送信する
                </button>
              </div>
            </form>
          </div>
        </div>
    </section>
  </div>
</div>
</x-guest-layout>
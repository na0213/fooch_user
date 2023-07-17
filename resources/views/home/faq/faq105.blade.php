<x-app-layout>
<div class="container mx-auto my-2 px-4">
  <div class="flex py-8 px-6 md:flex">
    <div class="w-full">
      <div id="ownerFaq" class="container mx-auto my-4 py-5 px-4 border">
          <p class="pt-2 leading-relaxed font-semibold text-lblue text-sm md:text-base">Q：取引画面とはなんですか？</p>
          <p class="pt-2 leading-relaxed text-sm md:text-base">A：</p>
          <p class="pt-2 leading-relaxed text-sm md:text-base">
            商品が購入された場合にのみ、注文画面の取引画面より、店舗へ連絡がとることができます。<br>
            ステータスが「発送前」「発送済」のみ連絡が可能で、「配達完了」となると取引画面は見れなくなります。<br>
            ご購入商品に関する内容や予想外のトラブル以外、必要以上の連絡は避けていただくようお願いいたします。<br></p>
      </div>
    </div>
  </div>
</div>
<div class="p-4 w-full flex justify-around mt-4">
    <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>
</div>
</x-guest-layout>
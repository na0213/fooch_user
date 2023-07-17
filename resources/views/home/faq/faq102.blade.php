<x-app-layout>
<div class="container mx-auto my-2 px-4">
  <div class="flex py-8 px-6 md:flex">
    <div class="w-full">
      <div id="ownerFaq" class="container mx-auto my-4 py-5 px-4 border">
          <p class="pt-2 leading-relaxed font-semibold text-lblue text-sm md:text-base">Q：購入した商品をキャンセルしたいです</p>
          <p class="pt-2 leading-relaxed text-sm md:text-base">A：</p>
          <p class="pt-2 leading-relaxed text-sm md:text-base">
            ご購入後のキャンセルは基本的に対応できかねます。<br>
            やむを得ない事情がある場合は、取引画面より直接店舗と交渉してください。<br></p>
      </div>
    </div>
  </div>
</div>
<div class="p-4 w-full flex justify-around mt-4">
    <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>
</div>
</x-guest-layout>
<x-guest-layout>
<div class="container mx-auto my-2 px-4">
    <div class="flex py-8 px-6 md:flex">
      <div class="w-full">
        <div id="ownerFaq" class="container mx-auto my-4 py-5 px-4 border">
            <p class="pt-2 leading-relaxed font-semibold text-lblue text-sm md:text-base">Q：売上はどのように確定しますか？</p>
            <p class="pt-2 leading-relaxed text-sm md:text-base">A：</p>
            <p class="pt-2 leading-relaxed text-sm md:text-base">
              商品発送後、購入者が「配達完了」にステータスを変更した日付の月で、売上が確定いたします。<br>
              もし購入者が配達完了後もステータスを変更しなかった場合は、「発送済」にステータスを変更してから15日後に自動で「配達完了」に切り替わります。<br>
              「配達完了」に切り替わった月にて売上が確定いたします。<br><br>
              例）7/20に発送した場合：8/1に「配達完了」に自動切り替えとなり、8月分の売上として計上され、9/30に入金となります。<br>
            </p>
        </div>
      </div>
    </div>
</div>
<div class="p-4 w-full flex justify-around mt-4">
    <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>
</div>
</x-guest-layout>
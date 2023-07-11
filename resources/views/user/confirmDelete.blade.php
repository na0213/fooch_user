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
      <h1 class="text-start">T<span class="title-font">HANKS</h1>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

        <x-flash-message status="session('status')" />
        <p class="content ml-2 w-full md:w-2/3 ml-10 text-sm sm:text-base">ご利用いただき誠にありがとうございました。<br><br>
          <p class="content ml-2 text-red-600 w-full font-semibold md:w-2/3 ml-10 text-sm sm:text-base">退会すると、データは完全に削除されます。<br>
          <p class="content ml-2 text-red-600  w-full font-semibold md:w-2/3 ml-10 text-sm sm:text-base">データの復旧はできません。<br>
          <p class="content ml-2 text-red-600  w-full font-semibold md:w-2/3 ml-10 text-sm sm:text-base">ご注文履歴等、ご利用時のお問い合わせには一切の対応が出来兼ねます。<br><br>
        </p>
        <div class="mt-5 p-2 w-full flex justify-around mt-4">
          <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('退会します')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-2 bg-lred hover:bg-red-500">内容理解しました。退会する</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
</x-app-layout>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      お名前
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- <x-flash-message status="session('status')" /> --}}
          <div class="mt-4 p-2 w-2/2 flex">
            <label for="name" class="w-3/5 leading-7 text-lg underline decoration-mimosa">お名前</label>
          </div>
          {{-- 名前 --}}
          <div class="p-2 w-2/2">
            <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">【変更前】</label>
              <div class="flex">
                <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">お名前</label>
                <div class="w-3/5 bg-gray-100 pl-3 pt-2">{{ $user->name }}</div>
              </div>
              <div class="flex">
                <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">フリガナ</label>
                <div class="w-3/5 bg-gray-100 pl-3 pt-2">{{ $user->name_pronunciation }}</div>
              </div>
          </div>
          <form action="{{ route('user.update.name', $user) }}" method="POST">
            <div class="mt-3 p-2 w-2/2">
                @csrf
                @method('PUT')
                <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">【変更後】</label>
                <div class="flex">
                  <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">お名前</label>
                  <input type="text" id="user_name" name="user_name" required class="w-3/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                </div>
                <div class="flex">
                  <label for="name_pronunciation" class="w-1/5 leading-7 text-sm text-gray-600">フリガナ</label>
                  <input type="text" id="user_name_pronunciation" name="user_name_pronunciation" required class="w-3/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <x-input-error :messages="$errors->get('user_name_pronunciation')" class="mt-2" />
                </div>
            </div>
  
          <div class="mt-5 p-2 w-full flex justify-around mt-4">
            <button type="button" onclick="location.href='{{ route('user.index') }}'" class="bg-gray-200 border-0 px-3 py-2 focus:outline-none hover:bg-gray-400 text-md">戻る</button>
  
            <button type="submit" onclick="return confirm('本当に更新しますか？');" class="px-3 py-2 bg-mimosa text-md hover:bg-yellow-500">更新</button>
  
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
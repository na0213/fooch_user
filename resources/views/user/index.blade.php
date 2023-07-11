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
      <h1 class="text-start">M<span class="title-font">YPAGE</h1>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- <div class="card-header d-flex justify-content-between">
            <a href="{{ route('user.edit', ['user' => $user->id]) }}">
            <div>編集</div>
            </a>
          </div> --}}
        {{-- 名前 --}}
        <x-flash-message status="session('status')" />
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                  {{ $user->name }}
              </div>
              <div class="w-1/5">
                <button onclick="location.href='{{ route('user.edit.name', $user->id) }}'" class="px-3 py-2 bg-mimosa text-small text-black hover:bg-yellow-500">編集</button>
              </div>
              </div>
          </div>
        </div>
        {{-- フリガナ --}}
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="name_pronunciation" class="leading-7 text-sm text-gray-600">フリガナ</label>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                  {{ $user->name_pronunciation }}
              </div>
              </div>
          </div>
        </div>
        {{-- メールアドレス --}}
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                  {{ $user->email }}
              </div>
              <div class="w-1/5">
                <button onclick="location.href='{{ route('user.edit.mail', $user->id) }}'" class="px-3 py-2 bg-mimosa text-small text-black hover:bg-yellow-500">編集</button>
              </div>
              </div>
          </div>
        </div>

        {{-- 住所 --}}
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="city" class="leading-7 text-sm text-gray-600">住所</label>
              <div class="p-2 w-2/2 flex">
                <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                    〒{{ $user->zipcode }}
                </div>
                <div class="w-1/5">
                  <button onclick="location.href='{{ route('user.edit.address', $user->id) }}'" class="px-3 py-2 bg-mimosa text-small text-black hover:bg-yellow-500">編集</button>
                </div>
              </div>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                {{ $user->prefecture }}{{ $user->city }}
              </div>
              </div>
          </div>
        </div>      
        {{-- 電話番号 --}}
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                  {{ $user->tel }}
              </div>
              <div class="w-1/5">
                <button onclick="location.href='{{ route('user.edit.tel', $user->id) }}'" class="px-3 py-2 bg-mimosa text-small text-black hover:bg-yellow-500">編集</button>
              </div>
              </div>
          </div>
        </div>        
        {{-- 生年月日 --}}
        <div class="p-2 w-2/2 mx-auto">
          <div class="relative">
              <label for="tel" class="leading-7 text-sm text-gray-600">生年月日</label>
              <div class="p-2 w-2/2 flex">
              <div class="w-3/5 bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                {{$user->birth_year}}年{{$user->birth_month}}月{{$user->birth_day}}日
              </div>
              <div class="w-1/5">
                <button onclick="location.href='{{ route('user.edit.birth', $user->id) }}'" class="px-3 py-2 bg-mimosa text-small text-black hover:bg-yellow-500">編集</button>
              </div>
              </div>
          </div>
        </div>     

        <div class="mt-5 p-2 w-full flex justify-around mt-4">
          <button onclick="location.href='{{ route('user.confirm.delete', $user->id) }}'" class="px-3 py-2 bg-lred hover:bg-red-500">退会画面へ進む</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
</x-app-layout>
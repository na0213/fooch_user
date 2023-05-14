<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      生年月日
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @if(session('birthdate_error'))
              <div class="alert alert-danger">{{ session('birthdate_error') }}</div>
          @endif
          <div class="mt-4 p-2 w-2/2 flex">
            <label for="name" class="w-3/5 leading-7 text-lg underline decoration-mimosa">生年月日</label>
          </div>
          <div class="p-2 w-2/2">
            <div class="flex">
              <label for="name" class="w-1/5 leading-7 text-sm text-gray-600">変更前</label>
              <div class="w-1/5 bg-gray-100 pl-3 pt-2">{{ $user->birth_year  }}年</div>
              <div class="w-1/5 bg-gray-100 pl-3 pt-2">{{ $user->birth_month }}月</div>
              <div class="w-1/5 bg-gray-100 pl-3 pt-2">{{ $user->birth_day }}日</div>
            </div>
        </div>
          <form action="{{ route('user.update.birth', $user) }}" method="POST">
            <div class="mt-3 p-2 w-2/2">
              @csrf
              @method('PUT')
              <div class="flex">
                <label for="birth_year" class="w-1/5 leading-7 text-sm text-gray-600">生年月日</label>
                <select id="birth_year" name="birth_year" required class="w-1/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1900; $i--)
                        <option value="{{ $i }}" {{ $i == $user->birth_year ? 'selected' : '' }}>{{ $i }}年</option>
                    @endfor
                </select>
                <select id="birth_month" name="birth_month" required class="w-1/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">月</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $user->birth_month ? 'selected' : '' }}>{{ $i }}月</option>
                    @endfor
                </select>
                <select id="birth_day" name="birth_day" required class="w-1/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">日</option>
                    @for($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ $i == $user->birth_day ? 'selected' : '' }}>{{ $i }}日</option>
                    @endfor
                </select>
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
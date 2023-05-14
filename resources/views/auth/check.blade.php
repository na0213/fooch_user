<x-guest-layout>
    {{-- <x-app-layout> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('入力内容確認') }}
            </h2>
        </x-slot>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <!-- Name -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['name'] }}
                        </div>
                        <input type="hidden" name="name" value="{{ $data['name'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <div>{{ $data['name'] }}</div>
                    <input type="hidden" name="name" value="{{ $data['name'] }}" />
                </div> --}}
    
                <!-- name_pronunciation -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">フリガナ</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['name_pronunciation'] }}
                        </div>
                        <input type="hidden" name="name_pronunciation" value="{{ $data['name_pronunciation'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label for="name_pronunciation" :value="__('NamePronunciation')" />
                    <div>{{ $data['name_pronunciation'] }}</div>
                    <input type="hidden" name="name_pronunciation" value="{{ $data['name_pronunciation'] }}" />
                </div> --}}
    
                {{-- zipcode --}}
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">郵便番号</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['zipcode'] }}
                        </div>
                        <input type="hidden" name="zipcode" value="{{ $data['zipcode'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label for="zipcode" :value="__('zipcode')" />
                    <div>{{ $data['zipcode'] }}</div>
                    <input type="hidden" name="zipcode" value="{{ $data['zipcode'] }}" />
                </div> --}}
    
                <!-- address -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">住所</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['prefecture'] }}{{ $data['city'] }}
                        </div>
                        <input type="hidden" name="prefecture" value="{{ $data['prefecture'] }}" />
                        <input type="hidden" name="city" value="{{ $data['city'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label :value="__('Address')" />
                    <div>{{ $data['prefecture'] }}{{ $data['city'] }}</div>
                    <input type="hidden" name="prefecture" value="{{ $data['prefecture'] }}" />
                    <input type="hidden" name="city" value="{{ $data['city'] }}" />
                </div> --}}
    
                {{-- tel --}}
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">電話番号（ハイフン不要）</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['tel'] }}
                        </div>
                        <input type="hidden" name="tel" value="{{ $data['tel'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label for="tel" :value="__('tel')" />
                    <div>{{ $data['tel'] }}</div>
                    <input type="hidden" name="tel" value="{{ $data['tel'] }}" />
                </div> --}}
    
                <!-- Email Address -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['email'] }}
                        </div>
                        <input type="hidden" name="email" value="{{ $data['email'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <div>{{ $data['email'] }}</div>
                    <input type="hidden" name="email" value="{{ $data['email'] }}" />
                </div> --}}
    
                <!-- Birth -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">生年月日</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $data['birth_year'] }}年{{ $data['birth_month'] }}月{{ $data['birth_day'] }}日
                        </div>
                        <input type="hidden" name="birth_year" value="{{ $data['birth_year'] }}" />
                        <input type="hidden" name="birth_month" value="{{ $data['birth_month'] }}" />
                        <input type="hidden" name="birth_day" value="{{ $data['birth_day'] }}" />
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <x-input-label :value="__('Birthdate')" />
                    <div>{{ $data['birth_year'] }}年{{ $data['birth_month'] }}月{{ $data['birth_day'] }}日</div>
                    <input type="hidden" name="birth_year" value="{{ $data['birth_year'] }}" />
                    <input type="hidden" name="birth_month" value="{{ $data['birth_month'] }}" />
                    <input type="hidden" name="birth_day" value="{{ $data['birth_day'] }}" />
                </div> --}}
    
                <!-- Password -->
                <div class="mt-2 p-2 w-2/2 mx-auto">
                    <div class="relative">
                    <x-input-label :value="__('Password')" />
                    <div>{{ str_repeat('*', strlen($data['password'])) }}</div>
                    <input type="hidden" name="password" value="{{ $data['password'] }}" />
                    </div>
                </div>
    
                <div class="mt-8 flex justify-center">
                    <button type="submit" class="bg-mimosa border-0 py-2 px-8 focus:outline-none hover:bg-yellow-500 text-lg">新規登録</button>
{{-- 
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button> --}}
                </div>
            </form>
            <div class="mt-8 flex justify-center">
            <button type="button " onclick="window.location.href='{{ route('register') }}'" class="bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-700">
                修正する
            </button>
            </div>
            </div>
        </div>
    {{-- </x-app-layout> --}}
    </x-guest-layout>
    
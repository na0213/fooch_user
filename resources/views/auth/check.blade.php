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
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <div>{{ $data['name'] }}</div>
                    <input type="hidden" name="name" value="{{ $data['name'] }}" />
                </div>
    
                <!-- name_pronunciation -->
                <div class="mt-4">
                    <x-input-label for="name_pronunciation" :value="__('NamePronunciation')" />
                    <div>{{ $data['name_pronunciation'] }}</div>
                    <input type="hidden" name="name_pronunciation" value="{{ $data['name_pronunciation'] }}" />
                </div>
    
                {{-- zipcode --}}
                <div class="mt-4">
                    <x-input-label for="zipcode" :value="__('zipcode')" />
                    <div>{{ $data['zipcode'] }}</div>
                    <input type="hidden" name="zipcode" value="{{ $data['zipcode'] }}" />
                </div>
    
                <!-- address -->
                <div class="mt-4">
                    <x-input-label :value="__('Address')" />
                    <div>{{ $data['prefecture'] }}{{ $data['city'] }}</div>
                    <input type="hidden" name="prefecture" value="{{ $data['prefecture'] }}" />
                    <input type="hidden" name="city" value="{{ $data['city'] }}" />
                </div>
    
                {{-- tel --}}
                <div class="mt-4">
                    <x-input-label for="tel" :value="__('tel')" />
                    <div>{{ $data['tel'] }}</div>
                    <input type="hidden" name="tel" value="{{ $data['tel'] }}" />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <div>{{ $data['email'] }}</div>
                    <input type="hidden" name="email" value="{{ $data['email'] }}" />
                </div>
    
                <!-- Birth -->
                <div class="mt-4">
                    <x-input-label :value="__('Birthdate')" />
                    <div>{{ $data['birth_year'] }}年{{ $data['birth_month'] }}月{{ $data['birth_day'] }}日</div>
                    <input type="hidden" name="birth_year" value="{{ $data['birth_year'] }}" />
                    <input type="hidden" name="birth_month" value="{{ $data['birth_month'] }}" />
                    <input type="hidden" name="birth_day" value="{{ $data['birth_day'] }}" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label :value="__('Password')" />
                    <div>{{ str_repeat('*', strlen($data['password'])) }}</div>
                    <input type="hidden" name="password" value="{{ $data['password'] }}" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
            <button type="button " onclick="window.location.href='{{ route('register') }}'" class="bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-700">
                修正する
            </button>
            </div>
        </div>
    {{-- </x-app-layout> --}}
    </x-guest-layout>
    
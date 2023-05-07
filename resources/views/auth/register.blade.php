<x-guest-layout>
    {{-- <x-app-layout> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('新規登録') }}
            </h2>
        </x-slot>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('register.check') }}">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                <!-- name_pronunciation -->
                <div class="mt-4">
                    <x-input-label for="name_pronunciation" :value="__('NamePronunciation')" />
    
                    <x-text-input id="name_pronunciation" class="block mt-1 w-full" type="text" name="name_pronunciation" :value="old('name_pronunciation')" required autofocus />
                </div>
    
                {{-- zipcode --}}
                <div class="mt-4">
                    <x-input-label for="zipcode" :value="__('zipcode')" />
    
                    <x-text-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr('zipcode','','prefecture','city');" :value="old('zipcode')"  placeholder="1030013(ハイフンなし)" required autofocus />
                </div>
    
                <!-- prefecture-->
                <div class="mt-4">
                    <x-input-label for="prefecture" :value="__('prefecture')" />
    
                    <x-text-input id="prefecture" class="block mt-1 w-full" type="text" name="prefecture" :value="old('prefecture')" required autofocus />
                </div>
    
                <!-- city -->
                <div class="mt-4">
                    <x-input-label for="city" :value="__('city')" />
    
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                </div>
    
                {{-- tel --}}
                <div class="mt-4">
                    <x-input-label for="tel" :value="__('tel')" />
    
                    <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Birth -->
                <div class="mt-4">
                    <div class="form-group">
                        <x-input-label for="birth_year" :value="__('birth_year')" />
                        <p>※18歳以下の方はご登録できません</p>
                                            <select name="birth_year" id="birth_year">
                            @for ($year = (int)date("Y") - 100; $year <= (int)date("Y"); $year++)
                                <option value="{{ $year }}">{{ $year }}年</option>
                            @endfor
                        </select>
                        <select name="birth_month" id="birth_month">
                            @for ($month = 1; $month <= 12; $month++)
                                <option value="{{ $month }}">{{ $month }}月</option>
                            @endfor
                        </select>
                        <select name="birth_day" id="birth_day">
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}日</option>
                            @endfor
                        </select>
                    </div>
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
    
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}
    
                    <x-primary-button class="ml-4">
                        確認
                    </x-primary-button>
                </div>
            </form>
            <button type="button " onclick="window.location.href='{{ route('welcome') }}'" class="bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-700">
                戻る
            </button>
            </div>
        </div>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    {{-- </x-app-layout> --}}
    </x-guest-layout>
    

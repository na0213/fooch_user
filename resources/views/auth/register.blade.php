<x-guest-layout>
    <div class="py-12 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-5 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('新規登録') }}
            </h2>
            <form method="POST" action="{{ route('register.check') }}">
                @csrf
    
                <!-- Name -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                        <input type="text" id="name" name="name" value="{{  old('name') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <!-- name_pronunciation -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">フリガナ</label>
                        <input type="text" id="name_pronunciation" name="name_pronunciation" value="{{  old('name_pronunciation') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                {{-- zipcode --}}
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">郵便番号（ハイフン不要）</label>
                        <input type="text" id="zipcode" name="zipcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr('zipcode','','prefecture','city');" value="{{ old('zipcode') }}" 
                        required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="1030013"/>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">都道府県</label>
                        <input type="text" id="prefecture" name="prefecture" value="{{  old('prefecture') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">市町村以降</label>
                        <input type="text" id="city" name="city" value="{{  old('city') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                {{-- tel --}}
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">電話番号（ハイフン不要）</label>
                        <input type="text" id="tel" name="tel" value="{{  old('tel') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <!-- Email Address -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                        <input type="text" id="email" name="email" value="{{  old('email') }}" required class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <!-- Birth -->
                <div class="p-2 w-2/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">生年月日　※18歳未満の方は登録できません</label>
                        <div>
                        <select id="birth_year" name="birth_year" required class="w-2/5 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">年</option>
                            @for($i = date('Y'); $i >= 1900; $i--)
                                <option value="{{ $i }}" {{ $i == old('birth_year') ? 'selected' : '' }}>{{ $i }}年</option>
                            @endfor
                        </select>
                        <select id="birth_month" name="birth_month" required class="w-1/5 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">月</option>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == old('birth_month') ? 'selected' : '' }}>{{ $i }}月</option>
                            @endfor
                        </select>
                        <select id="birth_day" name="birth_day" required class="w-1/5 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">日</option>
                            @for($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}" {{ $i == old('birth_day') ? 'selected' : '' }}>{{ $i }}日</option>
                            @endfor
                        </select>
                        </div>
                        @error('birthdate')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
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

                <div class="mt-4">
                    <div class="flex items-center"> <!-- ここで新しい flex コンテナを作成します -->
                        <!-- Terms Agreement -->
                        <div>
                            <label for="terms" class="inline-flex items-center">
                                <input id="terms" type="checkbox" name="terms" required>
                                <span class="ml-2"><a href="{{ route('terms') }}" target="_blank" class="underline hover:text-blue-500">{{ __('利用規約に同意しました') }}</a></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-center">
                <button type="submit" class="w-1/5 ml-1 bg-mimosa border-0 py-1 px-2 focus:outline-none hover:bg-yellow-600 text-lg">確認</button>
                </div>
            </form>
            <div class="mt-6 flex justify-center">
                <button type="button" onclick="location.href='{{ route('welcome') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>   
            </div>
            </div>
        </div>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    {{-- </x-app-layout> --}}
    </x-guest-layout>
    

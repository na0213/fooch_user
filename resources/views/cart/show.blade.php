<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入内容確認
        </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <form method="POST" action="{{ route('cart.checkout') }}">
                @csrf
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="space-y-6">
                        <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-800 dark:text-white">お支払い金額</label>
                            <div id="total-price" class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                {{ number_format($total_price + $total_shipping_fee) }}円
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">商品金額合計</label>
                            <div id="total-price" class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                <span id="shipping_fee">{{ number_format($total_price) }}円</span>
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">送料合計</label>
                            <div id="shipping_fee" class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                {{ number_format($total_shipping_fee) }}円
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">◆ご購入商品</label>
                            @foreach($display_items as $item)
                                <div class="flex">
                                    @if($item['image'])
                                        <div class="px-6 py-2 whitespace-nowrap">
                                            <img class="logo" src="{{ config('aws.S3.url') . '/' . $item['image'] }}" alt="商品画像" style="max-width: 100px; height: 100px; object-fit: cover;" class="img-thumbnail">
                                        </div>
                                    @else
                                        <div class="px-6 py-2 whitespace-nowrap">
                                            <img class="logo" src="{{ asset('images/noimage.jpg') }}" style="max-width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                        {{ $item['product']->name }}<br>
                                        商品金額:{{ number_format($item['product']->price) }}円<br>
                                        送料:{{ number_format($item['shipping_fee']) }}円<br>
                                        {{ $item['quantity'] }}個
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class="flex flex-col md:flex-row md:space-x-4">
                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="space-y-6">
                        <div class="flex flex-col md:flex-row md:space-x-4">
                            <div>
                            <h5 class="text-xl font-medium text-gray-900 dark:text-white">お届け先</h5>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $user->name }}様<br>
                            〒{{ $user->zipcode }}<br>
                            {{ $user->prefecture }}{{ $user->city }}<br>
                            {{ $user->tel }}
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="space-y-6">
                        <div>
                            <input type="hidden" name="selected_address" id="selected_address_value">
                            <button type="submit" class="text-gray-800 bg-detail border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 text-lg">購入</button>
                            <p>※決済ページにに移行します</p>
                        </div>
                        {{-- <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">クレジットカード</label>
                        </div> --}}
                        {{-- @if($default_card)
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">クレジットカード</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm">
                                {{ $default_card['brand'] }}
                            </div>
                            <div class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm">
                                {{ $default_card['number'] }}
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">有効期限</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm">
                                {{ $default_card['exp_month'] }} / {{ $default_card['exp_year'] }}
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">カード名義</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm">
                                {{ $default_card['name'] }}
                            </div>
                        </div>
                        @else
                        <div>カード情報を登録してください</div>
                        @endif --}}
                        {{-- <button onclick="location.href='{{ route('payment.index') }}'" class="text-gray-800 bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">カード情報登録</button> --}}
                    </div>
                </div>
                </div>
            </form>
            <div class="p-2 w-full flex justify-around mt-4">
                <button type="button" onclick="location.href='{{ route('cart.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400">戻る</button>
            </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
    
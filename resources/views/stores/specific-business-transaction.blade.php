<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        特定商取引法に基づく表記
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">                
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">事業者名</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->business_name }}
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">代表者名</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->representative_name }}
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">所在地</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->prefecture }}
                            @if($specificBusinessTransaction->city)
                                {{ $specificBusinessTransaction->city }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">電話番号</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->tel }}
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">お問合せ先</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->contact }}
                        </div>
                    </div>
                </div>
                @if($specificBusinessTransaction->business_days)
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">営業日・営業時間について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {!! nl2br(e($specificBusinessTransaction->business_days)) !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">販売価格について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->sale_price }}
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">送料について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->shipping_cost }}
                        </div>
                    </div>
                </div>
                @if($specificBusinessTransaction->delivery)
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">配送について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {!! nl2br(e($specificBusinessTransaction->delivery)) !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">支払い方法について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->payment_method }}
                        </div>
                    </div>
                </div>
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">支払い時期について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $specificBusinessTransaction->payment_timing }}
                        </div>
                    </div>
                </div>
                @if($specificBusinessTransaction->return_exchange)
                <div class="p-2 w-2/2 mx-auto mt-3">
                    <div class="relative">
                        <label for="store_id" class="leading-7 text-sm text-gray-600">返品・交換について</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {!! nl2br(e($specificBusinessTransaction->return_exchange)) !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>



<div class="p-4 w-full flex justify-around mt-4">
    <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
</div>

</x-app-layout>
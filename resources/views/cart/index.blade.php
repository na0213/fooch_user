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
        <h1 class="text-start">C<span class="title-font">ART</h1>
        <x-flash-message status="session('status')" />
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @if(count($display_items) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">商品画像</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">商品名</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">店舗名</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">商品料金</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">送料</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">数量</th>
                            <th scope="col" class="px-6 py-2 whitespace-nowrap">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($display_items as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @if($item['image'])
                            <td class="px-6 py-2 whitespace-nowrap">
                                <img class="logo" src="{{ config('aws.S3.url') . '/' . $item['image'] }}" alt="商品画像" style="max-width: 100px; height: 100px; object-fit: cover;" class="img-thumbnail">
                            </td>
                            @else
                            <td class="px-6 py-2 whitespace-nowrap">
                                <img class="logo" src="{{ asset('images/noimage.jpg') }}" style="max-width: 100px; height: 100px; object-fit: cover;" >
                            </td>
                            @endif
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['product']->name }}
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['product']->store->name }}
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['product']->price }}円
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['shipping_fee'] }}円
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['quantity'] }}
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <form method="post" action="{{ route('cart.delete', ['item' => $item['product']->id ]) }}">
                                    @csrf
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3 mx-3">
                    <p>合計金額: {{ $total_price }}円</p>
                    <p>合計送料: {{ $total_shipping_fee }}円</p>
                    <p>総合計: {{ $total_price + $total_shipping_fee }}円</p>
                </div>
                <div class="my-3 mx-3">
                    <button onclick="location.href='{{ route('cart.show') }}'" class="text-gray-800 bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-gray-600" {{ $can_purchase ? '' : 'disabled' }}>購入画面に進む</button>
                    @if(!$can_purchase)
                        <p style="color:red;">以下の商品は販売停止となりました。カートから削除してください。</p>
                        @foreach($non_purchasable_items as $item)
                            <p style="color:red;">{{ $item }}</p>
                        @endforeach
                    @endif
                </div>
                {{-- <div class="my-3 mx-3">
                    <button onclick="location.href='{{ route('cart.show') }}'" class="text-gray-800 bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">購入画面に進む</button>
                </div> --}}
            @else
                <p>カートに商品が入っていません。</p>
            @endif        
            </div>
        </div>
    </div>
</div>
</x-app-layout>
    
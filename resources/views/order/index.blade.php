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
    <h1 class="text-start">0<span class="title-font">RDER</h1>
      @if(count($orders) > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  注文番号
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  配送状況
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  商品画像
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  商品名
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  店舗名
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  購入数量
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  お支払い金額
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  注文日時
                </th>
                <th scope="col" class="px-6 py-2 whitespace-nowrap">
                  注文詳細
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->id }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ config('shippingstatus.statuses.' . $order->order_status) }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  @if ($order->product->productImages->count() > 0)
                      <img src="{{ config('aws.S3.url') . '/' . $order->product->productImages->first()->image }}" alt="{{ $order->product->name }}" width="50" class="img-thumbnail">
                  @else
                      <img class="logo" src="{{ asset('images/noimage.jpg') }}">
                  @endif
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->product->name }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->product->store->name }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->quantity }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ number_format($order->total_price + $order->shipping_fee) }}円
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->created_at }}
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <button onclick="location.href='{{ route('order.show', ['order' => $order->id]) }}'" class="px-3 py-2 text-black bg-detail text-md hover:bg-yellow-500">詳細</button>
                </td>
    
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p class="mx-5">注文履歴はございません。</p>
      @endif
  </div>
</div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              {{-- <x-flash-message status="session('status')" /> --}}
                <input type="hidden" name="status" value="">
                  <div>
                    <div class="mb-4 p-2 w-2/2 mx-auto">
                      <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">【配達が完了したらボタンを押してください】</label>             
                            <form id="status-form" action="{{ route('order.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button id="status-btn" type="submit" class="{{ $order->order_status === 'completed' ? 'bg-gray-400' : 'bg-detail' }} py-2 px-4">
                                  {{ config('shippingstatus.statuses')[$order->order_status] }}
                                </button>
                              </form>                          
                        </div>
                      </div>
                    </div>
                    <div class="mt-3 p-2 w-2/2">
                     【注文詳細】  
                      </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">注文ID</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->id }}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">注文日時</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->created_at }}
                          </div>
                      </div>
                    </div>
                    {{-- <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">商品ID</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->product->id }}
                          </div>
                      </div>
                    </div> --}}
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->product->name }}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">購入数</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->quantity}}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">商品金額</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{  number_format($order->price) }}円
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">送料</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{  number_format($order->shipping_fee) }}円
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">お支払い金額</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{  number_format($order->total_price + $order->shipping_fee) }}円
                          </div>
                      </div>
                    </div>
      
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">配送先宛名</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->shipping_name }}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">配送先郵便番号</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->shipping_zipcode }}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">配送先住所</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                            {{ $order->shipping_prefecture }}{{ $order->shipping_city }}
                          </div>
                      </div>
                    </div>
                    <div class="p-2 w-2/2 mx-auto">
                      <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">配送先電話番号</label>
                          <div class="w-full bg-gray-100 bg-opacity-50 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                              {{ $order->shipping_tel }}
                          </div>
                      </div>
                    </div>
      
                      <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('order.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400">戻る</button>                  </div>
      
                  </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        document.getElementById('status-btn').addEventListener('click', function(event) {
          event.preventDefault();
          const form = document.getElementById('status-form');
      
          // ステータスが'shipped'の場合のみ更新
          if ('{{ $order->order_status }}' === 'shipped') {
            if (confirm('配達完了に変更しますか？')) {
              form.submit();
            }
          } else {
            alert('変更できません。');
          }
        });
    </script>
    </x-app-layout>
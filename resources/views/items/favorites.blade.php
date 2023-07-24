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
        <h1 class="text-start">F<span class="title-font">AVORITE</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        @foreach ($products as $product)
                        <div class="w-1/4 p-2 md:p-4">
                            @if($product->getStockQuantity() > 0)
                            <a href="{{ route('items.show', ['item' => $product->id ]) }}">
                            @endif
                                <div class="mt-4">
                                    @if($product->image !=='')
                                    <img src="{{ config('aws.S3.url').'/'.$product->image }}" alt="..." class="img-thumbnail">
                                    @else
                                    <img src="../../images/noimage.jpg" alt="..." class="img-thumbnail">
                                    @endif
                                    <div class="text-gray-500 text-xs sm:text-xs tracking-widest mb-1" style="overflow-wrap: break-word;">{{ $product->store_name }}</div> 
                                    @foreach($categories as $index => $category_name)
                                    @if($index === $product->category_id)
                                    <div class="text-gray-500 text-xs sm:text-xs tracking-widest mb-1">{{ $category_name }}</div> 
                                    @endif
                                    @endforeach
                                    <div class="text-black-700 text-sm sm:text-sm font-medium">{{ $product->name }}</div>
                                    {{-- <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2> --}}
                                    <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></p>
                                    <!-- 在庫チェック -->
                                    @if($product->getStockQuantity() == 0)
                                    <p class="text-red-500">SOLD OUT</p>
                                    @endif
                                </div>
                            @if($product->getStockQuantity() > 0)
                            </a>
                            @endif
                        </div>
                        @endforeach    
                    </div>

                    <div class="mt-5">
                    {{ $products->links() }}
                    </div>
                </div>
            </div>
    </div>
</div>
</x-app-layout>
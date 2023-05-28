<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        商品一覧
    </h2>
</x-slot>
<div class="py-6">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-wrap">
                    @foreach($products as $product)
                        <div class="w-1/4 p-2 md:p-4">
                            <a href="{{ route('items.show', ['item' => $product->id ]) }}">
                                @if(!empty($product->productImages[0]->image))
                                <img src="{{ config('aws.S3.url').'/'.$product->productImages[0]->image }}" id="sort_num" alt="..." class="img-thumbnail">
                                @else
                                    <img src="../../../images/noimage.jpg" class="img-thumbnail">
                                @endif
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->store_name }}</h3> 
                                @foreach($categories as $index => $category_name)
                                @if($index === $product->category_id)
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $category_name }}</h3> 
                                @endif
                                @endforeach 
                                <p class="test leading-relaxed font-semibold">{{ $product->name }}</p>
                                <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></p>        
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
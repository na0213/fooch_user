<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <div class="py-6 px-4">
        <div class ="flex justify-between items-center">
            <div>
                <form method="get" action="{{ route('top.index') }}">
                    <div class="flex">
                        <div>
                            <span class="text-sm">表示順</span><br>
                            <select id="sort" name="sort" class="mb-4">
                                <option value="{{ \Constant::SORT_ORDER['recommend'] }}"
                                @if(\Request::get('sort') === \Constant::SORT_ORDER['recommend'])
                                selected
                                @endif>おすすめ順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
                                @if(\Request::get('sort') === \Constant::SORT_ORDER['higherPrice'])
                                selected
                                @endif>料金の高い順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
                                @if(\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice'])
                                selected
                                @endif>料金の低い順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['later'] }}"
                                @if(\Request::get('sort') === \Constant::SORT_ORDER['later'])
                                selected
                                @endif>新しい順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['older'] }}"
                                @if(\Request::get('sort') === \Constant::SORT_ORDER['older'])
                                selected
                                @endif>古い順
                                </option>                  
                            </select>
                        </div>
                        <div>
                            <span class="text-sm">表示件数</span><br>
                            <select id="pagination" name="pagination">
                                <option value="20"
                                @if(\Request::get('pagination') === '20')
                                selected
                                @endif>20件
                                </option>
                                <option value="50"
                                @if(\Request::get('pagination') === '50')
                                selected
                                @endif>50件
                                </option>
                                <option value="100"
                                @if(\Request::get('pagination') === '100')
                                selected
                                @endif>100件
                                </option>
                              </select>                
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        @foreach($products as $product)
                            <div class="w-1/4 p-2 md:p-4">
                                <a href="{{ route('top.show', ['item' => $product->id ]) }}">
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
                                    {{-- <p class="mt-1">{{ number_format($product->price_with_tax) }}<span class="text-sm text-gray-700">円(税込)</span></p>         --}}
                                </a>
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
<script>
    const select = document.getElementById('sort')
    select.addEventListener('change', function(){
        this.form.submit()
    })
    const paginate = document.getElementById('pagination')
    paginate.addEventListener('change', function(){
        this.form.submit()
    })
</script>
</x-guest-layout>
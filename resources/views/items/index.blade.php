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
.exclusions {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 10px;
    align-items: center;
}
.exclusions label {
    display: flex;
    align-items: center;
    cursor: pointer;
}
.exclusions input[type=checkbox] {
    transform: scale(1.5);
    margin-right: 10px;
}
.search-button {
    clear: both;
}
</style>
         
    <div class="mb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-start">I<span class="title-font">TEMS</h1>
            <form method="get" action="{{ route('items.index') }}">
                <div class="row">
                    <div class="col-12">
                        <div class="ml-auto">
                            <div class="flex justify-end items-end">
                            <select id="sort" name="sort" class="w-[200px] mb-4 mr-4 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                            </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <div class="mb-5 mr-5 ml-5">
                                <input name="keyword" placeholder="キーワード" value="{{ old('keyword', \Request::get('keyword')) }}" class="w-2/5 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <select name="category" class="2/5 mt-2 mb-10 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="0" @if(old('category', \Request::get('category')) === '0') selected @endif>全て</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('category', \Request::get('category')) == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button class="bg-lyellow border-0 py-2 px-6 focus:outline-none hover:bg-yellow-500">検索</button>
                            </div>
                        </div>
                        <p class="text-xs md:text-base mr-5 ml-4">▼除外したい原材料がある場合はチェックして検索してください▼</p>
                        <p class="text-red-600 text-sm md:text-sm mt-2 ml-5">※注：選択した原材料が全て除外できていない可能性もございます。<br>各商品の原材料は商品詳細画面にてご確認ください。</p>
                        <div>
                            <option value="" @if(\Request::get('exclusion') === '') selected @endif></option>
                            <p class="mb-2 p-2 leading-7 text-base text-gray-600">◆アレルギー項目</p>
                            <div class="exclusions" name="exclusion_id">
                                
                            @foreach($exclusions as $exclusion)
                                @if($exclusion->name == '白砂糖')
                                    </div>
                                    <p class="mt-3 p-2 leading-7 text-base text-gray-600"></p>
                                    <div class="exclusions" name="exclusion_id">
                                @endif
                                @if($exclusion->name == '保存料')
                                    </div>
                                    <p class="mt-3 p-2 leading-7 text-base text-gray-600"></p>
                                    <div class="exclusions" name="exclusion_id">
                                @endif
                                <label class="my-checkbox ml-4">
                                    <input id="checkbox{{ $exclusion->id }}" type="checkbox" name="exclusion_id[]" value="{{ $exclusion->id }}" @if(is_array(old('exclusion_id', \Request::get('exclusion_id'))) && in_array($exclusion->id, old('exclusion_id', \Request::get('exclusion_id')))) checked @endif>{{ $exclusion->name }}
                                </label>
                            @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center p-2 mt-4 mb-5 search-button">
                </div> 
    
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if($products->count() == 0)
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                            <p class="font-bold">検索結果は0件です</p>
                        </div>
                        @else
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
                                        <h3 class="text-gray-500 text-xs tracking-widest mb-1">{{ $product->store_name }}</h3> 
                                        @foreach($categories as $category)
                                        @if($category->id === $product->category_id)
                                        <h3 class="text-gray-500 text-xs tracking-widest mb-1">{{ $category->name }}</h3> 
                                        @endif
                                        @endforeach
                                        <h2 class="text-gray-900 text-sm sm:text-base font-medium">{{ $product->name }}</h2>
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
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    const select = document.getElementById('sort');
    select.addEventListener('change', function() {
        this.form.submit();
    });
    </script>
</x-app-layout>
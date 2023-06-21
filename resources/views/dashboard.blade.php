<x-app-layout>
    <style>
        h1 {
            font-size: 40px;
            color: #faee41;
        }
        .title-font {
            font-size: 20px;
            color: gray;
        }
        #exclusions label {
            display: block;
            float: left;
            width: 150px;
            cursor: pointer;
            margin: 0 0 20px 30px;
        }
        input[type=checkbox] {
            transform: scale(1.5);
            margin: 0 15px 0 0;
        }
        .search-button {
        clear: both;
        }
        @media screen and (max-width: 600px) {
        h1 {
            font-size: 20px;
            color: #faee41;
        }
        .title-font {
            font-size: 12px;
            color: gray;
        }
        }
    </style>
    <div class="relative lg:w-full w-full flex items-center justify-center text-center">
        <img src="../../images/foochtop.jpg" alt="fooch" class="w-full">

        <div class="absolute right-0 w-1/2 flex flex-col justify-center items-start text-left p-5 bg-semi-transparent-yellow">
            <h1 class="text-start font-bold">原<span class="title-font">材料から始まる食のstory</h1>
            <p class="text-xs sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-2">体質、生き方、好き嫌い、</p>
            <p class="text-xs sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-2">100人いれば100通りの食生活（story）がある</p>
            <p class="text-xs sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-4">食べたいものを原材料から選んでみよう</p>
            <a href="{{ route('home.whatis') }}" class="w-full relative block">
            <p class="text-xs sm:text-base font-bold leading-relaxed text-gray-700 underline decoration-solid hover:text-yellow-500">▷show more</p>
            </a>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
            </section>
    
            <form method="get" action="{{ route('items.index') }}">
                <div class="row">
                <div class="col-12">
                    <p class="h5 mr-5 ml-5">キーワード</p>
                    <div>
                        <div class="mb-10 mr-5 ml-5"><input name="keyword" placeholder="キーワード" class="w-full bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></div>
                    </div>
                    <p class="h5 mr-5 ml-5">カテゴリー</p>
                    <div class="row">
                        <div class="col-md-8 mb-5 mr-5 ml-5">
                        <div id="categories">
                            <select name="category" class="w-full mt-2 mb-10 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="0" @if(\Request::get('category') === '0') selected @endif>全て</option>
                                @foreach($categories as $index => $name)
                                <option value="{{ $index }}" @if(\Request::get('category') == $index) checked @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                
                    <p class="h5 mr-5 ml-4">除外したい原材料を選択してください</p>
                    <p class="h6 mt-5 ml-2">※注：選択した原材料が全て除外できていない可能性もございます。<br>各商品の原材料は商品詳細画面にてご確認ください。</p>

                        <div id="exclusions" name="exclusion_id">
                            <option value="" @if(\Request::get('exclusion') === '') selected @endif></option>
                            @foreach($exclusions as $index => $name)
                            <label class="my-checkbox ml-4">
                            <input type="checkbox" id="exclusion_id" name="exclusion_id[]" value="{{ $index }}" @if(\Request::get('exclusion') == $index) selected @endif>{{ $name }}
                            </label>
                            @endforeach
                        </div>
                </div>
                </div>
                <div class="text-center p-2 mt-4 mb-5 search-button">
                    <button class="bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">検索</button>
                </div> 
            </form>
    
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
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->store_name }}</h3> 
                                    @foreach($categories as $index => $category_name)
                                    @if($index === $product->category_id)
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $category_name }}</h3> 
                                    @endif
                                    @endforeach 
                                    <h2 class="text-gray-900 title-font text-sm sm:text-base font-medium">{{ $product->name }}</h2>
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

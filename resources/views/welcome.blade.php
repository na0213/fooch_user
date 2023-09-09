<x-guest-layout>
    <x-slot name="title">
    '【原材料から選ぶ】食の総合マーケット'
    </x-slot>

    <x-slot name="description">
        'グルテンフリー、無添加食品、アレルギーなど、食の多様化が進む時代に、指定した原材料を除外して検索できる食の総合サイトです。
        探したい商品をより探しやすく。'
    </x-slot>
    <style>
        h1 {
            font-size: 40px;
            color: #faee41;
        }
        .title-font {
            font-size: 20px;
            color: gray;
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
        @media screen and (max-width: 600px) {
        h1 {
            font-size: 25px;
            color: #faee41;
        }
        .title-font {
            font-size: 13px;
            color: gray;
        }
        }
    </style>
    <div class="relative lg:w-full w-full flex items-center justify-center text-center">
        <img src="../../images/foochtop.jpg" alt="fooch" class="w-full">

        <div class="absolute right-0 w-3/5 md:w-1/2 flex flex-col justify-center items-start text-left p-5 bg-semi-transparent-yellow">
            <h1 class="text-start font-bold">原<span class="title-font">材料から始まる食のstory</h1>
            <p class="text-sm sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-2">体質、生き方、好き嫌い、</p>
            <p class="text-sm sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-2">100人いれば100通りの食生活-story-がある</p>
            <p class="text-sm sm:text-base font-medium leading-relaxed text-gray-700 sm:mb-4">食べたいものを原材料から選んでみよう</p>
            <a href="{{ route('top.whatis') }}" class="w-full relative block">
            <p class="text-sm sm:text-base font-bold leading-relaxed text-gray-700 underline decoration-solid hover:text-yellow-500">▷もっと見る</p>
            </a>
        </div>
    </div>
         
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="get" action="{{ route('top.index') }}">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-start">
                            <div class="mb-5 mr-5 ml-5">
                                <input name="keyword" placeholder="キーワード" class="w-2/5 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <select name="category" class="w-2/5  mt-2 mb-10 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="0" @if(old('category', \Request::get('category')) === '0') selected @endif>全て</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category', \Request::get('category')) == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                </select>
                                <button class="bg-lyellow border-0 py-2 px-6 focus:outline-none hover:bg-yellow-500">検索</button>
                            </div>
                        </div>
                        {{-- <p class="text-sm sm:text-base mr-5 ml-4 mb-2 font-bold leading-relaxed text-gray-700 underline decoration-solid">▽and more</p> --}}
                        <p class="text-sm md:text-base mr-5 ml-4">▼除外したい原材料がある場合はチェックして検索してください▼</p>
                        <p class="text-red-600 text-sm md:text-sm mt-2 ml-5">※注：選択した原材料が全て除外できていない可能性もございます。<br>各商品の原材料は商品詳細画面にてご確認ください。</p>
                        <div>
                            <option value="" @if(\Request::get('exclusion') === '') selected @endif></option>
                            {{-- <p class="mb-2 p-2 leading-7 text-base text-gray-600">◆アレルギー項目</p> --}}
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
                                    <input id="checkbox{{ $exclusion->id }}" type="checkbox" name="exclusion_id[]" value="{{ $exclusion->id }}" @if(\Request::get('exclusion') == $exclusion->id) checked @endif onchange="updateAllergy()">{{ $exclusion->name }}
                                </label>
                            @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center p-2 mt-4 mb-5 search-button">
                    <button class="bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-yellow-500">検索</button>
                </div> 
            </form>
    
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        @foreach ($products as $product)
                        <div class="w-1/4 p-2 md:p-4">
                            @if($product->getStockQuantity() > 0)
                            <a href="{{ route('top.show', ['item' => $product->id ]) }}">
                            @endif
                                <div class="mt-4">
                                    @if($product->image !=='')
                                    <img src="{{ config('aws.S3.url').'/'.$product->image }}" alt="..." class="img-thumbnail">
                                    @else
                                    <img src="../../images/noimage.jpg" alt="..." class="img-thumbnail">
                                    @endif
                                    <div class="text-gray-500 text-xs sm:text-xs tracking-widest mb-1" style="overflow-wrap: break-word;">{{ $product->store_name }}</div> 
                                    @foreach($categories as $category)
                                    @if($category->id === $product->category_id)
                                    <div class="text-gray-500 text-xs sm:text-xs tracking-widest mb-1">{{ $category->name }}</div> 
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

</x-guest-layout>

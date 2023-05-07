<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>
    <style>
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
    </style>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center lg:w-2/3 w-full">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">FOOCH</h1>
                    <p class="test mb-8 leading-relaxed">原材料から選ぶ</p>
                </div>
                </div>
            </section>
    
            <form method="get" action="{{ route('dashboard') }}">
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
                                {{-- <a href="{{ route('user.items.show', ['item' => $product->id ]) }}"> --}}
                                    <div class="mt-4">
                                        @if($product->image !=='')
                                        <img src="{{ config('aws.S3.url').'/'.$product->image }}" alt="..." class="img-thumbnail">
                                        @else
                                        <img src="../../images/noimage.jpg" alt="..." class="img-thumbnail">
                                        @endif
                                        @foreach($categories as $index => $category_name)
                                        @if($index === $product->category_id)
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $category_name }}</h3> 
                                        @endif
                                        @endforeach 
                                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                        <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></p>
                                        {{-- <p class="mt-1">{{ number_format($product->price_with_tax) }}<span class="text-sm text-gray-700">円(税込)</span></p> --}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>

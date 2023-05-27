<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-3 py-10 mx-auto">
                        <div class="container text-justify">
                            <h1 class="text-gray-900 text-2xl title-font font-medium">{{ $product->name }}</h1>
                            @foreach($categories as $index => $category_name)
                            @if($index === $product->category_id)
                            <h3 class="text-sm title-font text-gray-500 tracking-widest mt-1"> {{ $category_name }}</h2>
                            @endif
                            @endforeach 
                        </div>
                        <div class="container text-right mb-2">
                            <span class="text-md text-gray-900">商品金額：</span><span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price)}}円（税込）</span>
                            {{-- <span class="title-font font-medium text-2xl text-gray-900">商品金額：{{ number_format($product->price_with_tax)}}円（税込）</span> --}}
                            <br>
                            @if($product->shipping_pattern)
                            <span class="text-md text-gray-900">送料：</span><span class="title-font font-medium text-xl text-gray-900">{{ number_format($product->shipping_pattern->calculateShippingFee($user_prefecture)) }}円</span>
                            @else
                                <span class="title-font font-medium text-lg text-gray-900">送料込み</span>
                            @endif
                        </div>
                                             
                        <form method="post" action="{{ route('cart.add') }}">
                            @csrf
                        <div class="container text-right mb-2">
                            <button class="flex ml-auto bg-mimosa border-0 py-2 px-6 focus:outline-none hover:bg-yellow-500">カートに入れる</button> 
                        </div>
                        <div class="container text-right mb-5">
                            <span class="mr-3 ml-8">数量</span>
                            <select name="quantity" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                @for ($i = 1; $i <= $quantity; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                        <div class="lg:w-5/5 mx-auto flex flex-wrap">
                            <div class="w-4/4 p-2 md:p-4">
                            <section>
                                <div class = "center">
                                  <div class="mb-2">
                                  <img src="{{ config('aws.S3.url').'/'.$imagearray[0] }}" alt="..." id="bigimg">
                                  </div>
                                  <ul class="ulimage flex">
                                    <li class="w-1/4 liimage mr-2">
                                      @if(!empty($imagearray[0]))
                                      <img src="{{ config('aws.S3.url').'/'.$imagearray[0] }}" alt="..." class="thumb" data-image="{{ config('aws.S3.url').'/'.$imagearray[0] }}">
                                      @else
                                      <img src="../../images/noimage.jpg" alt="..." class="hidden">
                                      @endif
                                    </li>
                                    <li class="w-1/4 liimage mr-2">
                                      @if(!empty($imagearray[1]))
                                      <img src="{{ config('aws.S3.url').'/'.$imagearray[1] }}" alt="..." class="thumb" data-image="{{ config('aws.S3.url').'/'.$imagearray[1] }}">
                                      @else
                                      <img src="../../images/noimage.jpg" alt="..." class="hidden">
                                      @endif
                                    </li>
                                    <li class="w-1/4 liimage mr-2">
                                      @if(!empty($imagearray[2]))
                                      <img src="{{ config('aws.S3.url').'/'.$imagearray[2] }}" alt="..." class="thumb"data-image="{{ config('aws.S3.url').'/'.$imagearray[2] }}">
                                      @else
                                      <img src="../../images/noimage.jpg" alt="..." class="hidden">
                                      @endif
                                    </li>
                                  </ul>
                                </div>
                            </section>
                            </div>
                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <div class="flex mb-4">
                                <a href="{{ route('store.show', ['store' => $product->store->id]) }}">
                                <h3 class="text-gray-500 pl-3 text-2xl border-l-2 border-gray-200 title-font font-medium mb-1">{{ $product->store->name }}</h3>
                                </a>
                            </div>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">内容量</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->content_volume}}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">原材料名</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->ingredients }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">添加物</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->additives }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">アレルギー表示対象品目</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->allergy }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">賞味期限</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->expiration }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">保存方法</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->storage_method }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">主な原産地</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->origin}}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">栄養成分</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->nutrition_facts}}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">商品紹介</p>
                            <p class="leading-relaxed text-sm text-gray-900 pl-3 border-l-2 border-gray-200 mb-5">{{ $product->info }}</p>
                            <p class="leading-relaxed font-bold text-sm text-gray-900 mb-1">送料</p>
                            @if ($product->shipping_patterns_id === 0)
                            <p>送料込み</p>
                            @else
                            <p>北海道：{{ number_format($product->shipping_pattern->hokkaido_fee) }} 円</p>
                            <p>北東北：{{ number_format($product->shipping_pattern->ktohoku_fee) }} 円</p>
                            <p>南東北：{{ number_format($product->shipping_pattern->mtohoku_fee) }} 円</p>
                            <p>関東：{{ number_format($product->shipping_pattern->kanto_fee) }} 円</p>
                            <p>信越：{{ number_format($product->shipping_pattern->shinetsu_fee) }} 円</p>
                            <p>北陸：{{ number_format($product->shipping_pattern->hokuriku_fee) }} 円</p>
                            <p>中部：{{ number_format($product->shipping_pattern->tyubu_fee) }} 円</p>
                            <p>関西：{{ number_format($product->shipping_pattern->kansai_fee) }} 円</p>
                            <p>中国：{{ number_format($product->shipping_pattern->tyugoku_fee) }} 円</p>
                            <p>四国：{{ number_format($product->shipping_pattern->shikoku_fee) }} 円</p>
                            <p>九州：{{ number_format($product->shipping_pattern->kyushu_fee) }} 円</p>
                            <p>沖縄：{{ number_format($product->shipping_pattern->okinawa_fee) }} 円</p>
                            @endif
                            <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5"></div>
                         </div>
                        </div>
                      </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        var thumbs = document.querySelectorAll('.thumb');
        for(var i = 0; i < thumbs.length; i++){
        thumbs[i].onclick = function(){
        document.getElementById('bigimg').src = this.dataset.image;
        };
        }
    </script>
    </x-app-layout>
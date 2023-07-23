<x-guest-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row">
                <div class="order-first w-full bg-white sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5 flex items-start justify-center">
                    @if(!empty($store->image))
                        <img class="store-image" src="{{ config('aws.S3.url').'/'.$store->image }}" alt="店舗画像" class="img-thumbnail">
                    @endif
                </div>
                <div class="flex w-full bg-gray-100 flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
                  <h2 class="text-xl font-bold text-gray-800 md:text-2xl lg:text-4xl" style="overflow-wrap: break-word;">{{ $store->name }}</h2>
                  <p class="mb-4">{{ optional($store->specificBusinessTransaction)->prefecture }}</p>
    
                  <p class="mb-8 max-w-md text-gray-600">{!! nl2br(e($store->info)) !!}</p>
    
                  @if($store->status === 'using' || $store->status === 'draft')
                  <div class="mt-auto">
                    <a href="{{ route('top.specificBusinessTransaction', $store) }}" class="max-w-md text-gray-600 underline">特定商取引法に基づく表記</a>
                  </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
    {{-- <style>
        body {
                margin: 0;
                font-family: Arial, sans-serif;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
            .header {
                display: flex;
                align-items: center;
                margin-bottom: 5px;
            }
            .logo {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
            }
            .store-name {
                font-size: 32px;
                margin-left: 20px;
                flex-grow: 1;
                white-space: pre-wrap;
            }
            .store-prefecture {
                display: block;
                margin-left: 20px;
                margin-bottom: 20px;
                font-size: 14px;
            }
            .store-image-container {
                width: 50%;
                margin: 0 auto;
            }
            .store-image {
                width: 100%;
                display: block;
            }
            .store-description {
                margin-top: 40px;
                margin-right: 40px;
                margin-left: 40px;
                white-space: pre-wrap;
            }
    </style>    
    <div class="container">
        <div class="container">
            <div class="header" style="display: flex; align-items: start;">
                <div class="store-info" style="display: flex; flex-direction: column; margin-right: 16px;">
                    <h1 class="store-name">{{ $store->name }}</h1>
                    <div class="store-prefecture">{{ optional($store->specificBusinessTransaction)->prefecture }}</div>
                    <a href="{{ route('top.specificBusinessTransaction', $store) }}" class="store-specific">特定商取引法に基づく表記</a>
                </div>
                <div class="store-image-container">
                    @if(!empty($store->image))
                        <img class="store-image" src="{{ config('aws.S3.url').'/'.$store->image }}" alt="店舗画像" class="img-thumbnail">
                    @endif
                </div>
            </div>
            <div class="store-description text-lg">{!! nl2br(e($store->info)) !!}</div>
        </div>
    </div> --}}

    <div class="p-4 w-full flex justify-around mt-4">
        <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>
    </div>
</x-guest-layout>
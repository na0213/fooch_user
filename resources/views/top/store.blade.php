<x-guest-layout>
    <style>
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            店舗情報
        </h2>
    </x-slot>
    <div class="py-6">
        <div class ="flex justify-between items-center">
            <div class="container">
                <div class="header" style="display: flex; align-items: center;">
                    @if(!empty($store->image))
                        <img class="logo" src="{{ config('aws.S3.url').'/'.$store->image }}" alt="ロゴ" class="img-thumbnail">
                    @endif
                    <div class="store-info" style="display: flex; flex-direction: column; margin-left: 16px;">
                        <h1 class="store-name">{{ $store->name }}</h1>
                        <div class="store-prefecture">{{ $store->prefecture }}</div>
                    </div>
                </div>
                
                <div class="store-image-container">
                @if(!empty($store->image))
                    <img class="store-image" src="{{ config('aws.S3.url').'/'.$store->image }}" alt="店舗画像" class="img-thumbnail">
                @else
                    <img class="store-image" src="{{ asset('images/noimage.jpg') }}">
                @endif
                </div>
                <div class="store-description text-lg">{!! nl2br(e($store->info)) !!}</div>
            </div>
        </div>
    </div>
    <div class="p-4 w-full flex justify-around mt-4">
        <button type="button" onclick="window.history.back()" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 text-lg">戻る</button>
    </div>
</x-guest-layout>
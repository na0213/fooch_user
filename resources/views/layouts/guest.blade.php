<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>【原材料から選ぶ】食の総合マーケット</title>
        <meta name="description" content="{{ $description ?? '食品の原材料から、除外したい原材料を指定して検索できる食の総合サイト。食の多様化が進む時代に、探したいものをより探しやすく。' }}">

        <link rel="icon" href="/favicon.png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Google tag (gtag.js) -->
        @production
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-JV9S5GW117"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-JV9S5GW117');
            </script>
        @endproduction

    </head>
    <body class="font-sans antialiased">
        {{-- <div class="min-h-screen bg-gray-100"> --}}
        <div class="min-h-screen bg-white">
            @include('layouts.nav')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <footer style="background-color: #f2f2f2;">
        <div class="grid grid-cols-2 gap-8 py-8 px-6 md:grid-cols-4">
            <div>
                <ul class="text-black-500 dark:text-black-400">
                    <li class="mb-4">
                        <x-nav-link :href="route('top.whatis')" :active="request()->routeIs('top.whatis')">
                            {{ __('FOOCHとは') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('top.index')" :active="request()->routeIs('top.index')">
                            {{ __('商品一覧') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('top.fooch_faq')" :active="request()->routeIs('top.fooch_faq')">
                            {{ __('よくある質問') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="text-black-500 dark:text-black-600">
                    <li class="mb-4">
                        {{-- <x-nav-link :href="route('terms')" :active="request()->routeIs('terms')"> --}}
                        <x-nav-link :href="route('terms')" :active="request()->routeIs('welcome')">
                            {{ __('利用規約') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('legal')" :active="request()->routeIs('legal')">
                            {{ __('特定商取引法に基づく表記') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        {{-- <x-nav-link :href="route('privacy')" :active="request()->routeIs('privacy')"> --}}
                        <x-nav-link :href="route('terms')" :active="request()->routeIs('welcome')">
                            {{ __('プライバシーポリシー') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('事業概要') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="py-6 px-4 bg-gray-100 dark:bg-gray-700 text-center">
            <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">FOOCH</a>.
            </span>
        </div>
    </footer>

</html>

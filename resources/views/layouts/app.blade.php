<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

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
                        <x-nav-link :href="route('home.whatis')" :active="request()->routeIs('home.whatis')">
                            {{ __('FOOCHとは') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('items.index')" :active="request()->routeIs('items.index')">
                            {{ __('商品一覧') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                            {{ __('お問合せ') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="text-black-500 dark:text-black-600">
                    <li class="mb-4">
                        <x-nav-link :href="route('home.terms')" :active="request()->routeIs('home.terms')">
                            {{ __('利用規約') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('home.legal')" :active="request()->routeIs('home.legal')">
                            {{ __('特定商取引法に基づく表記') }}
                        </x-nav-link>
                    </li>
                    <li class="mb-4">
                        <x-nav-link :href="route('home.privacy')" :active="request()->routeIs('home.privacy')">
                            {{ __('プライバシーポリシー') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="py-6 px-4 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">FOOCH</a>.
            </span>
        </div>
    </footer>
</html>

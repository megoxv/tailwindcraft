<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! SEO::generate() !!}
        <link rel="shortcut icon" href="{{ getSetting('favicon') }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ getSetting('light_logo') }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="google-site-verification" content="XsRtxPAX4lgZKFEo787XLropFk9una4oaPURl9ZcY-o" />
        <!-- Scripts -->
        @toastScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @livewireStyles
        @stack('styles')
        {!! getSetting('header_code') !!}
    </head>

    <body class="bg-dark font-sans antialiased">
        <livewire:toasts />
        {{-- Navbar --}}
        @include('front.layouts.navbar')
        {{-- End Navbar --}}

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
        {{-- End Main Content --}}

        {{-- Footer --}}
        @include('front.layouts.footer')
        {{-- End Footer --}}
        {{-- Scripts --}}
        @include('front.layouts.scripts')
    </body>
</html>

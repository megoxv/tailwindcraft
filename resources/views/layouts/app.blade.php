<!DOCTYPE html>
@php
    $languages = \App\Models\Language::where('status', 1)->orderBy('name', 'asc')->get();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @foreach ($languages as $lang)@if(App::getLocale() == $lang->code) dir="{{ $lang->direction }}" @endif @endforeach>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        <link rel="shortcut icon" href="{{ getSetting('favicon') }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ getSetting('light_logo') }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        @toastScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        <style>
            [x-cloak] { display: none !important; }
        </style>
        @livewireStyles
        @stack('styles')
        {!! getSetting('header_code') !!}
    </head>
    <body class="font-prompt antialiased">
        <livewire:toasts />
        <div class="bg-dark">
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
        </div>
        {{-- Scripts --}}
        @include('front.layouts.scripts')
    </body>
</html>

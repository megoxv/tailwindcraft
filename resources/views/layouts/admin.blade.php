<!DOCTYPE html>
@php
    $languages = \App\Models\Language::where('status', 1)->orderBy('name', 'asc')->get();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @foreach ($languages as $lang)@if(App::getLocale() == $lang->code) dir="{{ $lang->direction }}" @endif @endforeach>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('main.dashboard') }}</title>
    <link rel="shortcut icon" href="{{ getSetting('favicon') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ getSetting('favicon') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    {{-- Font --}}
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- Scripts --}}
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Styles --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <livewire:toasts />
    {{-- Navbar --}}
    @include('admin.layouts.navbar')
    {{-- End Navbar --}}

    {{-- Sidebar Toggle --}}
    <div
        class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center py-4">
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar"aria-controls="application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->

            <ol class="ml-3 rtl:ml-auto rtl:mr-3 flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
                <li class="flex items-center text-sm text-gray-800 dark:text-gray-400">
                    {{ __('main.dashboard') }}
                    <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 rtl:rotate-180 text-gray-400 dark:text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-400" aria-current="page">
                    @yield('title')
                </li>
            </ol>

            <!-- End Breadcrumb -->
        </div>
    </div>
    {{-- End Sidebar Toggle --}}

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')
    {{-- End Sidebar --}}

    {{-- Content --}}
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72 rtl:lg:pl-0 rtl:lg:pr-72">
        @yield('content')
    </div>
    {{-- End Content --}}

    {{-- Scripts --}}
    @include('admin.layouts.scripts')
</body>

</html>

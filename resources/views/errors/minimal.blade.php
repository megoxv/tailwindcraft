<!DOCTYPE html>
@php
    $languages = \App\Models\Language::where('status', 1)
        ->orderBy('name', 'asc')
        ->get();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    @foreach ($languages as $lang)@if (App::getLocale() == $lang->code) dir="{{ $lang->direction }}" @endif @endforeach>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ getSetting('favicon') }}" type="image/x-icon">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen bg-dark">
    <div class="max-w-[50rem] flex flex-col justify-center items-center mx-auto w-full h-full">
        <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
            <h1 class="block text-7xl font-bold text-white sm:text-9xl">@yield('code')</h1>
            <p class="text-gray-400 dark:text-gray-400">@yield('message')</p>
            <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-primary-500 hover:text-primary-700 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm py-3 px-4 dark:ring-offset-gray-900">
                    <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    {{ __('main.back_to_home') }}
                </a>
            </div>
        </div>

        <footer class="text-center py-5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-sm text-gray-300">© {{ getSetting('website_name') }}.
                    {{ __('main.all_rights_reserved') }}.</p>
            </div>
        </footer>
    </div>
</body>

</html>

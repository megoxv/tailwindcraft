@extends('layouts.admin')
@section('title', __('main.ads_manager'))

@section('content')
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        {{-- Clicks Today Clicks --}}
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            {{ __('main.today_so_far') }}
                        </p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                            {{ $totalClicksToday }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Clicks Today Clicks --}}
        {{-- Yesterday Clicks --}}
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            {{ __('main.yesterday_clicks') }}
                        </p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                            {{ $totalClicksYesterday }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Yesterday Clicks --}}
        {{-- Last 7 days Clicks --}}
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            {{ __('main.last_7_days') }}
                        </p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                            {{ $totalClicks7Days }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Last 7 days Clicks --}}
        {{-- This month Clicks --}}
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            {{ __('main.this_month') }}
                        </p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                            {{ $totalClicksThisMonth }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- End This month Clicks --}}

    </div>
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- header -->
        <div class="flex justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __('main.ads_manager') }}</h2>
            </div>
            @can('ads-manager-create')
                <a href="{{ route('admin.ads-manager.create') }}" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    {{ __('main.add_new') }}
                </a>
            @endcan
        </div>
        <!-- end header -->
        <!-- table -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-gray-900 dark:border-gray-700">
                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-start">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.name') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.clicks') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.status') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.actions') }}
                                        </span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($adsManager as $ad)
                                    <tr>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.ads-manager.show', $ad) }}" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $ad->name }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <span class="block text-sm text-gray-500">{{ $ad->clicks }}</span>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div>
                                                @if ($ad->enabled == 1)
                                                <form method="POST" action="{{ route('admin.ads-manager.disable', $ad->id) }}"
                                                    onsubmit="return confirm('Are you sure you want to disable the ad?');">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5 cursor-pointer mr-3 text-red-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('admin.ads-manager.enable', $ad->id) }}" onsubmit="return confirm('Are you sure you want to enable the ad?');">
                                                    @csrf
                                                    <button type="submit"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5 cursor-pointer mr-3 text-green-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            </div>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div>
                                                <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                    <button id="hs-table-dropdown-{{ $ad->id }}" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                        </svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-2xl rounded-xl p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                                        aria-labelledby="hs-table-dropdown-{{ $ad->id }}">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            @can('ads-manager-update')
                                                                <a href="{{ route('admin.ads-manager.edit', $ad) }}"
                                                                    class="block w-full text-start py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                                                    {{ __("main.edit") }}
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        @can('ads-manager-delete')
                                                            <form method="POST" action="{{ route('admin.ads-manager.destroy', $ad) }}" id="delete-{{ $ad->id }}">@csrf @method('PUT')
                                                            </form>
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <button data-hs-overlay="#delete-{{ $ad->id }}"
                                                                    class="block w-full text-start py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700">
                                                                    {{ __('main.delete') }}
                                                                </button>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- Delete --}}
                                @can('menus-delete')
                                    <div id="delete-{{ $ad->id }}" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                                            <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                                <div class="absolute top-2 right-2">
                                                    <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#delete-{{ $ad->id }}">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="p-4 sm:p-10 overflow-y-auto">
                                                    <div class="flex gap-x-4 md:gap-x-7">
                                                        <!-- Icon -->
                                                        <span class="flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                        </span>
                                                        <!-- End Icon -->
                                                        <div class="grow">
                                                            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                                {{ __('main.confirmation') }}
                                                            </h3>
                                                            <p class="text-gray-500">
                                                                {{ __('main.are_you_sure_you_want_to_delete') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.ads-manager.destroy', $ad) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                                        <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#delete-{{ $ad->id }}">
                                                            {{ __('main.cancel') }}
                                                        </button>
                                                        <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                            {{ __('main.delete') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                {{-- End Delete --}}
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end table -->
    </div>
@endsection
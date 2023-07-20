@extends('layouts.admin')
@section('title', __('main.languages'))

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- header -->
        <div class="flex justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __('main.languages') }}</h2>
            </div>
            @can('languages-create')
                <button class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" data-hs-overlay="#create-lang">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    {{ __('main.add_new_language') }}
                </button>
            @endcan
        </div>
        <!-- end header -->
        <!-- table -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-gray-900 dark:border-gray-700">
                        @can('languages-create')
                            <div id="create-lang" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                <div
                                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                    <div
                                        class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                        <div class="absolute top-2 right-2">
                                            <button type="button"
                                                class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                                data-hs-overlay="#create-lang">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.languages.store') }}" method="POST">
                                            @csrf
                                            <div class="p-4 sm:p-10 overflow-y-auto">
                                                <div class="mb-6 text-center">
                                                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                        {{ __('main.add_new_language') }}
                                                    </h3>
                                                </div>
                                                <div class="space-y-4">
                                                    <div>
                                                        <label for="name"
                                                            class="block text-sm mb-2 dark:text-white">{{ __('main.language_name') }}</label>
                                                        <div class="relative">
                                                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="code"
                                                            class="block text-sm mb-2 dark:text-white">{{ __('main.language_code') }}</label>
                                                        <div class="relative">
                                                            <input type="text" id="code" name="code"
                                                                value="{{ old('code') }}"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="icon"
                                                            class="block text-sm mb-2 dark:text-white">{{ __('main.flag') }} {{ __('main.country_code') }}</label>
                                                        <div class="relative">
                                                            <input type="text" id="icon" name="icon"
                                                                value="{{ old('icon') }}"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="direction" class="block text-sm mb-2 dark:text-white">{{ __('main.direction') }}</label>
                                                        <div class="relative">
                                                            <select id="direction" name="direction"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                                <option value="ltr">{{ __('main.ltr') }}</option>
                                                                <option value="rtl">{{ __('main.rtl') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="status"
                                                            class="block text-sm mb-2 dark:text-white">{{ __('main.status') }}</label>
                                                        <div class="relative">
                                                            <select id="status" name="status"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                                <option value="1">{{ __('main.active') }}</option>
                                                                <option value="0">{{ __('main.inactive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                                <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#create-lang">
                                                    {{ __('main.cancel') }}
                                                </button>
                                                <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                    {{ __('main.create') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endcan

                        @foreach ($Languages as $Language)
                            {{-- update language --}}
                            @can('languages-update')
                                <div id="update-lang-{{ $Language->id }}"
                                    class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                        <div
                                            class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                            <div class="absolute top-2 right-2">
                                                <button type="button"
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                                    data-hs-overlay="#update-lang-{{ $Language->id }}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.languages.update', $Language) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-4 sm:p-10 overflow-y-auto">
                                                    <div class="mb-6 text-center">
                                                        <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                            {{ __('main.edit_language') }}
                                                        </h3>
                                                    </div>

                                                    <div class="space-y-4">
                                                        <div>
                                                            <label for="name"
                                                                class="block text-sm mb-2 dark:text-white">{{ __('main.language_name') }}</label>
                                                            <div class="relative">
                                                                <input type="text" id="name" name="name"
                                                                    value="{{ $Language->name }}"
                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="code"
                                                                class="block text-sm mb-2 dark:text-white">{{ __('main.language_code') }}</label>
                                                            <div class="relative">
                                                                <input type="text" id="code" name="code"
                                                                    value="{{ $Language->code }}"
                                                                    class="opacity-70 pointer-events-none py-3 px-4 block w-full bg-gray-50 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="icon"
                                                            class="block text-sm mb-2 dark:text-white">{{ __('main.icon') }} {{ __('main.country_code') }}</label>
                                                        <div class="relative">
                                                            <input type="text" id="icon" name="icon"
                                                                value="{{ $Language->icon }}"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                                required>
                                                        </div>
                                                        </div>
                                                        <div>
                                                            <label for="direction"
                                                                class="block text-sm mb-2 dark:text-white">{{ __('main.direction') }}</label>
                                                            <div class="relative">
                                                                <select id="direction" name="direction"
                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                                    <option value="ltr" @if ($Language->direction == 'ltr') selected @endif>{{ __('main.ltr') }}</option>
                                                                    <option value="rtl" @if ($Language->direction == 'rtl') selected @endif>{{ __('main.rtl') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="status"
                                                                class="block text-sm mb-2 dark:text-white">{{ __('main.status') }}</label>
                                                            <div class="relative">
                                                                <select id="status" name="status"
                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                                    <option value="1" @if ($Language->direction == '1') selected @endif>{{ __('main.active') }}
                                                                    </option>
                                                                    <option value="0" @if ($Language->direction == '0') selected @endif>{{ __('main.inactive') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                                    <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#update-lang-{{ $Language->id }}">
                                                        {{ __('main.cancel') }}
                                                    </button>
                                                    <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                        {{ __('main.update') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            {{-- end update language --}}
                            {{-- delete language --}}
                            @can('languages-delete')
                                <div id="delete-lang-{{ $Language->id }}"
                                    class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                                        <div
                                            class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                            <div class="absolute top-2 right-2">
                                                <button type="button"
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                                    data-hs-overlay="#delete-lang-{{ $Language->id }}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="p-4 sm:p-10 overflow-y-auto">
                                                <div class="flex gap-x-4 md:gap-x-7">
                                                    <!-- Icon -->
                                                    <span
                                                        class="flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                    </span>
                                                    <!-- End Icon -->

                                                    <div class="grow">
                                                        <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                            {{ __('main.confirmation') }}
                                                        </h3>
                                                        <p class="text-gray-500">
                                                            {{ __('main.are_you_sure_you_want_to_delete') }} {{ $Language->name }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                            <form action="{{ route('admin.languages.destroy', $Language) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div
                                                    class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                                    <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#delete-lang-{{ $Language->id }}">
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
                            {{-- end delete language --}}
                        @endforeach


                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-start">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.language_name') }}
                                        </span>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.language_code') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.direction') }}
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
                                @foreach ($Languages as $Language)
                                    <tr>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div class="flex gap-2">
                                                @if ($Language->icon != '')
                                                    <img src="{{ asset('assets/images/flags/' . $Language->icon . '.svg') }}" alt="{{ $Language->code }}" class="w-8">
                                                @endif
                                                &nbsp;
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $Language->name }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <span class="block text-sm text-gray-500">{{ $Language->code }}</span>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <span
                                                class="block text-sm text-gray-500 uppercase">{{ $Language->direction }}</span>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div>
                                                @if ($Language->status == 1)
                                                    <span
                                                        class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        {{ __('main.active') }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                        {{__('main.inactive')}}
                                                    </span>
                                                @endif

                                            </div>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div>
                                                <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                    <button id="hs-table-dropdown-{{ $Language->id }}" type="button"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                        </svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-2xl rounded-xl p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                                        aria-labelledby="hs-table-dropdown-{{ $Language->id }}">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            @can('languages-update')
                                                                <button data-hs-overlay="#update-lang-{{ $Language->id }}"
                                                                    class="block w-full text-start py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                                                    {{ __("main.edit") }}
                                                                </button>
                                                                <a href="{{ url('admin/lang/' . $Language->code . '/translations') }}"
                                                                    class="block w-full text-start py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                                                    {{ __('main.update_translation') }}
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        @can('languages-delete')
                                                            <form method="POST" action="{{ route('admin.languages.destroy', $Language) }}" id="delete-form-{{ $Language->id }}">@csrf @method('PUT')
                                                            </form>
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <button data-hs-overlay="#delete-lang-{{ $Language->id }}"
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

@extends('layouts.app')

@section('content')
    <div class="bg-dark relative">
        <div class="container max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            {{-- Sidebar Toggle --}}
            <div class="sticky top-0 inset-x-0 z-20 px-4 sm:px-6 md:px-8 lg:hidden bg-gray-25 rounded-lg outline outline-1 outline-gray-800 shadow-outline">
                <div class="flex items-center py-4">
                    {{-- Navigation Toggle --}}
                    <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                    {{-- End Navigation Toggle --}}
        
                    {{-- Breadcrumb --}}
                    <ol class="ml-3 flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
                        <li class="flex items-center text-sm text-gray-400">
                            {{ __('main.user') }}
                            <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </li>
                        <li class="text-sm font-semibold text-gray-400 truncate" aria-current="page">
                            {{ __('main.profile') }}
                        </li>
                    </ol>
                    {{-- End Breadcrumb --}}
                </div>
            </div>
            {{-- End Sidebar Toggle --}}

            <div class="lg:grid lg:grid-cols-5 gap-8">
                {{-- Sidebar --}}
                @include('front.layouts.user-sidebar')
                {{-- End Sidebar --}}

                {{-- Content --}}
                <div class="lg:col-span-4 lg:ml-20 h-fit">
                    {{-- Profile Information --}}
                    <div class="p-4 bg-gray-25 rounded-lg outline outline-1 outline-gray-800 shadow-outline">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-500">
                            <h6 class="text-white">
                                {{ __('main.profile_information') }}
                            </h6>
                        </div>
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')
                        @endif
                    </div>
                    {{-- End Profile Information --}}
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
@endsection

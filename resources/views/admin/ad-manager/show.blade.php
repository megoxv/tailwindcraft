@extends('layouts.admin')
@section('title', __('main.ads_manager'))

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('main.ad') }} : {{ $adsManager->name }}
        </h2>

        <!-- Alert Message -->
        @if (session()->has('message'))
            <div
                class="bg-{{ session('color') }}-100 text-{{ session('color') }}-800 p-4 text-sm rounded border border-{{ session('color') }}-300 my-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-xl space-y-6">
            <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.ad_slug') }}</div>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                {{ $adsManager->slug }}
            </h4>
            @if ($adsManager->adType == 'HTML')
                <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.ad_html_body') }}</div>
                <p class="text-gray-600 dark:text-gray-300">
                    <pre><code class="lang-html">
                    {{ $adsManager->body }}
                </code></pre>
                </p>
            @elseif($adsManager->adType == 'IMAGE')
                <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.ad_image') }}</div>
                <p class="text-gray-600 dark:text-gray-300">
                    <img src="{{ asset('storage/' . $adsManager->image) }}" alt="{{ $adsManager->imageAlt }}" />
                </p>

                <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.image_url') }}</div>
                <p class="text-gray-600 dark:text-gray-300">
                <p>{{ $adsManager->imageUrl }}</p>
                </p>
            @endif

            <div class="text-gray-600 mt-5">
                <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.usage') }} ({{ __('main.manual_placement') }})</div>
                <div class="bg-gray-600 text-white rounded p-3">
                    <span>
                        <</span>x-ad-component slug="{{ $adsManager->slug }}" />
                </div>
            </div>

            <div class="mt-5">
                <div class="mb-2 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('main.auto_placement') }}</div>
                @isset($adsManager->placements)
                    @foreach (json_decode($adsManager->placements) as $placement)
                        @if (!empty($placement->selector))
                            @switch($placement->position)
                                @case('beforebegin')
                                    {{ __('main.before') }} HTML Element
                                @break

                                @case('afterend')
                                    {{ __('main.before') }} HTML Element
                                @break

                                @case('afterbegin')
                                    {{ __('main.inside') }} HTML Selector ({{ __('main.at_beginning') }})
                                @break

                                @case('beforeend')
                                    {{ __('main.inside') }} HTML Selector ({{ __('main.at_end') }})
                                @break
                            @endswitch
                            -> {{ $placement->selector }} <br />
                        @endif
                    @endforeach
                @else
                    <p> {{ __('main.no_auto_placements_set_for_this_ad') }}</p>
                @endisset
            </div>
        </div>
    </div>
@endsection

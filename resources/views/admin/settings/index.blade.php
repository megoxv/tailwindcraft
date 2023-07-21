@extends('layouts.admin')
@section('title', __('main.settings'))

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">

        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 active" id="tabs-with-icons-item-1" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                    {{ __('main.general_settings') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-logo-favicon-item" data-hs-tab="#tabs-logo-favicon" aria-controls="tabs-logo-favicon" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7 2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zm4.225 4.053a.5.5 0 0 0-.577.093l-3.71 4.71-2.66-2.772a.5.5 0 0 0-.63.062L.002 13v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4.5l-4.777-3.947z"/>
                    </svg>
                    {{ __('main.logo&favicon') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-seo-configuration-item" data-hs-tab="#tabs-seo-configuration" aria-controls="tabs-seo-configuration" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM3.668 2.501l-.288.646a.847.847 0 0 0 1.479.815l.245-.368a.809.809 0 0 1 1.034-.275.809.809 0 0 0 .724 0l.261-.13a1 1 0 0 1 .775-.05l.984.34c.078.028.16.044.243.054.784.093.855.377.694.801-.155.41-.616.617-1.035.487l-.01-.003C8.274 4.663 7.748 4.5 6 4.5 4.8 4.5 3.5 5.62 3.5 7c0 1.96.826 2.166 1.696 2.382.46.115.935.233 1.304.618.449.467.393 1.181.339 1.877C6.755 12.96 6.674 14 8.5 14c1.75 0 3-3.5 3-4.5 0-.262.208-.468.444-.7.396-.392.87-.86.556-1.8-.097-.291-.396-.568-.641-.756-.174-.133-.207-.396-.052-.551a.333.333 0 0 1 .42-.042l1.085.724c.11.072.255.058.348-.035.15-.15.415-.083.489.117.16.43.445 1.05.849 1.357L15 8A7 7 0 1 1 3.668 2.501Z"/>
                    </svg>
                    {{ __('main.seo_configuration') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-auth-item" data-hs-tab="#tabs-auth" aria-controls="tabs-auth" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                    </svg>
                    {{ __('main.auth') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-with-icons-item-2" data-hs-tab="#tabs-with-icons-2" aria-controls="tabs-with-icons-2" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                    {{ __('main.smtp') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-links-item" data-hs-tab="#tabs-links" aria-controls="tabs-links" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                        <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                    </svg>
                    {{ __('main.links') }}
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" id="tabs-custom-codes-item" data-hs-tab="#tabs-custom-codes" aria-controls="tabs-custom-codes" role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                    </svg>
                    {{ __('main.custom_codes') }}
                </button>
            </nav>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-xl">
                    <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
                        {{-- General Settings--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.general_settings') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="website_name" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.website_name') }}</label>
                                    <input type="text" name="website_name" id="website_name" value="{{ getSetting('website_name') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="website_url" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.website_url') }}</label>
                                    <input type="text" name="website_url" id="website_url" value="{{ getSetting('website_url') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="website_email_address" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.website_email_address') }}</label>
                                    <input type="text" name="website_email_address" id="website_email_address" value="{{ getSetting('website_email_address') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="default_new_user_role" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.default_new_user_role') }}</label>
                                    <select name="default_new_user_role" id="default_new_user_role" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" @if (getSetting('default_new_user_role') == $role->name) selected  @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="default_language" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.default_language') }}</label>
                                    <select name="default_language" id="default_language" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->code }}" @if (getSetting('default_language') == $language->code) selected  @endif>{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="user_registration" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.user_registration') }}</label>
                                    <input type="checkbox" id="user_registration" value="1" name="user_registration" @if(getSetting('user_registration') == '1') checked @endif  class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                                </div>
                                {{-- <div>
                                    <label for="email_verification" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.email_verification') }}</label>
                                    <input type="checkbox" id="email_verification" value="1" name="email_verification" @if(getSetting('email_verification') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                                </div> --}}
                            </div>
                            {{-- End Grid --}}
                        </div>
                        {{-- End General Settings--}}
                        {{-- Google reCaptcha --}}
                        <div>
                            {{-- Head --}}
                            <h3 class="my-8 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.google_reCaptcha_v3') }}
                            </h3>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="mb-3">
                                <label for="recaptcha_status" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_recaptcha_status') }}</label>
                                <input type="checkbox" id="recaptcha_status" value="1" name="recaptcha_status" @if(getSetting('recaptcha_status') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="recaptcha_site_key" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_recaptcha_site_key') }}</label>
                                    <input type="text" name="recaptcha_site_key" id="recaptcha_site_key" value="{{ getSetting('recaptcha_site_key') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="recaptcha_secret_key" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_recaptcha_secret_key') }}</label>
                                    <input type="text" name="recaptcha_secret_key" id="recaptcha_secret_key" value="{{ getSetting('recaptcha_secret_key') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                        </div>
                        {{-- End Google reCaptcha --}}
                        {{-- Google Analytics --}}
                        <div>
                            {{-- Head --}}
                            <h3 class="my-8 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.google_analytics') }}
                            </h3>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="mb-3">
                                <label for="analytics_status" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_analytics_status') }}</label>
                                <input type="checkbox" id="analytics_status" value="1" name="analytics_status" @if(getSetting('analytics_status') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:gap-6">
                                <div>
                                    <label for="analytics_tracking_id" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_analytics_tracking_id') }}</label>
                                    <input type="text" name="analytics_tracking_id" id="analytics_tracking_id" value="{{ getSetting('analytics_tracking_id') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                        </div>
                        {{-- End Google Analytics --}}
                        <div class="mt-6 grid">
                            <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                        </div>
                    </div>
                    <div id="tabs-logo-favicon" class="hidden" role="tabpanel" aria-labelledby="tabs-logo-favicon-item">
                        {{-- Logo & Favicon--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.logo&favicon') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                                <div class="min-h-[20rem] w-80 drop-shadow-lg rounded-xl">
                                    <img @if(!empty(getSetting('light_logo'))) src="{{ getSetting('light_logo') }}" @else src="{{ asset('assets/images/default/logo.png') }}" @endif alt="light_logo" loading="lazy" id="ligth-logo-holder" class="max-w-full rounded-xl">
                                    <div class="mt-6 grid">
                                        <input type="text" id="light-logo" name="light_logo" class="hidden">
                                        <label id="light_logo" data-input="light-logo" data-preview="ligth-logo-holder" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800 cursor-pointer">{{ __('main.select_light_logo') }}</label>
                                    </div>
                                </div>
                                <div class="h-80 w-80 drop-shadow-lg rounded-xl">
                                    <img @if(!empty(getSetting('dark_logo'))) src="{{ getSetting('dark_logo') }}" @else src="{{ asset('assets/images/default/logo.png') }}" @endif alt="light_logo" loading="lazy" id="holder" class="max-w-full rounded-xl">
                                    <div class="mt-6 grid">
                                        <input type="text" id="dark-logo" name="dark_logo" class="hidden">
                                        <label id="dark_logo" data-input="dark-logo" data-preview="holder" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800 cursor-pointer">{{ __('main.select_dark_logo') }}</label>
                                    </div>
                                </div>
                                <div class="h-80 w-80 drop-shadow-lg rounded-xl">
                                    <img @if(!empty(getSetting('favicon'))) src="{{ getSetting('favicon') }}" @else src="{{ asset('assets/images/default/logo.png') }}" @endif alt="light_logo" loading="lazy" id="holder" class="max-w-full rounded-xl">
                                    <div class="mt-6 grid">
                                        <input type="text" id="favicon" name="favicon" class="hidden">
                                        <label id="lfm-favicon" data-input="favicon" data-preview="holder" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800 cursor-pointer">{{ __('main.select_favicon') }}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- End Grid --}}
                            <div class="mt-6 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                            </div>
                        </div>
                        {{-- End Logo & Favicon--}}
                    </div>
                    <div id="tabs-seo-configuration" class="hidden" role="tabpanel" aria-labelledby="tabs-seo-configuration-item">
                        {{-- SEO Configuration Settings--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.seo_configuration') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <img @if(!empty(getSetting('image'))) src="{{ getSetting('image') }}" @else src="{{ asset('assets/images/default/image.jpg') }}" @endif alt="image" loading="lazy" id="holder" class="max-w-full rounded-xl">
                                    <div class="mt-6 grid">
                                        <input type="text" id="image" name="image" class="hidden">
                                        <label id="lfm-image" data-input="image" data-preview="holder" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800 cursor-pointer">{{ __('main.image_upload') }}</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                        <div>
                                            <label for="seo_title" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.seo_title') }}</label>
                                            <input type="text" name="seo_title" id="seo_title" value="{{ getSetting('seo_title') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        </div>
                                        <div>
                                            <label for="seo_author" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.seo_author') }}</label>
                                            <input type="text" name="seo_author" id="seo_author" value="{{ getSetting('seo_author') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="seo_keywords" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.seo_keywords') }}</label>
                                            <input type="text" name="seo_keywords" id="seo_keywords" value="{{ getSetting('seo_keywords') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="seo_description" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.seo_description') }}</label>
                                            <textarea id="seo_description" name="seo_description" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('seo_description') !!}</textarea>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="social_title" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.social_title') }}</label>
                                            <input type="text" name="social_title" id="social_title" value="{{ getSetting('social_title') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="social_description" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.social_description') }}</label>
                                            <textarea id="social_description" name="social_description" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('social_description') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 space-y-6">
                                <div class="space-y-3">
                                    <div>
                                        <label for="blog_page_title" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.blog_page_title') }}</label>
                                        <input type="text" name="blog_page_title" id="blog_page_title" value="{{ getSetting('blog_page_title') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                    </div>
                                    <div>
                                        <label for="blog_page_description" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.blog_page_description') }}</label>
                                        <textarea id="blog_page_description" name="blog_page_description" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('blog_page_description') !!}</textarea>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label for="contact_page_title" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.contact_page_title') }}</label>
                                        <input type="text" name="contact_page_title" id="contact_page_title" value="{{ getSetting('contact_page_title') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                    </div>
                                    <div>
                                        <label for="contact_page_description" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.contact_page_description') }}</label>
                                        <textarea id="contact_page_description" name="contact_page_description" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('contact_page_description') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- End Grid --}}
                            <div class="mt-6 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                            </div>
                        </div>
                        {{-- End SEO Configuration Settings--}}
                    </div>
                    <div id="tabs-auth" class="hidden" role="tabpanel" aria-labelledby="tabs-auth-item">
                        {{-- github --}}
                        <div>
                            {{-- Head --}}
                            <h3 class="mb-8 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                Github
                            </h3>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="mb-3">
                                <label for="github_status" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">Github Status</label>
                                <input type="checkbox" id="github_status" value="1" name="github_status" @if(getSetting('github_status') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="github_client_id" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">Github Client Id</label>
                                    <input type="text" name="github_client_id" id="github_client_id" value="{{ getSetting('github_client_id') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="github_client_secret" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">Github Client Secret</label>
                                    <input type="text" name="github_client_secret" id="github_client_secret" value="{{ getSetting('github_client_secret') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                        </div>
                        {{-- End Google --}}
                        {{-- Google --}}
                        <div>
                            {{-- Head --}}
                            <h3 class="my-8 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.google') }}
                            </h3>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="mb-3">
                                <label for="google_status" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_status') }}</label>
                                <input type="checkbox" id="google_status" value="1" name="google_status" @if(getSetting('google_status') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="google_client_id" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_client_id') }}</label>
                                    <input type="text" name="google_client_id" id="google_client_id" value="{{ getSetting('google_client_id') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="google_client_secret" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.google_client_secret') }}</label>
                                    <input type="text" name="google_client_secret" id="google_client_secret" value="{{ getSetting('google_client_secret') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                        </div>
                        {{-- End Google --}}
                        {{-- Facebook --}}
                        <div>
                            {{-- Head --}}
                            <h3 class="my-8 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.facebook') }}
                            </h3>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="mb-3">
                                <label for="facebook_status" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.facebook_status') }}</label>
                                <input type="checkbox" id="facebook_status" value="1" name="facebook_status" @if(getSetting('facebook_status') == '1') checked @endif class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="facebook_client_id" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.facebook_client_id') }}</label>
                                    <input type="text" name="facebook_client_id" id="facebook_client_id" value="{{ getSetting('facebook_client_id') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="facebook_client_secret" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.facebook_client_secret') }}</label>
                                    <input type="text" name="facebook_client_secret" id="facebook_client_secret" value="{{ getSetting('facebook_client_secret') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                        </div>

                        <div class="mt-6 grid">
                            <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                        </div>
                    </div>
                    <div id="tabs-with-icons-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-2">
                        {{-- SMTP Settings--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.smtp_settings') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-1 gap-4 lg:gap-6">
                                <div>
                                    <label for="smtp_host" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_host') }}</label>
                                    <input type="text" name="smtp_host" id="smtp_host" value="{{ getSetting('smtp_host') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_port" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_port') }}</label>
                                    <input type="text" name="smtp_port" id="smtp_port" value="{{ getSetting('smtp_port') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_username" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_username') }}</label>
                                    <input type="text" name="smtp_username" id="smtp_username" value="{{ getSetting('smtp_username') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_password" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_password') }}</label>
                                    <input type="password" name="smtp_password" id="smtp_password" value="{{ getSetting('smtp_password') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_sender_email" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_sender_email') }}</label>
                                    <input type="text" name="smtp_sender_email" id="smtp_sender_email" value="{{ getSetting('smtp_sender_email') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_sender_name" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_sender_name') }}</label>
                                    <input type="text" name="smtp_sender_name" id="smtp_sender_name" value="{{ getSetting('smtp_sender_name') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="smtp_encryption" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.smtp_encryption') }}</label>
                                    <select name="smtp_encryption" id="smtp_encryption" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                        <option value="tls" @if (getSetting('smtp_encryption') == 'TLS') selected  @endif>TLS</option>
                                        <option value="ssl" @if (getSetting('smtp_encryption') == 'SSL') selected  @endif>SSL</option>
                                    </select>
                                </div>

                            </div>
                            {{-- End Grid --}}
                            <div class="mt-6 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                            </div>
                        </div>
                        {{-- End SMTP Settings--}}
                    </div>
                    <div id="tabs-links" class="hidden" role="tabpanel" aria-labelledby="tabs-links-item">
                        {{-- SMTP Settings--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.links') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-1 gap-4 lg:gap-6">
                                <div>
                                    <label for="phone" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.phone') }}</label>
                                    <input type="text" name="phone" id="phone" value="{{ getSetting('phone') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="facebook" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.facebook') }}</label>
                                    <input type="text" name="facebook" id="facebook" value="{{ getSetting('facebook') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="telegram" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.telegram') }}</label>
                                    <input type="text" name="telegram" id="telegram" value="{{ getSetting('telegram') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="whatsapp" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.whatsapp') }}</label>
                                    <input type="text" name="whatsapp" id="whatsapp" value="{{ getSetting('whatsapp') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="twitter" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.twitter') }}</label>
                                    <input type="text" name="twitter" id="twitter" value="{{ getSetting('twitter') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="instagram" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.instagram') }}</label>
                                    <input type="text" name="instagram" id="instagram" value="{{ getSetting('instagram') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="youtube" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.youtube') }}</label>
                                    <input type="text" name="youtube" id="youtube" value="{{ getSetting('youtube') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="tiktok" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.tiktok') }}</label>
                                    <input type="text" name="tiktok" id="tiktok" value="{{ getSetting('tiktok') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="linkedin" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.linkedin') }}</label>
                                    <input type="text" name="linkedin" id="linkedin" value="{{ getSetting('linkedin') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="github" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.github') }}</label>
                                    <input type="text" name="github" id="github" value="{{ getSetting('github') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                </div>
                            </div>
                            {{-- End Grid --}}
                            <div class="mt-6 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                            </div>
                        </div>
                        {{-- End SMTP Settings--}}
                    </div>
                    <div id="tabs-custom-codes" class="hidden" role="tabpanel" aria-labelledby="tabs-custom-codes-item">
                        {{-- SMTP Settings--}}
                        <div>
                            {{-- Head --}}
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('main.custom_codes') }}
                            </h2>
                            {{-- End Head --}}
                            {{-- Grid --}}
                            <div class="grid grid-cols-1 gap-4 lg:gap-6">
                                <div>
                                    <label for="header_code" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.header_code') }}</label>
                                    <textarea id="header_code" name="header_code" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('header_code') !!}</textarea>
                                </div>
                                <div>
                                    <label for="footer_code" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.footer_code') }}</label>
                                    <textarea id="footer_code" name="footer_code" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('footer_code') !!}</textarea>
                                </div>
                                {{-- <div>
                                    <label for="robots_txt" class="text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.robots_txt') }}</label>
                                    <textarea id="robots_txt" name="robots_txt" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">{!! getSetting('robots_txt') !!}</textarea>
                                </div> --}}
                            </div>
                            {{-- End Grid --}}
                            <div class="mt-6 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">{{ __('main.update') }}</button>
                            </div>
                        </div>
                        {{-- End SMTP Settings--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#lfm-image').filemanager('image');
        $('#light_logo').filemanager('image');
        $('#dark_logo').filemanager('image');
        $('#lfm-favicon').filemanager('image');
    </script>
@endpush
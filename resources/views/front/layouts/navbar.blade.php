

<header class="bg-gray-25 border-b-[0.2px] border-gray-700">
    <div class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5">
        <div class="flex justify-between items-center mx-auto">
            <div class="navLink flex items-center">
                <a href="{{ route('home') }}" class="flex-none text-xl font-semibold">
                    @if (getSetting('light_logo') && getSetting('dark_logo'))
                        <img src="{{ getSetting('light_logo') }}" alt="{{ getSetting('website_name') }}" loading="lazy" class="dark:hidden">
                        <img src="{{ getSetting('dark_logo') }}" alt="{{ getSetting('website_name') }}" loading="lazy" class="hidden dark:block">
                    @else
                        <span class="self-center text-lg font-semibold whitespace-nowrap text-white font-exa">{{ getSetting('website_name') }}</span>
                    @endif
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex justify-between items-center w-auto">
                    <ul class="flex items-center transition-all duration-200 bg-transparent flex-row space-x-3">
                        <li>
                            <a href="{{ route('create.show') }}" class="text-primary-100 whitespace-nowrap text-sm px-4 py-[6px] font-medium bg-transparent hover:bg-primary-600 hover:bg-transparent border border-primary-300 rounded-md">
                                Create
                            </a>
                        </li>
                        <li>
                            @auth
                                <div class="hs-dropdown relative flex [--placement:bottom-right] z-50">
                                    <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-8 w-8 rounded-full font-medium align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all text-xs bg-gray-800 hover:bg-gray-800 text-gray-400 hover:text-white focus:ring-gray-700 focus:ring-offset-gray-800">
                                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-gray-800" src="{{ Auth::user()->getProfilePhoto() }}" alt="{{ Auth::user()->name }}">
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden relative rounded-lg whitespace-nowrap shadow-front-3 bg-gray-25 text-gray-300 w-[216px] shadow-md" aria-labelledby="hs-dropdown-with-header">
                                        <div class="mt-2 px-5 py-6 space-y-6">
                                            @can('admin-read')
                                                <a href="{{ route('admin.index') }}" class="group flex items-center text-sm text-gray-400 hover:text-primary-500">
                                                    <svg class="w-4 h-4 fill-gray-400 group-hover:fill-primary-500 mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                                        <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                                        <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                                    </svg>
                                                    {{ __('main.dashboard') }}
                                                </a>
                                            @endcan
                                            <a href="{{ route('user.profile') }}" class="group flex items-center text-sm text-gray-400 hover:text-primary-500">
                                                <svg class="w-4 h-4 fill-gray-400 group-hover:fill-primary-500 mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                                </svg>
                                                {{ __('main.profile') }}
                                            </a>
                                            <form method="POST" action="{{route('logout')}}" id="logout-form" class="d-none">@csrf</form>
                                            <a class="group flex items-center text-sm text-gray-400 hover:text-primary-500" onclick="document.getElementById('logout-form').submit();" href="javascript:;">
                                                <svg class="w-4 h-4 fill-gray-400 group-hover:fill-primary-500 mr-3" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                                </svg>
                                                {{ __('main.logout') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center gap-x-2 font-medium text-gray-400 hover:text-primary-500">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                    {{ __('main.login') }}
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
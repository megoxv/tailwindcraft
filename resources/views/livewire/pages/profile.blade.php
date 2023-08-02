<section class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5" x-data="{ sidebarOpen: false }">
        <div class="container mx-auto pt-6 pb-[100px]">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-7">
                <div class="md:col-span-1 hidden lg:block">
                    {{-- Sidebar --}}
                    @include('front.layouts.sidebar')
                </div>
                <div class="md:col-span-5">
                    <div>
                        {{-- Mobile Sidebar --}}
                        @include('front.layouts.mobile-sidebar')
                        <div class="flex items-center justify-between">
                            {{-- Button Open moobile sidebar --}}
                            <div class="w-full">
                                <button x-on:click="sidebarOpen = true" aria-label="Categories" class="group flex md:hidden max-w-[32px] h-8 w-full items-center justify-center rounded-full bg-transparent hover:bg-gray-800 border border-gray-200 hover:border-gray-800">
                                    <svg class="w-[14px] h-[14px] fill-gray-400 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                    </svg>
                                </button>
                            </div>
                            {{-- End Button Open moobile sidebar --}}
                            {{-- Views / Loves / Components --}}
                            <div class="flex items-center">
                                {{-- Views --}}
                                <div class="flex items-center">
                                    <button aria-label="Total View" class="w-8 h-8 p-2 flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-full">
                                        <svg class="w-4 h-4 fill-white" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.76667 5.32817C7.84445 5.32014 7.92223 5.31746 8 5.31746C9.47223 5.31746 10.6667 6.44514 10.6667 7.88889C10.6667 9.30853 9.47223 10.4603 8 10.4603C6.50278 10.4603 5.33334 9.30853 5.33334 7.88889C5.33334 7.81389 5.33611 7.73889 5.34445 7.66389C5.60278 7.78443 5.90278 7.88889 6.22223 7.88889C7.20278 7.88889 8 7.12014 8 6.1746C8 5.86657 7.89167 5.57728 7.76667 5.32817ZM13.35 4.04782C14.65 5.21032 15.5194 6.57907 15.9306 7.55943C16.0222 7.77103 16.0222 8.00675 15.9306 8.21835C15.5194 9.1746 14.65 10.5434 13.35 11.73C12.0417 12.9032 10.2444 13.8889 8 13.8889C5.75556 13.8889 3.95834 12.9032 2.65056 11.73C1.35056 10.5434 0.48167 9.1746 0.0683646 8.21835C-0.0227882 8.00675 -0.0227882 7.77103 0.0683646 7.55943C0.48167 6.57907 1.35056 5.21032 2.65056 4.04782C3.95834 2.87568 5.75556 1.88889 8 1.88889C10.2444 1.88889 12.0417 2.87568 13.35 4.04782ZM8 4.03175C5.79167 4.03175 4 5.75943 4 7.88889C4 10.0184 5.79167 11.746 8 11.746C10.2083 11.746 12 10.0184 12 7.88889C12 5.75943 10.2083 4.03175 8 4.03175Z"></path>
                                        </svg>
                                    </button>
                                    @php
                                        $totalViews = 0;

                                        foreach ($posts as $post) {
                                            $totalViews += $post->views;
                                        }
                                    @endphp
                                    <small class="ml-2 font-medium text-white">{{ $totalViews }}</small>
                                </div>
                                {{-- Loves --}}
                                <div class="mx-4 flex items-center">
                                    <button aria-label="Total Loves" class="w-8 h-8 p-2 flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-full">
                                        <svg class="w-4 h-4 fill-white" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.97539 3.4724L8.30352 3.14482C9.21953 2.25205 10.4883 1.84572 11.7352 2.05326C13.6191 2.36716 15 3.9974 15 5.90873V6.06732C15 7.20208 14.5297 8.28763 13.6984 9.06146L8.75742 13.6744C8.55234 13.8658 8.28164 13.9724 8 13.9724C7.71836 13.9724 7.44766 13.8658 7.24258 13.6744L2.30129 9.06146C1.47113 8.28763 1 7.20208 1 6.06732V5.90873C1 3.9974 2.38141 2.36716 4.26484 2.05326C5.48711 1.84572 6.78047 2.25205 7.67188 3.14482L7.97539 3.4724ZM7.97539 4.71107L7.05391 3.76224C6.36211 3.07072 5.375 2.75517 4.40977 2.91623C2.94715 3.16013 1.85039 4.42669 1.85039 5.90873V6.06732C1.85039 6.96146 2.24551 7.81185 2.8982 8.42162L7.83867 13.0345C7.88242 13.0755 7.93984 13.0974 7.97539 13.0974C8.06016 13.0974 8.11758 13.0755 8.16133 13.0345L13.1023 8.42162C13.7531 7.81185 14.125 6.96146 14.125 6.06732V5.90873C14.125 4.42669 13.0531 3.16013 11.5902 2.91623C10.6004 2.75517 9.63789 3.07072 8.94609 3.76224L7.97539 4.71107Z"></path>
                                        </svg>
                                    </button>
                                    <small class="ml-2 font-medium text-white">{{ $user->totalLoves() }}</small>
                                </div>
                                {{-- Components --}}
                                <div class="flex items-center">
                                    <button aria-label="Total Components" class="w-8 h-8 p-2 flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-full">
                                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                                        </svg>
                                    </button>
                                    <small class="ml-2 font-medium text-white">{{ $user->posts->where('status', 'Active')->count() }}</small>
                                </div>
                            </div>
                            {{-- End Views / Loves / Components --}}
                        </div>
                        {{-- Author Info --}}
                        <div class="md:max-w-[484px] w-full mt-24 md:mt-0">
                            <div class="flex flex-col md:flex-row justify-center md:justify-start items-center md:items-start mb-3">
                                <img src="{{ $user->getProfilePhoto() }}" alt="{{ $user->name }}" class="w-36 h-36 mb-3 md:mb-0 md:mr-3 rounded-lg outline outline-1 outline-white">
                                <div class="text-center md:text-start">
                                    <p class="font-medium text-3xl text-white">{{ $user->name }}</p>
                                    <span class="text-gray-300 text-lg">&commat;{{ $user->username }}</span>
                                    <p class="font-normal text-md text-gray-300 md:w-[700px] mt-3">{{ $user->bio }}</p>
                                    <div class="flex flex-col md:flex-row items-center md:items-start gap-3 mt-3 truncate">
                                        @if ($user->github)
                                            <a href="https://github.com/{{ $user->github }}" target="_blank" class="group text-lg text-gray-400 flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github group-hover:text-primary-500 duration-200" viewBox="0 0 16 16">
                                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                                </svg>
                                                {{ $user->github }}
                                            </a>
                                        @endif
                                        @if ($user->website)
                                            <a href="{{ $user->website }}" target="_blank" rel="nofollow" class="group text-lg text-gray-400 flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg group-hover:text-primary-500 duration-200" viewBox="0 0 16 16">
                                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                                </svg>
                                                {{ $user->website }}
                                            </a>
                                        @endif
                                    </div>
                                    @auth
                                        @if (auth()->user()->username === $user->username)
                                            <a href="{{ route('user.profile') }}" class="group w-fit px-[18px] py-[10px] md:py-2 mt-6 mx-auto md:mx-0 rounded-md font-medium text-base flex items-center justify-center hover:bg-primary-25 bg-gray-25 border border-primary-500 text-gray-300 hover:text-primary-500 transition-colors duration-200 space-x-3">
                                                <svg class="w-4 md:w-[14px] h-4 md:h-[14px] fill-white group-hover:fill-primary-500" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.6594 0.780312C12.5375 -0.0983438 13.9625 -0.0983438 14.8406 0.780312L15.2188 1.15906C16.0969 2.03781 16.0969 3.4625 15.2188 4.34062L9.05625 10.5062C8.78437 10.775 8.45 10.9719 8.08125 11.0781L4.95625 11.9719C4.69375 12.0469 4.4125 11.9719 4.21875 11.7531C4.02813 11.5875 3.95312 11.3062 4.02812 11.0437L4.92188 7.91875C5.02813 7.55 5.225 7.21562 5.49375 6.94375L11.6594 0.780312ZM13.7531 1.84094C13.4875 1.54812 13.0125 1.54812 12.7188 1.84094L11.8094 2.75L13.25 4.19063L14.1594 3.25312C14.4531 2.9875 14.4531 2.5125 14.1594 2.21969L13.7531 1.84094ZM6.36562 8.33125L5.84062 10.1594L7.66875 9.63437C7.79375 9.6 7.90313 9.53437 7.99375 9.44375L12.1906 5.25L10.75 3.80938L6.55625 8.00625C6.46563 8.09688 6.4 8.20625 6.36562 8.33125ZM6.25 2C6.66563 2 7 2.33594 7 2.75C7 3.16563 6.66563 3.5 6.25 3.5H2.75C2.05969 3.5 1.5 4.05937 1.5 4.75V13.25C1.5 13.9406 2.05969 14.5 2.75 14.5H11.25C11.9406 14.5 12.5 13.9406 12.5 13.25V9.75C12.5 9.33437 12.8344 9 13.25 9C13.6656 9 14 9.33437 14 9.75V13.25C14 14.7687 12.7687 16 11.25 16H2.75C1.23125 16 0 14.7687 0 13.25V4.75C0 3.23125 1.23125 2 2.75 2H6.25Z"></path>
                                                </svg>
                                                <span>Edit Profile</span>
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        {{-- End Author Info --}}
                        {{-- Components  --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 my-12">
                            @auth
                                @if (auth()->user()->username === $user->username)
                                    @forelse ($profilePosts as $post)
                                        <div class="group p-4 relative text-gray-300 bg-gray-25 border border-gray-800 rounded-lg shadow-outline hover:shadow-hover hover:outline hover:outline-2 hover:outline-primary-500 truncate">
                                            <a href="{{ route('post.show', ['username' => $post->user->username, 'slug' => $post->slug]) }}" class="opacity-0 group-hover:opacity-100 absolute top-7 left-7 px-4 py-1 rounded-md font-light text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-all duration-200 z-10">
                                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                                                </svg>
                                                Get Code
                                            </a>
                                            {{-- @auth
                                                <button wire:click="toggleLove" wire:poll.500ms class="w-9 h-9 p-2 absolute top-7 right-7 flex items-center justify-center bg-gray-700/5 hover:bg-gray-700/10 rounded-full z-10">
                                                    @if (!$post->lovedBy(auth()->user()))
                                                        <svg width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
                                                        </svg>
                                                    @else
                                                        <svg width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#F8312F"></path>
                                                        </svg>
                                                    @endif
                                                </button>
                                            @else
                                                <a href="{{ route('login') }}" class="w-9 h-9 p-2 absolute top-7 right-7 flex items-center justify-center bg-gray-700/5 hover:bg-gray-700/10 rounded-full z-10">
                                                    <svg width="18" height="18" viewBox="0 0 18 18">
                                                        <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
                                                    </svg>
                                                </a>
                                            @endauth --}}
                                            <div class="w-9 h-9 p-2 absolute top-7 right-7 flex items-center justify-center bg-gray-700/5 hover:bg-gray-700/10 rounded-full z-10">
                                                @if ($post->status === 'Active')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill fill-primary-600" viewBox="0 0 16 16">
                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                @elseif ($post->status === 'Wait')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-hourglass-split fill-[#585C7B]" viewBox="0 0 16 16">
                                                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                                    </svg>
                                                @elseif ($post->status === 'Draft')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-fill fill-yellow-600" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                @elseif ($post->status === 'Rejecte')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-radioactive fill-red-600" viewBox="0 0 16 16">
                                                        <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z"/>
                                                        <path d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                                    </svg>
                                                @endif

                                            </div>
                                            <div class="absolute bottom-24 right-7">
                                                <div class="relative inline-flex"  x-data="{ open: false }">
                                                    <button  @click="open = !open" class="w-9 h-9 p-2  flex items-center justify-center bg-gray-700/60 hover:bg-gray-700/80 rounded-full z-10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"  fill="#fff"/>
                                                        </svg>
                                                    </button>
                                                    <div x-show="open" @click.away="open = false" x-cloak x-transition class="absolute right-7 top-5 min-w-[10rem] bg-dark shadow-lg rounded-lg p-2 mt-2 divide-y border border-gray-700 divide-gray-700 z-50">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <a href="{{ route('edit.show', $post->slug) }}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-400 hover:bg-gray-25 hover:text-white focus:ring-2 focus:ring-primary-500">
                                                                Edit
                                                            </a>
                                                            <button wire:click="deletePost({{ $post->id }})" onclick="return confirm('Are you sure you want to delete this post?')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-400 hover:bg-gray-25 hover:text-white focus:ring-2 focus:ring-primary-500">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <iframe class="{{ $post->theme === 'Dark' ? 'bg-gray-25' :  'bg-[#E8E8E8]'}} w-full h-56 object-cover rounded-lg mb-4 flex items-end justify-center" title="{{ $post->name }}" loading="lazy" sandbox="allow-scripts" srcdoc="<head><script src='https://cdn.tailwindcss.com'></script><script> tailwind.config = { darkMode: 'class', } </script></head><body class='{{ $post->theme === 'Dark' ? 'dark' : 'light' }} h-screen flex items-center justify-center'><main>{{ $post->code }}</main></body>"></iframe>
                                            <div class="flex items-center justify-between">
                                                <a href="{{ route('profile.show', $post->user->username) }}" class="my-2 sm:my-0 font-normal text-white mr-2">{{ $post->user->name }}</a>
                                                <p class="text-white text-sm py-2 flex items-center gap-3">
                                                    <span class="text-gray-300">{{ $post->views }} views</span>
                                                    <span class="flex items-center gap-1">
                                                        <svg width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
                                                        </svg>
                                                        {{ $post->loves->count() }} {{ Str::plural('', $post->loves->count()) }}
                                                    </span>
                                                </p>
                                            </div>
                                            <a href="{{ route('post.show', ['username' => $post->user->username, 'slug' => $post->slug]) }}" class="group-hover:text-primary-500 font-medium text-white">{{ $post->name }}</a>
                                        </div>
                                    @empty
                                        <div class="col-span-3">
                                            <div>
                                                <img src="{{ asset("assets/images/empty.svg") }}" alt="Empty" loading="lazy" class="w-80 h-80 mx-auto" >
                                                <p class="text-gray-400 text-center">There are no components. Let's create the first one.</p>
                                                <a href="{{ route('create.show') }}" class="w-fit mt-6 mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">Create</a>
                                            </div>
                                        </div>
                                    @endforelse
                                @endif
                            @else
                                @forelse ($posts as $post)
                                    @livewire('components.post', ['post' => $post])
                                @empty
                                    <div class="col-span-3">
                                        <div>
                                            <img src="{{ asset("assets/images/empty.svg") }}" alt="Empty" loading="lazy" class="w-80 h-80 mx-auto" >
                                            <p class="text-gray-400 text-center">There are no components. Let's create the first one.</p>
                                            <a href="{{ route('create.show') }}" class="w-fit mt-6 mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">Create</a>
                                        </div>
                                    </div>
                                @endforelse
                            @endauth
                        </div>
                        {{-- End Components  --}}
                        @auth
                            @if (auth()->user()->username === $user->username)
                                {{-- Load More --}}
                                @if($profilePosts->hasMorePages())
                                    <button wire:click.prevent="loadMore" class="mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">
                                        <span wire:loading.remove>Load more</span>
                                        <div wire:loading wire:loading.class="!flex items-center">
                                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <span>Processing...</span>
                                        </div>
                                    </button>
                                @endif
                                {{-- Load More --}}
                            @endif
                        @else
                            {{-- Load More --}}
                            @if($posts->hasMorePages())
                                <button wire:click.prevent="loadMore" class="mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">
                                    <span wire:loading.remove>Load more</span>
                                    <div wire:loading wire:loading.class="!flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span>Processing...</span>
                                    </div>
                                </button>
                            @endif
                            {{-- Load More --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5">
    <div>
        {{-- Head --}}
        <div>
            <h1 class="text-white text-2xl md:text-3xl font-bold mb-1">{{ $post->name }}</h1>
            <p class="font-normal text-sm text-gray-400 md:w-[600px]">{{ $post->description }}</p>
        </div>
        {{-- End Head --}}
        <div class="container mx-auto pt-6 pb-[100px]">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-7">
                <div class="md:col-span-1 hidden md:block">
                    {{-- Sidebar --}}
                    @include('front.layouts.sidebar')
                </div>
                <div class="md:col-span-5">
                    <div>
                        {{-- Mobile Sidebar --}}
                        @include('front.layouts.mobile-sidebar')
                        <div class="flex items-center justify-between">
                            {{-- Button Open moobile sidebar --}}
                            <div class="w-full ">
                                <button data-target-drawer="explore-all-filter" class="drawer-handler group flex md:hidden max-w-[32px] h-8 w-full items-center justify-center rounded-full bg-transparent hover:bg-gray-800 border border-gray-200 hover:border-gray-800">
                                    <svg class="w-[14px] h-[14px] fill-gray-400 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                    </svg>
                                </button>
                            </div>
                            {{-- End Button Open moobile sidebar --}}
                            {{-- Views / Loves --}}
                            <div class="flex items-center">
                                {{-- Views --}}
                                <div class="flex items-center">
                                    <button class="w-8 h-8 p-2 flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-full">
                                    <svg class="w-4 h-4 fill-white" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.76667 5.32817C7.84445 5.32014 7.92223 5.31746 8 5.31746C9.47223 5.31746 10.6667 6.44514 10.6667 7.88889C10.6667 9.30853 9.47223 10.4603 8 10.4603C6.50278 10.4603 5.33334 9.30853 5.33334 7.88889C5.33334 7.81389 5.33611 7.73889 5.34445 7.66389C5.60278 7.78443 5.90278 7.88889 6.22223 7.88889C7.20278 7.88889 8 7.12014 8 6.1746C8 5.86657 7.89167 5.57728 7.76667 5.32817ZM13.35 4.04782C14.65 5.21032 15.5194 6.57907 15.9306 7.55943C16.0222 7.77103 16.0222 8.00675 15.9306 8.21835C15.5194 9.1746 14.65 10.5434 13.35 11.73C12.0417 12.9032 10.2444 13.8889 8 13.8889C5.75556 13.8889 3.95834 12.9032 2.65056 11.73C1.35056 10.5434 0.48167 9.1746 0.0683646 8.21835C-0.0227882 8.00675 -0.0227882 7.77103 0.0683646 7.55943C0.48167 6.57907 1.35056 5.21032 2.65056 4.04782C3.95834 2.87568 5.75556 1.88889 8 1.88889C10.2444 1.88889 12.0417 2.87568 13.35 4.04782ZM8 4.03175C5.79167 4.03175 4 5.75943 4 7.88889C4 10.0184 5.79167 11.746 8 11.746C10.2083 11.746 12 10.0184 12 7.88889C12 5.75943 10.2083 4.03175 8 4.03175Z"></path>
                                    </svg>
                                    </button>
                                    <small class="ml-2 font-medium text-white">{{ $post->views }}</small>
                                </div>
                                {{-- Loves --}}
                                <div class="mx-4 flex items-center">
                                    <button class="w-8 h-8 p-2 flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-full">
                                        <svg class="w-4 h-4 fill-white" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.97539 3.4724L8.30352 3.14482C9.21953 2.25205 10.4883 1.84572 11.7352 2.05326C13.6191 2.36716 15 3.9974 15 5.90873V6.06732C15 7.20208 14.5297 8.28763 13.6984 9.06146L8.75742 13.6744C8.55234 13.8658 8.28164 13.9724 8 13.9724C7.71836 13.9724 7.44766 13.8658 7.24258 13.6744L2.30129 9.06146C1.47113 8.28763 1 7.20208 1 6.06732V5.90873C1 3.9974 2.38141 2.36716 4.26484 2.05326C5.48711 1.84572 6.78047 2.25205 7.67188 3.14482L7.97539 3.4724ZM7.97539 4.71107L7.05391 3.76224C6.36211 3.07072 5.375 2.75517 4.40977 2.91623C2.94715 3.16013 1.85039 4.42669 1.85039 5.90873V6.06732C1.85039 6.96146 2.24551 7.81185 2.8982 8.42162L7.83867 13.0345C7.88242 13.0755 7.93984 13.0974 7.97539 13.0974C8.06016 13.0974 8.11758 13.0755 8.16133 13.0345L13.1023 8.42162C13.7531 7.81185 14.125 6.96146 14.125 6.06732V5.90873C14.125 4.42669 13.0531 3.16013 11.5902 2.91623C10.6004 2.75517 9.63789 3.07072 8.94609 3.76224L7.97539 4.71107Z"></path>
                                        </svg>
                                    </button>
                                    <small class="ml-2 font-medium text-white">{{ $post->loves->count() }}</small>
                                </div>
                            </div>
                            {{-- End Views / Loves --}}
                        </div>
                        {{-- Preview Code / Editor --}}
                        <div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mt-7 mb-12">
                                {{-- Preview Code --}}
                                <div class="max-h-[640px] h-full p-4 relative bg-gray-25 border border-gray-800 rounded-lg shadow-outline">
                                    @if ($post->theme === 'Dark/Light')
                                        <div class="absolute top-7 left-7">
                                            <input wire:model="darkMode" type="checkbox" id="toggleMode" class="relative w-[3.25rem] h-7 checked:bg-none rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-primary-600 focus:ring-primary-600 ring-offset-white focus:outline-none appearance-none bg-gray-700 checked:bg-primary-600 checked:hover:bg-primary-500 active:bg-primary-600 focus:ring-offset-gray-800  before:inline-block before:w-6 before:h-6 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 before:bg-gray-400 checked:before:bg-primary-200">
                                            <label for="toggleMode" class="sr-only">switch</label>
                                        </div>
                                    @endif
                                    @auth
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
                                    @endauth
                                    <iframe class="{{ $post->theme == 'Dark'  ? 'bg-[#24292E]' : 'bg-[#E8E8E8]'}} {{ $darkMode ? '!bg-[#24292E]' : '!bg-[#E8E8E8]' }} w-full h-full object-cover rounded-lg mb-4 flex items-end justify-center" loading="lazy" sandbox="allow-scripts" srcdoc="<head><script src='{{ asset('plugins/tailwindcss/tailwindcss.js') }}'></script><script> tailwind.config = { darkMode: 'class', } </script></head><body class='{{ $darkMode ? 'dark' : 'light' }} h-screen flex items-center justify-center'><main>{{ $code }}</main></body>"></iframe>
                                </div>
                                {{-- Editor --}}
                                <div class="max-h-[640px] overflow-y-scroll bg-[#24292E] border border-gray-800 rounded-lg shadow-outline">
                                    <div class="flex items-center gap-2 text-lg py-4 px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="#e74d4d" d="M12 18.178l4.62-1.256.623-6.778H9.026L8.822 7.89h8.626l.227-2.211H6.325l.636 6.678h7.82l-.261 2.866-2.52.667-2.52-.667-.158-1.844h-2.27l.329 3.544L12 18.178zM3 2h18l-1.623 18L12 22l-7.377-2L3 2z"></path></svg>
                                        <span class="text-white">HTML</span> <span class="text-white px-1 text-2xl">+</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 54 33" class="h-6 w-6 mr-1"><g clip-path="url(#prefix__clip0)"><path fill="#38bdf8" fill-rule="evenodd" d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z" clip-rule="evenodd"></path></g><defs><clipPath id="prefix__clip0"><path fill="#fff" d="M0 0h54v32.4H0z"></path></clipPath></defs></svg>
                                        <span class="text-white">Tailwind</span>
                                    </div>
                                    <div wire:ignore id="editor" class="w-full rounded-lg">{{ $post->code }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- End Preview Code / Editor --}}
                    </div>
                    {{-- Author Info --}}
                    <div class="max-w-[484px] w-full mt-24 md:mt-0">
                        <div class="flex items-center mb-3">
                            <a href="{{ route('profile.show',  $post->user->username) }}">
                                <img src="{{ $post->user->getProfilePhoto() }}" alt="{{ $post->user->name }}" class="w-12 h-12 mr-3 rounded-full outline outline-1 outline-white">
                            </a>
                            <div>
                                <p class="font-medium text-lg text-white">{{ $post->user->name }}</p>
                                <a href="{{ route('profile.show',  $post->user->username) }}">
                                    <span class="text-gray-400">&commat;{{ $post->user->username }}</span>
                                </a>
                            </div>
                        </div>
                        <p class="font-normal text-sm text-gray-400">{{ $post->user->bio }}</p>
                    </div>
                    {{-- End Author Info --}}
                </div>
            </div>
        </div>
    </div>
</section>
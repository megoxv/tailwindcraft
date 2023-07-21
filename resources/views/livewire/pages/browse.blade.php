<section class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5">
    <div>
        {{-- Head --}}
        <div>
            <h1 class="text-white text-2xl md:text-3xl font-bold mb-1">Browse all</h1>
            <p class="font-normal text-gray-400 md:w-[600px]">Open-Source UI elements made with Tailwind CSS</p>
        </div>
        {{-- End Head --}}
        <div class="container mx-auto pt-6 pb-[100px]">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-7">
                <div class="md:col-span-1 hidden lg:block">
                    @include('front.layouts.sidebar')
                </div>
                <div class="md:col-span-5">
                    <div>
                        @include('front.layouts.mobile-sidebar')
                        <div class="flex items-center justify-between md:justify-end">
                            <div class="w-full block lg:hidden">
                                <button data-target-drawer="explore-all-filter" class="drawer-handler group max-w-[32px] h-8 w-full flex items-center justify-center rounded-full bg-transparent hover:bg-gray-800 border border-gray-200 hover:border-gray-800">
                                    <svg class="w-[14px] h-[14px] fill-gray-400 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                    </svg>
                                </button>
                            </div>
                            {{-- <div class="relative ml-3 md:ml-[30px] max-w-[176px] w-full">
                                <svg class="w-[10px] h-[10px] absolute top-0 bottom-0 right-3 my-auto fill-gray-400" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99953 13C7.74367 13 7.48768 12.9023 7.29269 12.707L1.29296 6.70703C0.902348 6.31641 0.902348 5.68359 1.29296 5.29297C1.68356 4.90234 2.31635 4.90234 2.70696 5.29297L7.99953 10.5875L13.293 5.29375C13.6837 4.90312 14.3164 4.90312 14.707 5.29375C15.0977 5.68437 15.0977 6.31719 14.707 6.70781L8.70731 12.7078C8.51201 12.9031 8.25577 13 7.99953 13Z">
                                    </path>
                                </svg>
                                <select name="select" class="py-2 px-3 text-white rounded-md w-full bg-dark border border-gray-900 focus:outline-none appearance-none text-xs">
                                    <option selected="" disabled="" value="" class="hidden">Theme</option>
                                    <option value="Dark/Light">Dark/Light</option>
                                    <option value="Dark">Dark</option>
                                    <option value="Light">Light</option>
                                </select>
                            </div> --}}
                        </div>
                        {{-- Elements --}}
                        <div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 mt-7 mb-12">
                                @forelse ($posts as $post)
                                    @livewire('components.post', ['post' => $post])
                                @empty
                                    <div class="col-span-3">
                                        <div>
                                            <img src="{{ asset("assets/images/empty.svg") }}" alt="Empty" loading="lazy" class="w-80 h-80 mx-auto" >
                                            <p class="text-gray-400 text-center">There are no components or UI elements. Let's create the first one.</p>
                                            <a href="{{ route('create.show') }}" class="w-fit mt-6 mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">Create</a>    
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        {{-- End Elements --}}
                        {{-- Pagination --}}
                        {{ $posts->links() }}
                        {{-- End Pagination --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
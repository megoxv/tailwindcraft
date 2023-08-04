<div>
    {{-- In work, do what you enjoy. --}}
</div>
<section class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5" x-data="{ sidebarOpen: false }">
    <div>
        {{-- Head --}}
        <div class="flex justify-between items-end content-end">
            <div>
                <h1 class="text-white text-2xl md:text-3xl font-bold mb-1">My Loves</h1>
                <p class="font-normal text-gray-400 md:w-[600px]">Explore beloved components. Find liked collection, engage with favorites, stay connected.</p>
            </div>
            <div class="relative group rounded-md hidden lg:block">
                <input type="search" wire:model="search" id="search" class="block p-4 rounded-md w-full text-base font-normal text-white bg-gray-25 outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder="Search...">
                <label for="search" class="ltr:ml-[14px] rtl:mr-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-base font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 ltr:peer-focus:left-0 rtl:peer-focus:right-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">Search</label>
            </div>
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
                                <button x-on:click="sidebarOpen = true" aria-label="Categories" class="group max-w-[32px] h-8 w-full flex items-center justify-center rounded-full bg-transparent hover:bg-gray-800 border border-gray-200 hover:border-gray-800">
                                    <svg class="w-[14px] h-[14px] fill-gray-400 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="relative group rounded-md block lg:hidden">
                                <input type="search" wire:model="search" id="search2" class="block p-4 rounded-md w-full text-base font-normal text-white bg-gray-25 outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder="Search...">
                                <label for="search2" class="ltr:ml-[14px] rtl:mr-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-base font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 ltr:peer-focus:left-0 rtl:peer-focus:right-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">Search</label>
                            </div>
                        </div>
                        {{-- Components  --}}
                        <div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 mt-7 mb-12">
                                @forelse ($posts as $post)
                                    <livewire:components.post :post="$post" :wire:key="'item-'.$post->id"> 
                                @empty
                                    <div class="col-span-3">
                                        <div>
                                            <img src="{{ asset("assets/images/empty.svg") }}" alt="Empty" loading="lazy" class="w-80 h-80 mx-auto" >
                                            <p class="text-gray-400 text-center">There are no components. Let's create the first one.</p>
                                            <a href="{{ route('create.show') }}" class="w-fit mt-6 mx-auto px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">Create</a>    
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        {{-- End Components  --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
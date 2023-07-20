<div data-placement="left" data-drawer-width="220px" data-drawer-name="explore-all-filter" class="drawer shadow-hover fixed top-0 h-screen z-[100] overflow-hidden transition-all duration-300 w-0 left-0">
    @php
        $categories = App\Models\Category::select('name', 'slug')->get();
    @endphp
    <div class="w-[220px] h-full overflow-y-auto bg-dark">
        {{-- <div class="p-4 pb-0">
            <div class="search-box w-full relative">
                <svg class="absolute top-0 bottom-0 left-4 my-auto ml-1 w-[12px] h-[12px] fill-gray-600" width="16"
                    height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_17_172)">
                        <path
                            d="M15.7529 14.7188L11.5654 10.5312C12.4717 9.42188 12.9717 8.025 12.9717 6.5C12.9717 2.90937 10.0614 0 6.4717 0C2.88201 0 -0.000183105 2.91031 -0.000183105 6.5C-0.000183105 10.0897 2.90982 13 6.4717 13C7.99639 13 9.39514 12.4716 10.5029 11.5925L14.6904 15.78C14.8654 15.9281 15.0592 16 15.2498 16C15.4404 16 15.6336 15.9267 15.7801 15.7803C16.0717 15.4875 16.0717 15.0125 15.7529 14.7188ZM1.49982 6.5C1.49982 3.74312 3.74295 1.5 6.49982 1.5C9.2567 1.5 11.4998 3.74312 11.4998 6.5C11.4998 9.25688 9.2567 11.5 6.49982 11.5C3.74295 11.5 1.49982 9.25625 1.49982 6.5Z">
                        </path>
                    </g>
                    <defs>
                        <clipPath id="clip0_17_172">
                            <rect width="16" height="16"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <input type="text"
                    class="py-[9px] px-4 pl-[38px] w-full h-8 text-xs rounded-md bg-dark border text-white placeholder:focus:outline-none"
                    placeholder="Type Here">
            </div>
        </div> --}}
        <div class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="flex items-center">
                <svg class="w-[14px] h-[14px] fill-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
                <p class="text-gray-400">Categories</p>
            </div>
            <button data-target-drawer="explore-collection" class="drawer-handler">
                <svg class="w-[14px] h-[14px] fill-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
        <div class="px-4 pt-6 max-h-0 transition-all duration-200" style="max-height: 100vh;">
            <ul>
                <li class="flex items-center mb-3">
                    <a href="{{ route('home') }}" class="{{ request()->is('/')  ? 'text-white' : 'text-gray-500' }} font-medium flex items-center justify-between cursor-pointer">
                        All 
                    </a>
                </li>
                @foreach ($categories as $category )
                    <li class="flex items-center mb-3">
                        <a href="{{ route('category.show', $category->slug) }}" class="{{ request()->is($category->slug)  ? 'text-white' : 'text-gray-500' }} font-medium flex items-center justify-between cursor-pointer">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

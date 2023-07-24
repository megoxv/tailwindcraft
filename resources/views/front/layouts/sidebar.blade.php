<div class="sticky top-2">
    @php
        $categories = App\Models\Category::select('name', 'slug')->orderBy('name')->get();
    @endphp
    <div class="bg-dark rounded-sm shadow-normal">
        <div
            class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="flex items-center">
                <svg class="w-[14px] h-[14px] fill-gray-400 mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
                <p class="text-gray-400">Categories</p>
            </div>
        </div>
        <div class="space-y-3 pt-4 w-full max-h-[90vh] overflow-auto">
            <div class="px-4">
                <a href="{{ route('home') }}" class="{{ request()->is('/')  ? 'text-white' : 'text-gray-400' }} font-medium flex items-center justify-between cursor-pointer">
                    All 
                </a>
            </div>
            @foreach ($categories as $category )
                <div class="px-4">
                    <a href="{{ route('category.show', $category->slug) }}" class="{{ request()->is($category->slug)  ? 'text-white' : 'text-gray-400' }} font-medium flex items-center justify-between cursor-pointer">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
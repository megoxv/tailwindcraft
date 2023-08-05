<x-ad-component slug="sidebar" />

<footer class="bg-gray-25">
    <div class="container max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <small class="pt-4 pb-2 md:py-9 text-center w-full md:w-auto text-white font-normal">
                Copyright © 2023 {{ getSetting('website_name') }}. All Rights Reserves
            </small>
            @php
                $menu = \App\Models\Menu::where('location', 'footer')
                    ->with([
                        'links' => function ($q) {
                            $q->orderBy('order', 'ASC');
                        },
                    ])
                    ->first();
            @endphp
            <div class="pt-2 pb-4 md:py-9 w-full md:w-auto flex items-center justify-center gap-6">
                @if ($menu != null)
                    @foreach ($menu->links as $link)
                        <a href="{{ $link->url }}" aria-label="{{ $link->title }}" class="text-[12.8px] text-white hover:text-primary-500">{{ $link->title }}</a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>

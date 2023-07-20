@isset($ad)
    <div class="smart-banner-temp" banner-slug="{{ $ad->slug }}">
        @if ($ad->adType == 'HTML')
            {!! $ad->body !!}
        @elseif($ad->adType == 'IMAGE')
            <a href="{{ $ad->imageUrl ? $ad->imageUrl : '#' }}" target="_blank" class="block my-6">
                <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->imageAlt }}" class="mx-auto" />
            </a>
        @endif
    </div>
@endisset

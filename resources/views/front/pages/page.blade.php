@extends('layouts.app')

@section('content')
    <div class="max-w-6xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto min-h-screen">
        <div class="mb-4">
            <h2 class="text-3xl font-bold lg:text-5xl text-white">{{ $page->title }}</h2>
        </div>
        {{-- Content --}}
        <div
            class="space-y-5 md:space-y-8 prose prose-invert prose-img:rounded-xl prose-headings:underline prose-a:text-blue-600 hover:prose-a:text-blue-500 min-w-full">
            {!! $page->content !!}
        </div>
        {{-- End Content --}}
    </div>
@endsection

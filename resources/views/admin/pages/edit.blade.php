@extends('layouts.admin')
@section('title', __('main.pages'))

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-grid">
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="title" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.title') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                            <input type="text" id="title" name="title" value="{{ $page->title }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                        @error('title')
                            <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="slug" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.slug') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                            <input type="text" id="slug" name="slug" value="{{ $page->slug }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                        @error('slug')
                            <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="content" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.content') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <textarea name="content" id="editor">{{ $page->content }}</textarea>
                        @error('slug')
                            <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="block">
                        @if (!empty($page->image))
                            <img src="{{ $page->image }}" alt="image" loading="lazy" id="holder" class="max-w-full h-64 rounded-xl">
                        @endif
                        <div class="mt-6 grid">
                            <input type="text" id="image" name="image" class="hidden">
                            <label id="lfm-image" data-input="image" data-preview="holder" class="inline-flex justify-center items-center gap-x-3 w-full text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800 cursor-pointer">{{ __('main.image_upload') }}</label>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="status" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.status') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <select name="status" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <option value="1" @if($page->status == 1) selected @endif>{{ __('main.published') }}</option>
                            <option value="0" @if($page->status == 0) selected @endif>{{ __('main.draft') }}</option>
                        </select>
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="meta_title" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.meta_title') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.optional') }}</span>
                        </div>
                            <input type="text" id="meta_title" name="meta_title" value="{{ $page->meta_title }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                        @error('meta_title')
                            <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="meta_description" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.meta_description') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.optional') }}</span>
                        </div>
                        <textarea id="meta_description" name="meta_description" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" rows="3">{{ $page->meta_description }}</textarea>
                        @error('meta_description')
                            <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        {{ __('main.update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    $('#lfm-image').filemanager('image');
</script>
@endpush
@extends('layouts.admin')
@section('title', __('main.posts'))

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-grid">
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="name" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.name') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                            <input type="text" id="name" name="name" value="{{ $post->name }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                        @error('name')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="slug" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.slug') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                            <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                        @error('slug')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="description" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.description') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <textarea id="description" name="description" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" rows="3">{{ $post->description }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="code" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.code') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <textarea name="code" id="code" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">{{ $post->code }}</textarea>
                        @error('code')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="category" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.category') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <select name="category_id" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            @foreach ( $categories as $category )
                                <option value="{{ $category->id }}" @if(($post->category_id == $category->id)) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="status" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.status') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <select name="status" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <option value="Draft" @if($post->status == 'Draft') selected @endif>{{ __('main.draft') }}</option>
                            <option value="Wait" @if($post->status == 'Wait') selected @endif>{{ __('main.wait') }}</option>
                            <option value="Active" @if($post->status == 'Active') selected @endif>{{ __('main.active') }}</option>
                            <option value="Active" @if($post->status == 'Rejecte') selected @endif>{{ __('main.rejecte') }}</option>
                        </select>
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="theme" class="block text-sm font-medium mb-2 dark:text-white">{{ __('main.theme') }}</label>
                            <span class="block text-sm text-gray-500 mb-2">{{ __('main.required') }}</span>
                        </div>
                        <select name="theme" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <option value="Dark/Light" @if($post->theme == 'Dark/Light') selected @endif>Dark/Light</option>
                            <option value="Dark" @if($post->theme == 'Dark') selected @endif>Dark</option>
                            <option value="Light" @if($post->theme == 'Light') selected @endif>Light</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        {{ __('main.update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
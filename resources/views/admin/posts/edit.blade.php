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
                    {{-- Preview Code --}}
                    <div class="max-h-[640px] h-full p-4 relative bg-gray-25 border border-gray-800 rounded-lg shadow-outline">
                        <iframe class="{{ $post->theme == 'Dark'  ? 'bg-[#24292E]' : 'bg-[#E8E8E8]'}} w-full h-full object-cover rounded-lg mb-4 flex items-end justify-center" loading="lazy" sandbox="allow-scripts" srcdoc="<head><script src='{{ asset('plugins/tailwindcss/tailwindcss.js') }}'></script><script> tailwind.config = { darkMode: 'class', } </script></head><body class='h-screen flex items-center justify-center'><main>{{ $post->code }}</main></body>"></iframe>
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
                            <option value="Rejecte" @if($post->status == 'Rejecte') selected @endif>{{ __('main.rejecte') }}</option>
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
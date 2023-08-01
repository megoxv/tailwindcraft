<div class="group p-4 relative text-gray-300 bg-gray-25 border border-gray-800 rounded-lg shadow-outline hover:shadow-hover hover:outline hover:outline-2 hover:outline-primary-500 truncate">
    <a href="{{ route('post.show', ['username' => $post->user->username, 'slug' => $post->slug]) }}" class="opacity-0 group-hover:opacity-100 absolute top-7 left-7 px-4 py-1 rounded-md font-light text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-all duration-200 z-10">
        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
        </svg>
        Get Code
    </a>
    @auth
        <button wire:click="toggleLove" class="w-9 h-9 p-2 absolute top-7 right-7 flex items-center justify-center bg-gray-700/5 hover:bg-gray-700/10 rounded-full z-10" aria-label="Add love">
            @if (!$post->lovedBy(auth()->user()))
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
                </svg>
            @else
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#F8312F"></path>
                </svg>
            @endif
        </button>
    @else
        <a href="{{ route('login') }}" class="w-9 h-9 p-2 absolute top-7 right-7 flex items-center justify-center bg-gray-700/5 hover:bg-gray-700/10 rounded-full z-10" aria-label="Login first to Add love">
            <svg width="18" height="18" viewBox="0 0 18 18">
                <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
            </svg>
        </a>
    @endauth
    <iframe class="{{ $post->theme === 'Dark' ? 'bg-gray-25' :  'bg-[#E8E8E8]'}} w-full h-56 object-cover rounded-lg mb-4 flex items-end justify-center" title="{{ $post->name }}" loading="lazy" sandbox="allow-scripts" srcdoc="<head><script src='https://cdn.tailwindcss.com'></script><script> tailwind.config = { darkMode: 'class', } </script></head><body class='{{ $post->theme === 'Dark' ? 'dark' : 'light' }} h-screen flex items-center justify-center'><main>{{ $post->code }}</main></body>"></iframe>
    <div class="flex items-center justify-between">
        <a href="{{ route('profile.show', $post->user->username) }}" class="my-2 sm:my-0 font-normal text-white mr-2">{{ $post->user->name }}</a>
        <p class="text-white text-sm py-2 flex items-center gap-3">
            <span class="text-gray-300">{{ $post->views }} views</span>
            <span class="flex items-center gap-1">
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <path d="M0 6.71134V6.50744C0 4.05002 1.77609 1.954 4.19766 1.55041C5.76914 1.28357 7.43203 1.80599 8.57812 2.95384L9 3.37502L9.39023 2.95384C10.568 1.80599 12.1992 1.28357 13.8023 1.55041C16.2246 1.954 18 4.05002 18 6.50744V6.71134C18 8.17033 17.3953 9.56603 16.3266 10.561L9.97383 16.4918C9.71016 16.7379 9.36211 16.875 9 16.875C8.63789 16.875 8.28984 16.7379 8.02617 16.4918L1.67309 10.561C0.605742 9.56603 1.05469e-05 8.17033 1.05469e-05 6.71134H0Z" fill="#585C7B"></path>
                </svg>
                {{ $post->loves->count() }} {{ Str::plural('', $post->loves->count()) }}
            </span>
        </p>
    </div>
    <a href="{{ route('post.show', ['username' => $post->user->username, 'slug' => $post->slug]) }}" class="group-hover:text-primary-500 font-medium text-white">{{ $post->name }}</a>
</div>

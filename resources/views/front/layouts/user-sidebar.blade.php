<div id="application-sidebar" class="lg:col-span-1 hs-overlay hs-overlay-open:trangray-x-0 -trangray-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-64 overflow-y-auto scrollbar-y h-fit lg:relative lg:block lg:trangray-x-0 lg:right-auto lg:bottom-0 scrollbar-y p-4 bg-gray-25 rounded-lg outline outline-1 outline-gray-800 shadow-outline">
    <nav class="hs-accordion-group w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a href="{{ route('user.profile') }}" class="{{ request()->is('user/profile*') ? 'bg-dark text-white' : 'text-gray-400' }} flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-md hover:bg-dark hover:text-gray-300">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    {{ __('main.profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('user.security') }}" class="{{ request()->is('user/security*') ? 'bg-dark text-white' : 'text-gray-400' }} flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-md hover:bg-dark hover:text-gray-300">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                    </svg>
                    {{ __('main.security') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

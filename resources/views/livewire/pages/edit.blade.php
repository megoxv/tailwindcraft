<section class="container px-2 lg:px-8 transition-all duration-200 mx-auto py-5">
    <div wire:submit.prevent="updatePost"  x-data="{ 'updateModal': false }" @click.away="updateModal = false">
        <div>
            {{-- Head --}}
            <div>
                <input type="text" wire:model="name" class="block text-white text-2xl md:text-3xl font-bold md:w-[600px] mb-1 bg-transparent border-none focus:ring-transparent" placeholder="Write Name" maxlength="60" required>
                <textarea wire:model="description" class="block text-white text-sm font-normal h-[78px] md:w-[600px] bg-transparent border-none focus:ring-transparent resize-none" placeholder="Write Description" maxlength="160" required></textarea>
            </div>
            {{-- End Head --}}
            <div class="container mx-auto pt-6 pb-[100px]">
                {{-- Preview Code / Editor --}}
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mt-7 mb-12">
                        {{-- Preview Code --}}
                        <div class="max-h-[640px] h-full p-4 relative bg-gray-25 border border-gray-800 rounded-lg shadow-outline">
                            <div class="absolute top-7 left-7">
                                <input wire:model="darkMode" type="checkbox" id="toggleMode" class="relative w-[3.25rem] h-7 checked:bg-none rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-primary-600 focus:ring-primary-600 ring-offset-white focus:outline-none appearance-none bg-gray-700 checked:bg-primary-600 checked:hover:bg-primary-500 active:bg-primary-600 focus:ring-offset-gray-800  before:inline-block before:w-6 before:h-6 before:trangray-x-0 checked:before:trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 before:bg-gray-400 checked:before:bg-primary-200">
                                <label for="toggleMode" class="sr-only">switch</label>
                            </div>
                            <iframe class="{{ $darkMode ? 'bg-[#24292E]' : 'bg-[#E8E8E8]' }} w-full h-full object-cover rounded-lg mb-4 flex items-end justify-center" loading="lazy" sandbox="allow-scripts" srcdoc="<head><script src='{{ asset('plugins/tailwindcss/tailwindcss.js') }}'></script><script> tailwind.config = { darkMode: 'class', } </script></head><body class='{{ $darkMode ? 'dark' : 'light' }} h-screen flex items-center justify-center'>{{ $code }}</body>"></iframe>
                        </div>
                        {{-- Editor --}}
                        <div class="max-h-[640px] overflow-y-scroll bg-[#24292E] border border-gray-800 rounded-lg shadow-outline">
                            <div class="flex items-center gap-2 text-lg py-4 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="#e74d4d" d="M12 18.178l4.62-1.256.623-6.778H9.026L8.822 7.89h8.626l.227-2.211H6.325l.636 6.678h7.82l-.261 2.866-2.52.667-2.52-.667-.158-1.844h-2.27l.329 3.544L12 18.178zM3 2h18l-1.623 18L12 22l-7.377-2L3 2z"></path></svg>
                                <span class="text-white">HTML</span> <span class="text-white px-1 text-2xl">+</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 54 33" class="h-6 w-6 mr-1"><g clip-path="url(#prefix__clip0)"><path fill="#38bdf8" fill-rule="evenodd" d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z" clip-rule="evenodd"></path></g><defs><clipPath id="prefix__clip0"><path fill="#fff" d="M0 0h54v32.4H0z"></path></clipPath></defs></svg>
                                <span class="text-white">Tailwind</span>
                            </div>
                            <div wire:ignore id="editor" class="w-full rounded-lg">{{ $code }}</div>
                        </div>
                    </div>
                </div>
                {{-- End Preview Code / Editor --}}
                <div class="flex justify-center md:justify-end pt-1 md:pt-2 pb-4 md:pb-12">
                    <button class="px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200" @click="updateModal = true">Update</button>
                </div>
            </div>
        </div>
    
        @php
            $categories = App\Models\Category::get();
        @endphp
        {{-- Modal Update --}}
        <div x-show="updateModal" class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50">
            <div class="ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto" @click.away="updateModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="relative flex flex-col bg-dark shadow-lg rounded-xl">
                    <div class="absolute top-2 right-2">
                        <button type="button" @click="updateModal = false" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800">
                            <span class="sr-only">Close</span>
                            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
    
                    <div class="p-4 sm:p-10 text-center overflow-y-auto space-y-8">
                        {{-- Category --}}
                        <div class="relative w-full bg-gray-25 group rounded-md">
                            <select id="category" class="block p-4 rounded-md w-full text-base font-normal text-white bg-gray-25 outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " wire:model="category">
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="category" class="ltr:ml-[14px] rtl:mr-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-dark text-base font-normal text-gray-400 duration-300 transform -trangray-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 ltr:peer-focus:left-0 rtl:peer-focus:right-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:trangray-y-[4.5px] peer-focus:scale-75 peer-focus:-trangray-y-[20px]">Category</label>
                        </div>
                        {{-- End Category --}}
                        {{-- Theme --}}
                        <div class="relative w-full bg-dark group rounded-md">
                            <select id="theme" class="block p-4 rounded-md w-full text-base font-normal text-white bg-gray-25 outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " wire:model="theme">
                                <option value="" selected>Select Theme</option>
                                <option value="Dark/Light">Dark/Light</option>
                                <option value="Dark">Dark</option>
                                <option value="Light">Light</option>
                            </select>
                            <label for="theme" class="ltr:ml-[14px] rtl:mr-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-dark text-base font-normal text-gray-400 duration-300 transform -trangray-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 ltr:peer-focus:left-0 rtl:peer-focus:right-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:trangray-y-[4.5px] peer-focus:scale-75 peer-focus:-trangray-y-[20px]">Theme</label>
                        </div>
                        {{-- End Theme --}}
                        <button type="submit" wire:click="updatePost" class="w-full px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200">Update</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal Update --}}
    </div>
</section>
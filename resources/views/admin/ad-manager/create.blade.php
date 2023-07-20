@extends('layouts.admin')
@section('title', __('main.ads_manager'))

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-white">
            {{ __('main.create_new_ad') }}
        </h2>

        <form action="{{ route('admin.ads-manager.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-xl space-y-6">
                <div>
                    <label for="name" class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" required>
                    @error('name')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ adType: '{{ !empty(old('adType')) ? old('adType') : 'HTML' }}' }">
                    <div class="grid sm:grid-cols-2 gap-2 mb-6">
                        <label
                            class="flex p-3 block w-full bg-white border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('main.html_ad') }}</span>
                            <input x-model="adType" type="radio" name="adType" value="HTML"
                                class="shrink-0 ml-auto mt-0.5 border-gray-200 rounded-full text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                checked>
                        </label>
                        <label
                            class="flex p-3 block w-full bg-white border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('main.image_ad') }}</span>
                            <input x-model="adType" type="radio" name="adType" value="IMAGE"
                                class="shrink-0 ml-auto mt-0.5 border-gray-200 rounded-full text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                        </label>
                    </div>

                    <div x-show="adType == 'HTML'">
                        <div>
                            <label for="body" class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.ad_body') }}</label>
                            <textarea name="body" id="body" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" cols="30" rows="10">{{ old('body') }}</textarea>
                            @error('body')
                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div x-show="adType == 'IMAGE'">
                        <div class="space-y-6">
                            <div>
                                <label for="image" class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.image_upload') }}</label>
                                <input type="file" name="image" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400" id="image">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF ({{ __('main.max') }}. 800x400px).</p>
                                @error('image')
                                    <span class="text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="imageUrl"
                                    class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.image_url') }}</label>
                                <input type="url" name="imageUrl" placeholder="{{ __('main.image_url') }}" value="{{ old('imageURL') }}" id="imageUrl" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('main.url_address_where_advert_should_redirect_on_click') }}</p>
                                @error('imageUrl')
                                    <span class="text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="imageAlt" class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.image_alt') }}</label>
                                <input type="text" name="imageAlt" placeholder="{{ __('main.image_alt') }}" value="{{ old('imageAlt') }}" id="imageAlt" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400">
                                @error('imageAlt')
                                    <span class="text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{
                    selected: null,
                    toggle(event) {
                        var collapseRef = event.currentTarget.getAttribute('aria-controls');
                
                        this.selected = (collapseRef !== this.selected) ? collapseRef : null;
                    },
                    isAccordionOpen(collapseRef) {
                        return this.selected == collapseRef ? true : false;
                    },
                    defaultOpen(collapseRef) {
                        this.selected = collapseRef;
                    }
                }" class="my-3">
                    <div x-id="['accordion-item']" class="dark:border-gray-700 bg-white dark:bg-gray-900 border rounded-md">
                        <div class="mb-0 font-lg">
                            <button x-on:click="toggle" type="button"
                                :aria-expanded="isAccordionOpen($id('accordion-item'))"
                                :aria-controls="$id('accordion-item')"
                                class="flex items-center justify-between p-3 w-full focus:border focus:border-blue-500 focus:ring-blue-500"
                                :class="isAccordionOpen($id('accordion-item')) & amp; & amp;
                                'bg-blue-100 text-blue-800'"
                                @keydown.space.prevent.stop="toggle">
                                <span class="font-semibold dark:text-white">{{ __('main.automatic_ad_insertion') }} ({{ __("main.optional") }})</span>
                                <span>
                                    <svg class="rotate-0 h-6 w-6 transform dark:text-gray-300" :class="isAccordionOpen($id('accordion-item')) && 'rotate-180'" x-transition="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div :id="$id('accordion-item')" x-show="isAccordionOpen($id('accordion-item'))" x-cloack=""
                            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-y-0"
                            x-transition:enter-end="scale-y-100" x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-0"
                            class="transition-transform ease-out overflow-hidden origin-top transform p-3">

                            <div x-data="{
                                placements: [{
                                    position: '',
                                    selector: '',
                                    style: '',
                                }],
                                addNewPlacement() {
                                    this.placements.push({
                                        position: '',
                                        selector: '',
                                        style: ''
                                    });
                                },
                                removePlacement(index) {
                                    this.placements.splice(index, 1);
                                }
                            }">
                                <template x-for="(placement, index) in placements" :key="index">
                                    <div class="rounded bg-gray-200 border border-gray-400 dark:bg-gray-800 dark:border-gray-700 p-2 my-3 space-y-6">
                                        <div class="text-red-500 text-sm cursor-pointer" @click="removePlacement(index)">{{ __('main.remove') }}</div>
                                        <div>
                                            <label
                                                class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.ad_position') }} <span x-text="index+1"></span></label>
                                            <select x-model="placement.position" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                <option value="">{{ __('main.none') }}</option>
                                                <option value="beforebegin">{{ __('main.before') }} HTML Selector</option>
                                                <option value="afterend">{{ __('main.after') }} HTML Selector</option>
                                                <option value="afterbegin">{{ __('main.inside') }} HTML Selector ({{ __('main.at_beginning') }})</option>
                                                <option value="beforeend">{{ __('main.inside') }} HTML Selector ({{ __('main.end') }})</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.selector') }} <span x-text="index+1"></span></label>
                                            <input type="text" x-model="placement.selector"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                placeholder="CSS Selector like #id-name / .class-name / body > p">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm mb-2 text-gray-700 font-medium dark:text-white">{{ __('main.custom_css_styles') }} <span x-text="index+1"></span></label>
                                            <input type="text" x-model="placement.style"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                placeholder="Custom Style like  float:right; margin: 10px;">
                                        </div>
                                    </div>
                                </template>
                                <div class="text-sm text-gray-500 mt-2 cursor-pointer" @click="addNewPlacement()">
                                    {{ __('main.add_more_placement') }}
                                </div>
                                <input type="hidden" :value="JSON.stringify(placements)" name="placements" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">{{ __('main.add') }}</button>
                </div>

            </div>
            <input type="hidden" name="form_type" value="create" />
        </form>
    </div>
@endsection

@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-dark px-6 py-4">
        <div class="text-lg font-bold text-white">
            {{ $title }}
        </div>

        <div class="mt-4 text-gray-400">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 text-right bg-dark">
        {{ $footer }}
    </div>
</x-jet-modal>

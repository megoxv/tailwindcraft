@aware(['component'])

@php
    $attributes = $attributes->merge(['wire:key' => 'empty-message-'.$component->id]);
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <tr {{ $attributes }}>
        <td colspan="{{ $component->getColspanCount() }}" class="h-px w-72 whitespace-nowrap">
            <div class="flex justify-center items-center space-x-2 dark:bg-gray-800">
                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $component->getEmptyMessage() }}</span>
            </div>
        </td>
    </tr>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
     <tr {{ $attributes }}>
        <td colspan="{{ $component->getColspanCount() }}">
            {{ $component->getEmptyMessage() }}
        </td>
    </tr>
@endif

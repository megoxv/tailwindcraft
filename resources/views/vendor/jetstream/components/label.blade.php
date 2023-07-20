@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-300 font-medium mb-2']) }}>
    {{ $value ?? $slot }}
</label>

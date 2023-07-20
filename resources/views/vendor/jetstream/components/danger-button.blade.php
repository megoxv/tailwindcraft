<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-red-500 text-white hover:bg-red-600 transition-colors duration-200']) }}>
    {{ $slot }}
</button>

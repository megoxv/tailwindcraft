<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 md:px-8 py-2 md:py-4 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-[18px] py-[10px] md:py-2 rounded-md font-medium text-base flex items-center justify-center hover:bg-primary-25 bg-gray-25 border border-primary-500 text-gray-300 hover:text-primary-500 transition-colors duration-200']) }}>
    {{ $slot }}
</button>

const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'dd',
    content: [
        'node_modules/preline/dist/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                'sans': ['Noto Sans', 'system-ui'],
            },
            boxShadow: {
                'out': '0 2px 0 0 rgba(255,255,255,1)',
                'outline': '0px 1px 6px rgba(62, 66, 101, 0.05)',
                'hover': '0px 20px 24px rgba(62, 66, 101, 0.07)',
            },
            colors: {
                'gray-25': '#24292E',
                'primary-25': '#F9F5FF',
                'primary-100': '#E8DBFE',
                'primary-200': '#cfb7fd',
                'primary-300': '#B392FA',
                'primary-500': '#764AF1',
                'primary-600': '#5A36CF',
                'dark': '#1A1B1F',
            },
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('preline/plugin')],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    100: '#0b4eb3',
                    200: '#0a459c',
                },
                'secondary': '#ffc200',
                'seasmoke': '#f6f9ff',
            },
            screens: {
                'tablet': '640px',
                'laptop': '1023px',
                'desktop': '1280px',
            },
        },
    },
    plugins: [forms, typography],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    blue: '#11558d',
                    'blue-dark': '#0d3f6b',
                    'blue-darker': '#0a2d4d',
                    'blue-tint': '#eaf4fc',
                    green: '#57ad32',
                    'green-dark': '#3f8322',
                    'green-tint': '#f1f9e9',
                },
            },
            fontFamily: {
                sans: ['Aileron', ...defaultTheme.fontFamily.sans],
                serif: ['Fraunces', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};

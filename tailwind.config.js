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
            fontFamily: {
                sans: ['Mulish', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    default: '#479d4a',
                    '50': '#f3faf3',
                    '100': '#e3f5e3',
                    '200': '#c9e9c9',
                    '300': '#9ed7a0',
                    '400': '#6cbc6e',
                    '500': '#479d4a',
                    '600': '#37823a',
                    '700': '#2e6730',
                    '800': '#28532a',
                    '900': '#234425',
                    '950': '#0f2411',
                },
            }
        },
    },

    plugins: [],
};

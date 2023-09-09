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
                    primary: '#55ab21',
                    '50': '#f2fce9',
                    '100': '#e2f8cf',
                    '200': '#c5f2a4',
                    '300': '#a0e76f',
                    '400': '#7ed843',
                    '500': '#55ab21',
                    '600': '#469719',
                    '700': '#377318',
                    '800': '#2f5c18',
                    '900': '#2a4e19',
                    '950': '#122b08',
                },
            }
        },
    },

    plugins: [],
};

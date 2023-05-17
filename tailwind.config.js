import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                munro: {
                    50: '#E7F9E6',
                    100: '#D3F5D1',
                    200: '#A3E99F',
                    300: '#77DF72',
                    400: '#4BD544',
                    500: '#30B529',
                    600: '#279221',
                    700: '#1D6C18',
                    800: '#134710',
                    900: '#0A2508',
                    950: '#041104',
                },
                'munro-dark': {
                    50: '#FBEEFB',
                    100: '#F5DAF7',
                    200: '#ECB8EF',
                    300: '#E293E7',
                    400: '#D86DDE',
                    500: '#CF4AD6',
                    600: '#B42ABB',
                    700: '#88208D',
                    800: '#5C1660',
                    900: '#2C0A2E',
                    950: '#180619',
                },
            },
        },
    },

    plugins: [forms],
};

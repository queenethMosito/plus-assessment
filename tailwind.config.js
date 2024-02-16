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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'dark-gray': '#222222',
            'yellow': '#FFCC34',
            'darker-gray': '#1D1D1D',
            'red': '#F84453',
            'light-gray': '#E6E6E6',
            'mid-gray': '#303030',
            'green': '#d4edda',
            'lighter-green': '#c3e6cb',

        },
        textColor: {
            'white': '#ffffff',
            'yellow': '#FFCC34',
            'red': '#FF0000',
            'darker-gray': '#1D1D1D',
            'green': '#155724',
        },
    },

    plugins: [forms],
};

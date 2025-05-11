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
                sans: ['Poppins','sans-serif','Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

        corePlugins: {
        preflight: false, // Ini menonaktifkan optimasi Windsurf yang mendeteksi duplikat
    },


    plugins: [forms],
};

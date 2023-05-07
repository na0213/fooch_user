const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
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
            colors: {
                // 'カラー名': 'カラーコード'
                'mimosa': '#FFF462',
                'detail': '#61fff4',
                'delete': '#FF616b',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

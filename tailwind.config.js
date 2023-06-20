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
                'lyellow': '#FFF67F',
                'lred': '#EF845C',
                'lorange': '#F9C270',
                'lgreen': '#C1DB81',
                'lblue': '#54C3F1',
                'semi-transparent-yellow': 'rgba(255, 255, 251, 0.5)',
                'back': '#F6F7F8',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

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
                'luna-orange': '#D9773D',
                'luna-bg': '#FDFBF8',
            },
            fontFamily: {
                // Ganti sans jadi Jakarta Sans biar cakep
                sans: ['Plus Jakarta Sans', 'Figtree', 'sans-serif'],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
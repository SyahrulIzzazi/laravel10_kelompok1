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
    },

    plugins: [forms],
    // daisyui: {
    //     themes: false, // false: only light + dark | true: all themes | array: specific themes
    //     darkTheme: "light", // nama tema untuk mode gelap
    //     base: true, // menerapkan warna latar belakang dan warna latar depan untuk elemen root
    //     styled: false, // menyertakan warna dan desain daisyUI untuk semua komponen
    //     utils: true, // menambahkan kelas utilitas responsif dan modifier
    //     prefix: "", // prefix untuk classnames daisyUI
    //     logs: true, // Menampilkan info tentang versi dan konfigurasi daisyUI saat membangun CSS
    //     themeRoot: ":root", // Elemen yang menerima variabel warna tema CSS
    // },
};

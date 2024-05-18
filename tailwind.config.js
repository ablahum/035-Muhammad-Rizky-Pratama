/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                card: "rgba(255, 255, 255, 0.7)",
                primary: "#243c5a",
            },
            backgroundImage: {
                "sign-page": "url('/public/assets/bg.png')",
            },
        },
    },
    plugins: [],
};

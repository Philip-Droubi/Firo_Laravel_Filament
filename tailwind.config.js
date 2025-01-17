/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            // Screen sizes
            screens: {
                xsm: "520px",
                xxsm: "420px",
                xxxsm: "360px",
                xxxxsm: "320px",
                md: "769px",
                sc_940: "940px",
                mdp: "992px", //md plus
            },
        },
    },
    plugins: [],
}

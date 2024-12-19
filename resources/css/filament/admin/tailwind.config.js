import theme from 'tailwindcss/defaultTheme'
import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './vendor/filament/**/*.blade.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/components/filament/**/*.blade.php',
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
}

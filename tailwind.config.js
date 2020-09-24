const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    important: true,
    theme: {
        fontFamily: {
            sans: ["Inter", ...defaultTheme.fontFamily.sans],
            display: ["Staatliches", ...defaultTheme.fontFamily.sans]
        },
        colors: {
            transparent: "transparent",
            white: "#fff",
            black: "#2c1b1d",
            spatie: '#197593',
            yellow: {
                100: '#fcf8e7',
                500: '#f0de38'
            },
            purple: {
                400: '#4530a8',
                500: '#47286f'
            },
            blue: {
                200: '#daf1f5',
                500: '#0756b0'
            },
            green: {
                500: '#75ad20'
            },
            red: {
                500: '#9c1c13'
            },
        },

        extend: {
            inset: {
                full: "100%"
            },
            opacity:{
                20: '0.2',
            },
            textOpacity:{
                10: '0.1',
                90: '0.9'
            },
            fontSize: {
                '7xl' : '6rem'
            }
        }
    },
    variants: {
        opacity: ["responsive", "hover", "focus", "group-hover"]
    }
};

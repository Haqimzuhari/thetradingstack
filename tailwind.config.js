const colors = require('tailwindcss/colors')

module.exports = {
  content: [
        "./resources/**/*.blade.php",
    ],
  theme: {
    fontFamily: {
        'sans': ['Urbanist'],
        'serif': ['Libre Bodoni'],
    },
    extend: {
        colors: {
            primary: colors.zinc,
            secondary: colors.zinc,
            general: colors.slate,
            danger: colors.red,
        },
    },
  },
  plugins: [],
}

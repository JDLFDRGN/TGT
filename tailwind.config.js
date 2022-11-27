/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./admin/**/*.php", "./node_modules/flowbite/**/*.js"],
  darkMode: "class",
  theme: {
    extend: {
      backgroundImage: {
        'gradient-custom' : 'radial-gradient(circle at 10% 20%, rgb(0, 93, 133) 0%, rgb(0, 181, 149) 90%);',
      },
      animation: {
        drop: 'drop .8s linear 1',
      },
      keyframes: {
        drop: {
          '0%': {transform: 'translateX(-50%)', top: '-50%'},
          '100%': {transform: 'translateX(-50%)', top: '2rem'},
        },
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

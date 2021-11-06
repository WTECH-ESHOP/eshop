module.exports = {
  purge: ['./resources/**/*.blade.php', './resources/**/*.js'],

  prefix: 'tw-',

  darkMode: false,

  theme: {
    fontFamily: {
      nunito: ['nunito', 'sans-serif'],
    },

    colors: {
      black: '#000',
      white: '#fff',
    },
  },

  variants: {
    extend: {},
  },

  plugins: [],
}

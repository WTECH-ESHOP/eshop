module.exports = {
  purge: ['./resources/**/*.blade.php', './resources/**/*.js'],

  darkMode: false,

  theme: {
    container: {
      center: true,
    },

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

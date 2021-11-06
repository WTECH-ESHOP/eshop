module.exports = {
  purge: ['./resources/**/*.blade.php', './resources/**/*.js'],

  darkMode: false,

  theme: {
    container: {
      center: true,
    },

    fontFamily: {
      rubik: ['rubik', 'sans-serif'],
    },

    colors: {
      black: '#161616',
      white: '#fff',
      grey: '#E3E6E8',
    },
  },

  variants: {
    extend: {},
  },

  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          width: '92%',
          '@screen sm': {
            maxWidth: '100%',
          },
          '@screen md': {
            maxWidth: '100%',
          },
          '@screen lg': {
            maxWidth: '100%',
          },
          '@screen xl': {
            maxWidth: '1440px',
          },
        },
      })
    },
  ],
}

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
      darkGrey: '#535466',

      secondary: '#33354E',
    },

    extend: {
      spacing: {
        '18p': '18px',
        '48p': '48px',
        '16p': '16px',
      },

      borderRadius: {
        '1/2': '50%',
      },

      fontSize: {
        '9p': '9px',
      },

      minHeight: {
        '200p': '200px',
        '400p': '400px',
      },

      height: {
        '60vh': '60vh',
      },
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
            maxWidth: '1280px',
          },
        },
      })
    },
  ],
}

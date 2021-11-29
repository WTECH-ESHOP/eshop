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

    extend: {
      spacing: {
        '10p': '10px',
        '18p': '18px',
        '48p': '48px',
        '16p': '16px',
        '24p': '24px',
        '3p': '3px',
        '80p': '80px',
        '32p': '32px',
        '40p': '40px',
        '20p': '20px',
        '55p': '55px',
        '38p': '38px',
        '100p': '100px',
      },

      colors: {
        black: '#161616',
        white: '#fff',
        grey: '#E3E6E8',
        darkGrey: '#535466',
        lightGrey: '#B8BFC5',

        secondary: '#33354E',
      },

      borderRadius: {
        '1/2': '50%',
        '10p': '10px',
      },

      borderWidth: {
        3: '3px',
      },

      zIndex: {
        99: '99',
      },

      fontSize: {
        '8p': '8px',
        '9p': '9px',
        '10p': '10px',
        '36p': '36px',
      },

      minHeight: {
        '200p': '200px',
        '400p': '400px',
      },

      maxWidth: {
        '200p': '200px',
      },

      width: {
        '1p': '1px',
      },

      height: {
        '2p': '2px',
        '60vh': '60vh',
      },

      flexGrow: {
        2: 2,
        6: 6,
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

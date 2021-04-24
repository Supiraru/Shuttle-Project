module.exports = {
  purge: [

    './resources/**/*.blade.php',

    './resources/**/*.js',

    './resources/**/*.vue',

  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fill: theme => ({

    'red': theme('colors.red.500'),

  }),
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

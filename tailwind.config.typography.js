//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles or configure certain variants.
// More info: https://tailwindcss.com/docs/typography-plugin.
//

const { fontSize } = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    // to prevent prose styles and inherit text styles declare the following empty
    typography: (theme) => ({
      DEFAULT: {
        css: {
          
        },
      },
    }),
  },

  plugins: [
    require('@tailwindcss/typography')({
      modifiers: [],
    }),
  ]
}

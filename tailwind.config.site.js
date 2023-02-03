//--------------------------------------------------------------------------
// Tailwind site configuration
//--------------------------------------------------------------------------
//
// Use this file to completely define the current sites design system by
// adding and extending to Tailwinds default utility classes.
//

const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

module.exports = {
	presets: [],
	theme: {
		screens: {
			'xs': '475px',
			...defaultTheme.screens,
		 },
		 
		colors: {
			black: 'rgb(var(--color-black) / <alpha-value>)',
			white: 'rgb(var(--color-white) / <alpha-value>)',
			
			darkblue: 'rgb(var(--color-darkblue) / <alpha-value>)',
			blue: 'rgb(var(--color-blue) / <alpha-value>)',
			yellow: 'rgb(var(--color-yellow) / <alpha-value>)',
			green: 'rgb(var(--color-green) / <alpha-value>)',
			light: 'rgb(var(--color-light) / <alpha-value>)',

			current: 'currentColor',
      	transparent: 'transparent',
			
			inherit: 'inherit',

			// get themed color by f.Ex. text-skin-base
			skin: {
				base: 'rgb(var(--color-base) / <alpha-value>)',
				inverted: 'rgb(var(--color-inverted) / <alpha-value>)',
				primary: 'rgb(var(--color-primary) / <alpha-value>)',
				accent: 'rgb(var(--color-accent) / <alpha-value>)',
			}
		},
		
		fontSize: {
			// only sizing and letter spacing because line-height differs between paragrahs and headings
			'xs': ['clamp(.75rem, 1vw, .875rem)', { letterSpacing: '1px' }], 			/* 12px */
			'sm': ['clamp(.875rem, 1vw, 1rem)', { letterSpacing: '1px' }], 			/* 14px */
			'base': ['clamp(1rem, 1vw, 1.2rem)', { letterSpacing: '1px' }], 			/* 16px */
			'lg': ['clamp(1.125rem, 1vw, 1.3rem)',  { letterSpacing: '1px' }], 		/* 18px */
			'xl': ['clamp(1.25rem, 1vw, 1.75rem)', { letterSpacing: '1px' }], 		/* 20px */
			'2xl': ['clamp(1.5rem, 1vw, 2rem)', { letterSpacing: '1px' }], 			/* 24px */
			'2-5xl': ['clamp(1.75rem, 1vw, 2.2rem)', { letterSpacing: '1px' }], 		/* 28px */
			'3xl': ['clamp(2rem, 1vw, 2.5rem)', { letterSpacing: '1.5px' }], 			/* 32px */
			'4xl': ['clamp(2.5rem, 1vw, 3rem)', { letterSpacing: '2px' }], 			/* 40px */
			'5xl': ['clamp(3rem, 1vw, 3.5rem)', { letterSpacing: '2px' }], 			/* 48px */
			'6xl': ['clamp(4rem, 1vw, 4.5rem)', { letterSpacing: '2px' }], 			/* 64px */
			'7xl': ['clamp(4.5rem, 1vw, 5rem)', { letterSpacing: '3px' }], 			/* 72px */
			'8xl': ['clamp(6rem, 1vw, 6.5rem)', { letterSpacing: '3px' }], 			/* 96px */
			'9xl': ['clamp(8rem, 1vw, 10rem)', { letterSpacing: '3px' }], 			/* 128px */
		},

		lineHeight: {
			s: '120%',
			m: '140%',
			l: '160%',
			100: '100%',
		},
		

		extend: {			
			height: {
				'header': 'calc(100vh + 15rem)',
			},

			transformOrigin: {
				'center-left': 'left center',
			},

			transitionProperty: {
				'right': 'right',
				'left': 'left',
				'top': 'top',
				'bottom': 'bottom',
			},

			gridTemplateColumns: {
				'content-l': '5rem, 2.5rem, 2.5rem, 1fr, 5rem',
				'content-s': '1rem, 1rem, 1rem, 1fr, 3rem',
				'pill-l': 'repeat(auto-fill, minmax(26rem,1fr))',
				'pill-m': 'repeat(auto-fill, minmax(20rem,1fr))',
				'pill-s': 'repeat(auto-fill, minmax(16rem,1fr))',
			},

			spacing: {
				'30': '7.5rem',
			},

			padding: {
				'in1': 'clamp(1rem, 15vw, 5rem)',
				'in2': 'clamp(1rem, 15vw, 7.5rem)',
				'in3': 'clamp(1rem, 15vw, 10rem)',
				// '30': '7.5rem',
			},
			
			// Set default transition durations and easing when using the transition utilities.
			transitionDuration: {
				DEFAULT: '300ms',
			},
			transitionTimingFunction: {
				DEFAULT: 'cubic-bezier(0.4, 0, 0.2, 1)',
			},
		},
		// Remove the font families you don't want to use.
		fontFamily: {
			sans: [
			'Plus Jakarta Sans',
			...defaultTheme.fontFamily.sans,
			],
		},
		// The font weights available for this site.
		fontWeight: {
			normal: 400,
			bold: 700,
			extrabold: 800,
		},
	},
	plugins: [
		plugin(function({ addBase, theme }) {
			addBase({
			// Default color transition on links unless user prefers reduced motion.
			'@media (prefers-reduced-motion: no-preference)': {
				'a': {
					transition: 'color .3s ease-in-out',
				},
			},
			'html': {
					color: theme('white'),
					fontFamily: theme('fontFamily.sans'),
			},
			})
		}),

		// Custom components for this particular site.
		plugin(function({ addComponents, theme }) {
			const components = {
			}
			addComponents(components)
		}),

		// Custom utilities for this particular site.
		plugin(function({ addUtilities, theme, variants }) {
			const newUtilities = {
			}
			addUtilities(newUtilities)
		}),
	]
}

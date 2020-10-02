const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },

    purge: {
        layers: [
            'utilities'
        ],

        content: [
            './vendor/laravel/jetstream/**/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ],

        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        }
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            spacing: {
                '72': '18rem',
                '84': '21rem',
                '96': '24rem',
                '108': '27rem'
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/typography'),
    ],
};

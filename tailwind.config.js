export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            keyframes: {
                'fade-up': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(60px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                'fade-scale': {
                    '0%': {
                        opacity: '0',
                        transform: 'scale(0.9)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'scale(1)'
                    },
                },
                shimmer: {
                    '0%': {
                        backgroundPosition: '-1000px 0'
                    },
                    '100%': {
                        backgroundPosition: '1000px 0'
                    },
                },
            },
            animation: {
                'fade-up': 'fade-up 1s ease-out forwards',
                'fade-scale': 'fade-scale 0.8s ease-out forwards',
                shimmer: 'shimmer 3s infinite linear',
            },
        },
    },
    plugins: [],
};

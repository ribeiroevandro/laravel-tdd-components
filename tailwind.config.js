import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#FFB727',
                secondary: '#000C2C',
            },
            backgroundImage: {
                pattern: 'url(/public/images/pattern-dark.svg)',
            },
            height: {
                'screen-layout': 'calc(100vh - 5rem)',
            },
            fontSize: {
                xxs: ['0.625rem', {
                    lineHeight: '0.75rem',
                    color: 'red'
                }],
                s: ['0.8125rem', {
                    lineHeight: '1rem',
                }],
                'heading': ['2rem', {
                    lineHeight: '2.5rem',
                    fontWeight: '500',
                }],
            },
            boxShadow: {
                md: '0 4px 8px 0 rgba(0, 0, 0, 0.08);',
                lg: '0 4px 16px rgba(0, 0, 0, 0.12)',
                nps: '0px 16px 32px 0px rgba(0, 0, 0, 0.16)',
                preset: '0 8px 24px 0 rgba(0, 0, 0, 0.16)'
            },
            spacing: {
                '4.5': '1.125rem',
                12.5: '3.125rem',
                18: '4.5rem',
                18.5: '4.625rem',
                22: '5.5rem',
                23: '5.75rem',
                30: '7.5rem',
                34.5: '8.625rem',
                35: '8.75rem',
                '38.5': '9.625rem',
                42: '10.5rem',
                67.5: '16.875rem',
                85: '21.458125rem',
                100: '25rem',
            },
            backgroundPosition: {
                'bottom-10': 'right 2.5rem bottom'
            },
            borderWidth: {
                1: '1px',
                5: '5px'
            },
            animation: {
                'loading-screen': 'loading-screen 2s ease-in-out infinite',
                'spin-slow': 'spin 2s linear infinite',
            },
            keyframes: {
                'loading-screen': {
                    '20%': {'background-position': '0%   0%, 50%  50%, 100%  50%'},
                    '40%': {'background-position': '0% 100%, 50%   0%, 100%  50%'},
                    '60%': {'background-position': '0%  50%, 50% 100%, 100%   0%'},
                    '80%': {'background-position': '0%  50%, 50%  50%, 100% 100%'},
                },
                placards: {
                    'from': {transform: 'translateX(0)'},
                    'to': {transform: 'translateX(-50%)'}
                }
            }
        },
    },
    plugins: [forms, typography],
};

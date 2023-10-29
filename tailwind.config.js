/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#4f46e5', 
        'heading': '#062f4e',
        'text' : '#183547'
      },
      fontFamily: {
        'nunito': ['Nunito', 'sans-serif']
      },
      backgroundColor: ['active'],
    },
  },
  plugins: [
    require('tailwindcss-hero-patterns'),
  ],
}


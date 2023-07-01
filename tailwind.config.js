/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // size
      height: {
        'dscreen' : '100dvh',
      },
      minHeight: {
        'dscreen' : '100dvh',
      },
    },
  },
  plugins: [],
}
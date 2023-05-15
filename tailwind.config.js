/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./public/js/**/*.js",
  ],
  theme: {
    extend: {
        fontFamily: {
            kanit: "'Kanit', sans-serif",
            notosans: "'Noto Sans', sans-serif",
        }
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

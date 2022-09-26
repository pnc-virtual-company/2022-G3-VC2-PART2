/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/index.html",
    "./src/**/*.{vue,js}",
  ],
  theme: {
    extend: {
      colors: {
        sky:'#2EA3F2',
        'sky-hover':'#1996EB',
      },
      backgroundImage: {
        'page-not-found': "url('assets/page_not_found.png')",
      }
    },
  },
  plugins: [
  ],
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**.{js,php}", // Include all JS and PHP files in the project root
    "./js/**.js", // Include all JS files in the 'js' folder
    "./php_tabs/**/**.{js,php}",
    "./admin/**/**.{js,php}", // Include all JS and PHP files in the 'php_tabs' folder
  ],
  darkMode: "class",
  theme: {
    extend: {},
  },
  plugins: [],
};

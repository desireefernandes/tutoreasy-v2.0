/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.tsx"],
  theme: {
    fontSize: {
      xs: 14,
      sm: 16,
      md: 18,
      lg: 20,
      xl: 24,
      "2xl": 32,
    },
    colors: {
      verde: "#69C5A4",
      azul: "#006D6D",
      amarelo: "#F3B431",
      vermelho: "#FF5656",

      transparent: "transparent",
      black: "#000",
      white: "#fff",

      gray: {
        900: "#121214",
        800: "#202024",
        400: "#7C7C8A",
        200: "#C4C4CC",
        100: "#E1E1E6",
      },

      cyan: {
        500: "#81D8F7",
        300: "#9BE1FB",
      },
    },
    extend: {
      fontFamily: {
        sans: "Inter, sans-serif",
      },
    },
  },
  plugins: [],
};
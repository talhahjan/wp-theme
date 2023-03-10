const withOpacity = (variableName) => {
  return ({ opacityValue }) => {
    if (opacityValue == undefined) {
      return `rgb(var(${variableName}))`;
    }
    return `rgba(var(${variableName}), ${opacityValue})`;
  };
};

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,js,php}",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  darkMode: "class", // or media & false
  theme: {
    extend: {
      borderColor: {
        primary: withOpacity("--fill-primary"),
      },

      boxShadowColor: {
        primary: withOpacity("--fill-primary"),
      },

      textColor: {
        "color-base": "var(--color-text-base)",
        "color-base-alt": "var(--color-text-base-alt)",
        primary: "var(--color-text-primary)",
        muted: "var(--color-text-muted)",
        inverted: "var(--color-text-inverted)",
      },

      backgroundColor: {
        "body-dark": withOpacity("--body-bg-dark"),
        primary: withOpacity("--fill-primary"),
        "primary-alt": withOpacity("--fill-primary-alt"),
        body: withOpacity("--body-bg"),
      },

      gradientColorStops: {
        primary: "rgb(var(--fill-primary))",
        "primary-alt": "rgb(var(--fill-primary-alt))",
      },
      ringColor: {
        primary: withOpacity("--fill-primary"),
      },
      animation: {
        spin2: "spin 4s linear infinite;",
      },

      fontFamily: {
        Courgette: ["Courgette, cursive"],
        Poppins: ["'Poppins', sans-serif"],
      },
    },
  },
  plugins: [
    require("tw-elements/dist/plugin"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/typography"),
    // require("@tailwindcss/line-clamp"),
    // require("@tailwindcss/forms")({
    //   strategy: "base", // only generate global styles
    // }),
  ],
};

module.exports = {
  mode: 'jit',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.{js,ts,vue}',
  ],
  theme: {
    extend: {
      // fontFamily: {
      //   sans: ['Inter', ...fontFamily.sans],
      // },
    },
  },
  plugins: [],
}

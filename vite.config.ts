import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
import dynamicImport from 'vite-plugin-dynamic-import';
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
// import Components from 'unplugin-vue-components/vite'
// import Unocss from 'unocss/vite'
// import {
//   presetAttributify,
//   presetIcons,
//   presetUno,
//   transformerDirectives,
//   transformerVariantGroup,
// } from 'unocss'

// const pathSrc = path.resolve(__dirname, 'resources')

export default defineConfig({
  // resolve: {
  // 	alias: {
  // 	  '~/': `${pathSrc}/scripts`,
  // 	},
  //   },
  plugins: [
    inertia(),
    vue(),
    laravel({
      postcss: [
        tailwindcss(),
        autoprefixer(),
      ],
    }),
    dynamicImport(),
  ]
})

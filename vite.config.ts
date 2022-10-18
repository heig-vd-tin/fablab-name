import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
import dynamicImport from 'vite-plugin-dynamic-import';
import vue from '@vitejs/plugin-vue'
import { fileURLToPath, URL } from "url";
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


export default defineConfig({
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./resources", import.meta.url)),
    },
  },
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

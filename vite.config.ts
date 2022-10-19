import { defineConfig } from 'vite'
import { fileURLToPath, URL } from "url";
import { splitVendorChunkPlugin } from 'vite'
import { visualizer } from "rollup-plugin-visualizer";
import autoprefixer from 'autoprefixer'
import Components from 'unplugin-vue-components/vite'
import cssInjectedByJsPlugin from 'vite-plugin-css-injected-by-js'
import dynamicImport from 'vite-plugin-dynamic-import';
import inertia from './resources/scripts/vite/inertia-layout'
import laravel from 'vite-plugin-laravel'
import tailwindcss from 'tailwindcss'
import vue from '@vitejs/plugin-vue'

let _path = fileURLToPath(new URL("./resources", import.meta.url));

export default defineConfig({
  resolve: {
    alias: {
      "@": _path,
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
    cssInjectedByJsPlugin(),
    splitVendorChunkPlugin(),
    visualizer(),
    Components({ dts: true, dirs: [_path + "/views"], }),
  ]
})

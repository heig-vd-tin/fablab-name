import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'vite-plugin-laravel/inertia'
import 'tailwindcss/tailwind.css'

import 'vite/modulepreload-polyfill'

function withVite(pages: Record<string, any>, name: string) {
  for (const path in pages) {
    if (path.endsWith(`${name.replace('.', '/')}.vue`)) {
      return typeof pages[path] === 'function'
        ? pages[path]()
        : pages[path]
    }
  }

  throw new Error('Page not found: ' + name)
}

console.log(import.meta.glob('../views/pages/*.vue'));
function resolving(name) {
  let u = withVite(import.meta.glob('../views/pages/*.vue'), name);
  console.log(`WTF ${name}`, u);
  return u;
}

createInertiaApp({
  resolve: name => resolving(name), // withVite(import.meta.glob('../views/pages/*.vue'), name),
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .mount(el)
  },
})

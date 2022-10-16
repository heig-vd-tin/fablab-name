import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'vite-plugin-laravel/inertia'
// import 'tailwindcss/tailwind.css'
import 'vite/modulepreload-polyfill'
import 'tw-elements';
import VueCountdown from '@chenfengyuan/vue-countdown'

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

createInertiaApp({
  resolve: name => withVite(import.meta.glob('../views/pages/*.vue'), name),
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .component(VueCountdown.name, VueCountdown)
      .mount(el)
  },
})

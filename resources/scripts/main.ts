import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'vite-plugin-laravel/inertia'
import 'vite/modulepreload-polyfill'
import 'tw-elements';
import VueCountdown from '@chenfengyuan/vue-countdown'

createInertiaApp({
  resolve: name => resolvePageComponent(name, import.meta.glob('@/views/pages/**/*.vue'), name),
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .component(VueCountdown.name, VueCountdown)
      .mount(el)
  },
})

InertiaProgress.init({
  delay: 100,
  color: '#DA291C',
  includeCSS: true,
  showSpinner: true,
})

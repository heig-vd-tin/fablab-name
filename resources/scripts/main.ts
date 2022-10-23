import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'vite-plugin-laravel/inertia'
import VueCountdown from '@chenfengyuan/vue-countdown'
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import { Vue } from 'vue';

window.Pusher = Pusher;
const echo = new Echo({
  broadcaster: 'pusher',
  key: import.meta.env.VITE_PUSHER_APP_KEY,
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
  wsHost: window.location.hostname,
  wsPort: import.meta.env.VITE_PUSHER_PORT,
  forceTLS: false,
  disableStats: true,
});

createInertiaApp({
  resolve: name => resolvePageComponent(name, import.meta.glob('@/views/pages/**/*.vue'), name),
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .component(VueCountdown.name, VueCountdown)
      .provide('echo', echo)
      .mount(el)
  },
})

InertiaProgress.init({
  delay: 100,
  color: '#DA291C',
  includeCSS: true,
  showSpinner: true,
})

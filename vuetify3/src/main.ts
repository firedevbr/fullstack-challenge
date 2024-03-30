import { createApp } from 'vue';
import { vMaska } from 'maska';
import App from './App.vue';
import router from './router';
import { loadFonts } from '@/plugins/webfontloader';
import { vuetify } from '@/plugins/vuetify';
import '@/assets/global-styles.scss';
import '@fortawesome/fontawesome-free/css/all.css';
import { setupCalendar } from 'v-calendar';
import pinia from '@/store';

loadFonts();

createApp(App)
  .use(pinia)
  .use(setupCalendar, {})
  .use(router)
  .use(vuetify)
  .directive('maska', vMaska)
  .mount('#app');

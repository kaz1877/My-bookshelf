import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import App from './vue/App.vue';
import router from './vue/router';
import store from './vue/store/';

const app = createApp(App);
app.use(router).use(store);
app.mount('#app');

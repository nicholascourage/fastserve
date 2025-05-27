import '../css/app.css'
import Antd from 'ant-design-vue';
import { createApp } from 'vue'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import 'ant-design-vue/dist/reset.css';


import App from './App.vue'

library.add(fas);

const app = createApp(App)

app.use(router)

app.component('font-awesome-icon', FontAwesomeIcon)

app.use(Antd).mount('#app');

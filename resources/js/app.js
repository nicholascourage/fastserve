import '../css/app.css'
import naive from 'naive-ui'

import { createApp } from 'vue'

import router from './router'

import App from './App.vue'

const app = createApp(App)
const meta = document.createElement('meta')
meta.name = 'naive-ui-style'
app.use(router)

app.mount('#app')

app.use(naive)

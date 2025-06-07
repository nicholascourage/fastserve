import '../css/app.css'

import naive from 'naive-ui'

import { createApp } from 'vue'

import createDemoRouter from './routes/router'

import AppRoot from './AppRoot.vue'

import { routes } from './routes/routes.js'

const app = createApp(AppRoot)

const router = createDemoRouter(app, routes)

const meta = document.createElement('meta')

meta.name = 'naive-ui-style'

app.use(router)

app.use(naive)

router.isReady().then(() => {
  app.mount('#app')
})

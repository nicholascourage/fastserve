export const routes = [
  {
    name: 'dashboard',
    path: '/',
    component: ()=> import('../pages/DashboardPage.vue'),
    meta: { title: 'Dashboard' }
  },
  {
    name: 'tasks',
    path: '/tasks',
    component: ()=> import('../pages/tasks/TasksPage.vue'),
    meta: { title: 'Tasks' },
    children: {
      path: '/create',
      component: ()=> import('../pages/tasks/CreateTaskPage.vue'),
      meta: { title: 'Add Task' },
    }
  },
  {
    name: 'home',
    path: '/:lang/:theme',
    component: () => import('../pages/home/index.vue')
  },
  {
    name: 'not-found',
    path: '/:pathMatch(.*)*',
    redirect: {
      name: 'home',
      params: {
        lang: navigator.language === 'zh-CN' ? 'zh-CN' : 'en-US',
        theme: 'os-theme'
      }
    }
  }
]

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
  }
]

import { createRouter, createWebHistory } from 'vue-router'
import DashboardPage from '../pages/DashboardPage.vue'
import TasksPage from '../pages/tasks/TasksPage.vue'
import CreateTaskPage from '../pages/menus/index.vue'

const routes = [
  { path: '/', name: 'dashboard', component: DashboardPage, meta: { title: 'Dashboard' } },
  { path: '/tasks', component: TasksPage, meta: { title: 'Tasks' } },
  {
    path: '/tasks/create',
    component: CreateTaskPage,
    meta: { title: 'Add Task' },
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

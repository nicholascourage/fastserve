import { createRouter, createWebHistory } from 'vue-router'
import DashboardPage from '../Pages/DashboardPage.vue'
import TasksPage from '../Pages/TasksPage.vue'
import CreateTaskPage from '../Pages/CreateTaskPage.vue'

const routes = [
  { path: '/', component: DashboardPage, meta: { title: 'Dashboard' } },
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

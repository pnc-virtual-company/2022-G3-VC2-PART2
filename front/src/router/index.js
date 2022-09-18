import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
import LoginView from '../views/LoginView.vue'

const routes = [
  {
    path: '/profile',
    name: 'profile',
    component: ProfileAlumniView
  },
  {
    path: '/manage',
    name: 'manage',
    component: AdminManagementView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

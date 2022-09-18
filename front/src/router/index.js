import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import LoginView from '../views/LoginView.vue'

const routes = [
  {
    path: '/',
    name: 'profile',
    component: ProfileAlumniView
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

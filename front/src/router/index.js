import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'

const routes = [
  {
    path: '/profile',
    name: 'profile',
    component: ProfileAlumniView
  },

  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

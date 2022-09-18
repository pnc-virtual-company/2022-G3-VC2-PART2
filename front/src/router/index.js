import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
const routes = [
  {
    path: '/profile',
    name: 'profile',
    component: ProfileAlumniView
  },
  {
    path: '/admin-management',
    name: 'admin-management',
    component: AdminManagementView
  }
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
import LoginView from '../views/LoginView.vue'
import AlumniRegister from '../views/alumni/AlumniRegister';
import EroRegister from '../views/ero/EroRegister';

const routes = [
  {
    path:"/",
    redirect:"/login"
  },
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
  {
    path: '/alumni/registration',
    name: '/alumni/registration',
    component: AlumniRegister
  },
  {
    path: '/ero/registration',
    name: '/ero/registration',
    component: EroRegister
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

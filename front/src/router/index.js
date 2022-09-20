import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
import LoginView from '../views/LoginView.vue'
import AlumniRegister from '../views/alumni/AlumniRegister';
import EroRegister from '../views/ero/EroRegister';
import SignupView from '../views/SignupView.vue'

const routes = [
  {
    path: '/profile',
    component: ProfileAlumniView
  },
  {
    path: '/manage',
    component: AdminManagementView
  },
  {
    path: '/login',
    component: LoginView
  },
  {
    path: '/alumni/register',
    component: AlumniRegister
  },
  {
    path: '/ero/register',
    component: EroRegister
  },
  {
    path: '/signup',
    component: SignupView
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
import ExploreManagementView from '../views/admin/ExploreManagementView'
import LoginView from '../views/LoginView.vue'
import AlumniRegister from '../views/alumni/AlumniRegister';
import EroRegister from '../views/ero/EroRegister';
import SignupView from '../views/SignupView.vue'
import ForgotPassword from '../views/FogotPasswordView.vue'
import VerifyCode from '../views/VerifyCodeView.vue'

const routes = [
  {
    path:"/",
    redirect:"/login"
  },
  {
    path: '/profile',
    component: ProfileAlumniView
  },
  {
    path: '/manage',
    component: AdminManagementView
  },
  {
    path: '/explore',
    name: 'explore',
    component: ExploreManagementView
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
  
  {
    path: '/forgot_password',
    component: ForgotPassword
  },
  {
    path: '/verify_code',
    component: VerifyCode
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

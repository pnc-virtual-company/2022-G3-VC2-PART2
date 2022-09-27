import { createRouter, createWebHistory } from 'vue-router'
import ProfileAlumniView from '../views/alumni/ProfileView'
import AdminManagementView from '../views/admin/AdminManagementView'
import ExploreManagementView from '../views/ExploreManagementView'
import EroProfileView from '../views/ero/EroProfileView.vue'
import LoginView from '../views/LoginView.vue'
import AlumniRegister from '../views/alumni/AlumniRegister';
import EroRegister from '../views/ero/EroRegister';
import SignupView from '../views/SignupView.vue'
import ForgotPassword from '../views/FogotPasswordView.vue'
import VerifyCode from '../views/VerifyCodeView.vue'
import RequestsView from '../views/ero/RequestsView'
import PageNotFound from '../views/PageNotFound';

function getCookie(name) {
  var cname = name + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var splitDataToJsonFormat = decodedCookie.split(';');
  for(var i = 0; i < splitDataToJsonFormat.length; i++){
      var cookie = splitDataToJsonFormat[i];
      while(cookie.charAt(0) == ' '){
        cookie = cookie.substring(1);
      }
      if(cookie.indexOf(cname) == 0){
          return cookie.substring(cname.length, cookie.length);
      }
  }
  return "";
}
const token = getCookie('user_token')
const role = getCookie('user_role')
const routes = [
  {
    path:"/",
    redirect:"/login"
  },
  {
    path: '/profile',
    name: 'profile',
    component: ProfileAlumniView,
    meta:{
      requireAuth: true,
      role: 'alumni',
    }
    
  },
  {
    path: '/manage',
    name: 'manage',
    component: AdminManagementView,
    meta:{
      requireAuth: true,
    },
  },
  {
    path: '/explore',
    name: 'explore',
    component: ExploreManagementView,
    meta:{
      requireAuth: true,
    }
  },
  {
    path: '/ero_profile',
    name: 'ero_profile',
    component: EroProfileView,
    meta:{
      requireAuth: true,
      role: 'ero'
    },
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
    meta:{
      requireAuth: false,
    }
  },
  {
    path: '/alumni_register',
    name: 'alumni_register',
    component: AlumniRegister,
    meta:{
      requireAuth: true,
      role: 'alumni',
    }
  },
  {
    path: '/ero_register',
    name: 'ero_register',
    component: EroRegister,
    meta:{
      requireAuth: true,
      role: 'ero',
    },
  },
  {
    path: '/signup',
    name: 'signup',
    component: SignupView,
    meta:{
      requireAuth: false,
    },
  },
  {
    path: '/forgot_password',
    name: 'forgot_password',
    component: ForgotPassword,
    meta:{
      requireAuth: false,
    }
  },
  {
    path: '/verify_code',
    name: 'verify_code',
    component: VerifyCode,
    meta:{
      requireAuth: false,
    }
  },
  {
    path: '/requests',
    name: 'requests',
    component: RequestsView,
    meta:{
      requireAuth: true,
      role: 'ero',
    },
  },
  {
    path: '/404',
    name: '404',
    component: PageNotFound,
    meta:{
      requireAuth: false,
    },
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
router.beforeEach((to, from, next) => {
  if (to.meta.requireAuth) {
    if(token) {
      if (to.meta.role) {
        if (to.meta.role == role) {
          next();
        } else {
          next('/404');
        }
      } else {
        if (to.path == '/manage') {
          if (role == "admin" || role == "ero") {
            next();
          } else {
            next('/404');
          }
        } else {
          next();
        }
      }
    } else {
      next('/login')
    }
  } else {
    if(token) {
      if (to.path == "/404") {
        next(from.path);
      } else {
        if (role == 'admin') {
          next('/manage');
        } else if (role == 'ero') {
          next('/ero_profile');
        } else if (role == 'alumni') {
          next('/profile');
        }
      }
    } else {
      if(to.path == "/signup" || to.path == "/login" || to.path == "/forgot_password" || to.path == "/verify_code" && from.path == "/forgot_password") {
        next();
      } else {
        next('/login');
      }
    }
  }
});


export default router;
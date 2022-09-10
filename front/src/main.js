import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'


// alumni 
import ProfileAlumni from '@/components/alumni/profile/MyProfile';
import AlumniProfileContainer from '@/components/alumni/profile/ProfileContainer.vue';
import CardProfile from '@/components/alumni/profile/CardComponent.vue';
import IconAction from '@/components/alumni/profile/IconsAction';
import GeneralInfor from '@/components/alumni/profile/GeneralInfor';
const app = createApp(App);


// alumni Profile
app.component('general-infor', GeneralInfor);
app.component('icon-action', IconAction);
app.component('profile-alumni',ProfileAlumni)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('card-profile',CardProfile)






app.use(router).mount('#app')

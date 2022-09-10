import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'

// alumni 
import ProfileAlumni from '@/components/alumni/profile/MyProfile';
import AlumniProfileContainer from '@/components/alumni/profile/ProfileContainer.vue';
import CardProfile from '@/components/publicComponents/CardComponents/CardComponent.vue';
import IconAction from '@/components/publicComponents/iconsComponents/IconsAction';
import GeneralInfor from '@/components/alumni/profile/GeneralInfor';
import WorkExperience from '@/components/alumni/profile//workExperience/WorkExperience.vue';
const app = createApp(App);
// alumni Profile
app.component('work-experience', WorkExperience);
app.component('general-infor', GeneralInfor);
app.component('icon-action', IconAction);
app.component('profile-alumni',ProfileAlumni)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('card-profile',CardProfile)

app.use(router).mount('#app')

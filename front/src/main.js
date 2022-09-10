import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'

// alumni 
import ProfileAlumni from '@/components/alumni/profile/my_profile/MyProfile';
import AlumniProfileContainer from '@/components/alumni/profile/ProfileContainer.vue';
import CardComponent from '@/components/public_components/card_components/CardComponent.vue';
import IconAction from '@/components/public_components/icons_components/IconsAction';
import GeneralInfor from '@/components/alumni/profile/general_informations/GeneralInfor';
import GeneralInforContainer from '@/components/alumni/profile/general_informations/GeneralInforContainer';
import WorkExperience from '@/components/alumni/profile/workExperience/WorkExperience.vue';
import WorkExperienceContainer from '@/components/alumni/profile/workExperience/WorkExperienceContainer.vue';
import CardInformations from '@/components/public_components/card_components/CardInformations.vue';
const app = createApp(App);
// alumni Profile
app.component('icon-action', IconAction);
app.component('profile-alumni',ProfileAlumni)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('card-components',CardComponent)
app.component('general-infor', GeneralInfor);
app.component('general-infor-container', GeneralInforContainer);
app.component('work-experience', WorkExperience);
app.component('work-experience-container', WorkExperienceContainer);
app.component('card-informations', CardInformations)





app.use(router).mount('#app')

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'
const app = createApp(App);

//public component
import IconAction from '@/components/public_components/icons_components/IconsAction';
import CardComponent from '@/components/public_components/card_components/CardComponent.vue';
import PopupComponent from '@/components/public_components/widgets_components/PopupComponent';
import ButtonComponent from '@/components/public_components/button_components/ButtonComponent'

// alumni 
import MyProfileContainer from '@/components/alumni/profile/my_profile/MyProfileContainer'
import ProfileAlumni from '@/components/alumni/profile/my_profile/MyProfile';
import AlumniProfileContainer from '@/components/alumni/profile/ProfileContainer.vue';
import GeneralInfor from '@/components/alumni/profile/general_informations/GeneralInfor';
import GeneralInforContainer from '@/components/alumni/profile/general_informations/GeneralInforContainer';
import WorkExperience from '@/components/alumni/profile/work_experience/WorkExperience'
import WorkExperienceContainer from '@/components/alumni/profile/work_experience/WorkExperienceContainer'
import CardInformations from '@/components/public_components/card_components/CardInformations'

    // alumni popup components
import MyProfilePopup from '@/components/alumni/profile/my_profile/MyProfilePopup'
import GeneralInforPopup from '@/components/alumni/profile/general_informations/GeneralInforPopup'

//public component
app.component('popup-component', PopupComponent);
app.component('icon-action', IconAction);
app.component('card-components',CardComponent);
app.component('button-components', ButtonComponent);
// alumni Profile
app.component('profile-alumni',ProfileAlumni)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('general-infor', GeneralInfor);
app.component('general-infor-container', GeneralInforContainer);
app.component('work-experience', WorkExperience);
app.component('work-experience-container', WorkExperienceContainer);
app.component('card-informations', CardInformations)
app.component("my-profile-container", MyProfileContainer);

    // alumni popup components register
app.component('my-profile-popup', MyProfilePopup);
app.component('general-infor-popup', GeneralInforPopup);

app.use(router).mount('#app')

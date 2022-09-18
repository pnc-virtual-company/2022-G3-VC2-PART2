import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'
const app = createApp(App).use(createPinia());

// nav bar
import NavBar from '@/components/nav_bar/NavBar';

//public component
import IconAction from '@/components/icons_components/IconsAction';
import CardComponent from '@/components/card_components/CardComponent.vue';
import PopupComponent from '@/components/popup_components/PopupComponent';
import ButtonComponent from '@/components/button_components/ButtonComponent'
import ProfileImagesComponent from '@/components/profile_images/ProfileImagesComponent'
import GeneralInformationComponent from '@/components/general_information/GeneralInformationComponent';
import AlertMissing from '@/components/alert_component/AlertMissing.vue';
// alumni 
import GeneralInformationContainer from './views/alumni/general_information/GeneralInformationContainer'
import GeneralInformation from './views/alumni/general_information/GeneralInformation';
import AlumniProfileContainer from './views/alumni/ProfileView.vue';
import WorkExperience from './views/alumni/work_experience/WorkExperience'
import WorkExperienceContainer from './views/alumni/work_experience/WorkExperienceContainer'
import CardInformations from '@/components/card_components/CardInformations'

// reset password
import ResetPassword from './views/alumni/reset_password/ResetPassword.vue';

// alumni popup components
import GeneralInformationPopup from './views/alumni/general_information/GeneralInformationPopup'
import WorkExperiencePopup from './views/alumni/work_experience/WorkExperiencePopup'

// icon informations
import TheEmail from '@/components/general_information/icon_informations/TheEmail';
import TheBatch from '@/components/general_information/icon_informations/TheBatch';
import TheBirthDate from '@/components/general_information/icon_informations/TheBirthDate';
import TheAddress from '@/components/general_information/icon_informations/TheAddress';
import TheGender from '@/components/general_information/icon_informations/TheGender';
import TheMajor from '@/components/general_information/icon_informations/TheMajor';
import ThePhone from '@/components/general_information/icon_informations/ThePhone';
import TheTelegram from '@/components/general_information/icon_informations/TheTelegram';
import { createPinia } from 'pinia'

// nav bar
app.component('nav-bar', NavBar);

//public component
app.component('popup-component', PopupComponent);
app.component('icon-action', IconAction);
app.component('card-components',CardComponent);
app.component('button-components', ButtonComponent);
app.component('profile-images-component',ProfileImagesComponent)
app.component('general-information-component',GeneralInformationComponent)
app.component('alert_missing',AlertMissing)
// alumni Profile
app.component('general-information',GeneralInformation)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('work-experience', WorkExperience);
app.component('work-experience-container', WorkExperienceContainer);
app.component('card-informations', CardInformations)
app.component("general-information-container", GeneralInformationContainer);
app.component("reset-password", ResetPassword);


// alumni popup components register
app.component('general-information-popup', GeneralInformationPopup);
app.component('work-experience-popup', WorkExperiencePopup);


// icon informations
app.component('the-email', TheEmail);
app.component('the-batch', TheBatch);
app.component('the-phone', ThePhone);
app.component('the-telegram', TheTelegram);
app.component('the-address', TheAddress);
app.component('the-birthdate', TheBirthDate);
app.component('the-gender', TheGender);
app.component('the-major', TheMajor);

app.use(router).mount('#app')

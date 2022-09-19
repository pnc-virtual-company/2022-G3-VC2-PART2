import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'
const app = createApp(App).use(createPinia());

// nav bar
import NavBar from '@/components/nav_bar/NavBar';

//public component
import InputSearch from '@/components/input_components/InputSearch';
import IconAction from '@/components/icons_components/IconsAction';
import CardComponent from '@/components/card_components/CardComponent.vue';
import PopupComponent from '@/components/popup_components/PopupComponent';
import ButtonComponent from '@/components/button_components/ButtonComponent'
import ButtonLoading from '@/components/button_components/ButtonLoading'
import ButtonEye from '@/components/button_components/ButtonEye'
import ButtonEyeSlash from '@/components/button_components/ButtonEyeSlash'
import ProfileImagesComponent from '@/components/profile_images/ProfileImagesComponent'
import GeneralInformationComponent from '@/components/general_information/GeneralInformationComponent';
import AlertMissing from '@/components/alert_component/AlertMissing.vue';
import CardList from '@/components/card_components/CardList';
import CardListERO from '@/components/card_components/CardListERO';
import CardCompany from '@/components/card_components/CardCompany';
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
import AlumniInvitePopup from './views/admin/alumni_controll/AlumniInvitePopup'
import EROInvitePopup from './views/admin/ERO_controll/EROInvitePopup'

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
// admin 
import AdminManagementView from '@/views/admin/AdminManagementView'
import ListAlumniView from '@/views/admin/alumni_controll/ListAlumniView'
import AlumniController from '@/views/admin/alumni_controll/AlumniController'
import MenuView from '@/views/admin/menu_component/MenuView'
import ListEROView from '@/views/admin/ERO_controll/ListEROView'
import EROController from '@/views/admin/ERO_controll/EROController'
import CompanyController from '@/views/admin/company_controll/CompanyController'
import ListCompanyView from '@/views/admin/company_controll/ListCompanyView'
// nav bar
app.component('nav-bar', NavBar);

//public component
app.component('card-list', CardList)
app.component('card-list-ERO', CardListERO)
app.component('card-company', CardCompany)
app.component('input-search', InputSearch);
app.component('popup-component', PopupComponent);
app.component('icon-action', IconAction);
app.component('card-components',CardComponent);
app.component('button-components', ButtonComponent);
app.component('button-loading', ButtonLoading);
app.component('button-eye', ButtonEye);
app.component('button-eye-slash', ButtonEyeSlash);
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
app.component('alumni-invite-popup', AlumniInvitePopup);
app.component('ERO-invite-popup', EROInvitePopup);

// icon informations
app.component('the-email', TheEmail);
app.component('the-batch', TheBatch);
app.component('the-phone', ThePhone);
app.component('the-telegram', TheTelegram);
app.component('the-address', TheAddress);
app.component('the-birthdate', TheBirthDate);
app.component('the-gender', TheGender);
app.component('the-major', TheMajor);

// admin
app.component('list-alumni', ListAlumniView);
app.component('list-ERO', ListEROView);
app.component('menu-view', MenuView);
app.component('list-company-view', ListCompanyView);
app.component('admin-management-view', AdminManagementView);
app.component('list-alumni-view', ListAlumniView);
app.component('alumni-controller', AlumniController);
app.component('ERO-controller', EROController);
app.component('company-controller', CompanyController);
app.use(router).mount('#app')

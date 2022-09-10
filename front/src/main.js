import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import'./style.css'
const app = createApp(App);


// alumni 
import ProfileAlumni from '@/components/alumni/profile/my_profile/MyProfile';
import AlumniProfileContainer from '@/components/alumni/profile/ProfileContainer.vue';
import CardComponent from '@/components/publicComponents/CardComponents/CardComponent.vue';
import IconAction from '@/components/publicComponents/iconsComponents/IconsAction';
import PopupForm from '@/components/publicComponents/widgetsComponents/PopupForm';

// alumni Profile
app.component('popup-form', PopupForm);
app.component('icon-action', IconAction);
app.component('profile-alumni',ProfileAlumni)
app.component('alumniProfile-container',AlumniProfileContainer)
app.component('card-component',CardComponent)






app.use(router).mount('#app')

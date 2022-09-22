
<template>
    <div>
        <card-components class="p-[0rem]" v-if="alumniData.userData !=null">
            <div>
                <div class="pb-4">
                    <profile-images-component @click-profile="showEditProfile = !showEditProfile" @click-cover="showEditCover = !showEditCover" class=""></profile-images-component>
                </div>
                <hr class="w-[95%] m-auto border-gray-300">
                <general-information-component class="w-full m-auto p-[20px]" @click-popup="$emit('click-popup')">   
                    <template #slot1>
                        <p class="text-[20px] text-sky font-bold italic m-0 w-[50%]">Current work: {{currenWork.position}}</p>
                    </template>
                    <template #slot2>
                        <p class="text-[20px] text-sky font-bold italic m-0 w-[50%]" >Company: {{currenWork.company.name}} </p>
                    </template>
                    <template #slot-full>
                        <the-email>{{alumniData.userData.email}}</the-email>
                    </template>
                    <template #slot4>
                        <the-batch>{{alumniData.userData.alumni.batch}}</the-batch>
                    </template>
                    <template #slot5>
                        <the-phone>{{alumniData.userData.alumni.phone}}</the-phone>
                    </template>
                    <template #slot6>
                        <the-major>{{alumniData.userData.alumni.major.toUpperCase()}} - {{alumniData.userData.alumni.batch}}</the-major>
                    </template>
                    <template #slot7>
                        <the-telegram>{{alumniData.userData.alumni.telegram}}</the-telegram>
                    </template>
                    <template #slot8>
                        <the-address>{{alumniData.userData.alumni.address}}</the-address>
                    </template>
                    <template #slot9>
                        <the-gender>{{alumniData.userData.alumni.gender}}</the-gender>
                    </template>
                    <template #slot10>
                        <the-birthdate>{{alumniData.getFullDate(alumniData.userData.alumni.birth_date)}}</the-birthdate>
                    </template>
                </general-information-component>
            </div>
            <alumni-skill-container class="p-[20px] pt-0"></alumni-skill-container>
        </card-components>
        <preview-profile v-if="showEditProfile" @click-popup="showEditProfile = !showEditProfile" ></preview-profile>
        <preview-cover v-if="showEditCover" @click-popup="showEditCover = !showEditCover"></preview-cover>
    </div>
</template>

<script>
    import {userInformations} from "../../../store/userStore"
import AlumniSkillContainer from '../aulmi_skill/AlumniSkillContainer.vue';
    export default {
  components: { AlumniSkillContainer },
        setup(){
            const alumniData = userInformations();
            return {
                alumniData,
            }
        },
        data(){
            return{
                showEditProfile: false,
                showEditCover: false
            }
        },
        computed: {
            currenWork(){
                let currenWork = this.alumniData.userData.work_experience.filter(company => company.is_working == true)[0];
                return currenWork;
            }
        }
    }
  </script>
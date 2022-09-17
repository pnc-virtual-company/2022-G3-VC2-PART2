
<template>
    <card-components class="p-[0rem]" v-if="alumniData.userData !=null">
        <div class="">
            <div class="border-b-[1px] border-b-gray-300 pb-4">
                <profile-images-component @click-profile="showEditProfile = !showEditProfile" @click-cover="showEditCover = !showEditCover" class=""></profile-images-component>
            </div>
            <general-information-component class=" w-full" @click-popup="$emit('click-popup')">
                <template #slot1>
                    <the-email>{{alumniData.userData.email}}</the-email>
                </template>
                <template #slot2>
                    <the-batch>{{alumniData.userData.alumni.batch}}</the-batch>
                </template>
                <template #slot3>
                    <the-phone>{{alumniData.userData.alumni.phone}}</the-phone>
                </template>
                <template #slot4>
                    <the-telegram>{{alumniData.userData.alumni.telegram}}</the-telegram>
                </template>
                <template #slot5>
                    <the-major>{{alumniData.userData.alumni.major}}</the-major>
                </template>
                <template #slot6>
                    <the-address>{{alumniData.userData.alumni.address}}</the-address>
                </template>
                <template #slot7>
                    <the-gender>{{alumniData.userData.alumni.gender}}</the-gender>
                </template>
                <template #slot8>
                    <the-birthdate>{{alumniData.userData.alumni.birth_date}}</the-birthdate>
                </template>
            </general-information-component>
        </div>
        
        <alumni-skill class="p-[20px]"></alumni-skill>
    </card-components>
    <preview-profile v-if="showEditProfile" @click-popup="showEditProfile = !showEditProfile" ></preview-profile>
    <preview-cover v-if="showEditCover" @click-popup="showEditCover = !showEditCover"></preview-cover>
</template>
<script>
    import {userInformations} from "../../../store/userStore"
import AlumniSkill from '../aulmi_skill/AlumniSkill.vue';
    export default {
  components: { AlumniSkill },
      setup(){
          const alumniData = userInformations();
          return {
              alumniData
          }
      },
      data(){
        return{
            showEditProfile: false,
            showEditCover: false
        }
      }
    }
  </script>
<template>
    <div class=" mt-[20px]">
        <preview-profile v-if="userInfor.showEditProfile"></preview-profile>
        <preview-cover v-if="userInfor.showEditCover"></preview-cover>
        <general-information @click-popup="isShow = !isShow"> </general-information>
        <general-information-popup 
        v-if="isShow" 
        @click-popup="isShow = !isShow" 
        @update-data="updateGeneralInfor">
        </general-information-popup>
    </div>
</template>

<script>
    import {userInformations} from "../../../store/userStore"
    export default {
      setup(){
          const userInfor = userInformations();
          return {
              userInfor
          }
      },
        data(){
            return {
                isShow: false,
                showEditProfile: false,
                showEditCover: false,
            }
        },
        methods: {
            updateGeneralInfor(data){
                this.userInfor.updateAlumniGerneralInfor(data);
            }
        },

        computed:{

        },
        mounted(){
            
        }
    }
</script>
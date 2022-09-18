<template>
    <div class=" mt-[20px]">
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
            }
        },
        methods: {
            updateGeneralInfor(data){
                this.userInfor.updateAlumniGerneralInfor(data);
            }
        },

        computed:{

        }
    }
</script>

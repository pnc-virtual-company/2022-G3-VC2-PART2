<template>
  <div class="bg-light-blue">
    <!-- <div class="mb-[20px]"> -->
      <router-view/>
    <!-- </div> -->
  </div>
</template>

<script>
  import {userInformations} from "@/store/userStore"
  export default {
    setup(){
        const userData = userInformations();
        return {
            userData
        }
    },

    beforeCreate(){
      this.userData.getUserData();
      this.userData.getCompanyList();
      this.userData.getEmails();
      this.userData.getSchoolList();
    }
  }
</script>

<style >
body{
  background: #abd8ff;
}
</style>
  

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
    }
  }
</script>

<template>
  <div class="mb-[20px]">
    <router-view/>
  </div>
</template>

<style >
body{
  background: #E5F2FB;
}


</style>

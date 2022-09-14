<template>
  <div>
    <div class="mb-[20px]">
      <router-view/>
    </div>
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
    }
  }
</script>

<style >
body{
  background: #E5F2FB;
}
</style>

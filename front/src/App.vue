<template>
  <div>
    <nav-bar></nav-bar>
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
      this.userData.getEmails();
      this.userData.getSchoolList();
      this.userData.getSkills();
    }
  }
</script>

<style >
body{
  background: #abd8ff;
}
a.router-link-exact-active {
  background: #2EA3F2;
  color: white;
  cursor: pointer;
}
</style>
  
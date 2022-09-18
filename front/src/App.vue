<template>
  <div>
    <nav-bar></nav-bar>
    <div class="mb-[20px]">
      <router-view/>
    </div>
    <admin-view></admin-view>
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
a.router-link-exact-active {
  background: #2EA3F2;
  color: white;
  cursor: pointer;
}
</style>

<template>
  <div >
    <nav-bar></nav-bar>
    <div class="mb-[20px] ">
      <router-view/>
    </div>
  </div>
</template>

<script>
import { userInformations } from "@/store/userStore"
export default {
  setup() {
    const userData = userInformations();
    return {
      userData
    }
  },

  beforeCreate() {
    this.userData.getUserData();
    this.userData.getCompanyList();
    // this.userData.getEmails();
    // this.userData.getSchoolList();
  }
}
</script>

<style >

* {
  font-family: monospace;
}

body {
  background-image: url("./assets/background-1.png"), linear-gradient(to top left, rgba(120, 163, 177, 0.5), rgba(62, 204, 252, 0.5));
  background-size: cover;
  position: relative;
  background-blend-mode: overlay;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  object-fit: cover;
  
}
</style>

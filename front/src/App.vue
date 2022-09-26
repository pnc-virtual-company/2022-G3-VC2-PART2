<template>
  <div >
    <nav-bar v-if="userData.userData"></nav-bar>
    <div class="mb-[20px]">
      <router-view></router-view>
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
      if (this.userData.getCookie('user_id')) {
        this.userData.getUserData();
      }
      this.userData.getCompanyList();
      this.userData.getSchoolList();
      this.userData.getSkills();
      this.userData.getAllAlumni();
      this.userData.getUnacceptedAlumni();
      if (this.userData.userData) {
        this.userData.getEmails();
        if (this.userData.userData.role == 'admin') {
          this.userData.getAllEro();
        }
      }
    },
  }
</script>

<style >
/* * {
  font-family: monospace;
} */

.scroll-box::-webkit-scrollbar-track {
  background-color: rgb(197, 197, 197);
}
.scroll-box::-webkit-scrollbar {
  width: 5px;
}
.scroll-box::-webkit-scrollbar-thumb {
  background-color: #2EA3F2;
}

html::-webkit-scrollbar-track {
  background-color: rgb(197, 197, 197);
}
html::-webkit-scrollbar {
  width: 7px;
}
html::-webkit-scrollbar-thumb {
  background-color: #2EA3F2;
}

body {
  background-image: url("./assets/background-1.png"), linear-gradient(to top left, rgba(133, 225, 255, 0.6), rgba(133, 225, 255, 0.6));
  background-size: cover;
  position: relative;
  background-blend-mode: overlay;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  object-fit: cover;
}

a.router-link-exact-active {
  background: #87cfff;
  color: white;
  cursor: pointer;
}
</style>
  
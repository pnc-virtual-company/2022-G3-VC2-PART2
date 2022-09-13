
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
      console.log("Before create")
      this.userData.getUserData();
      console.log(this.userData.userData)

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

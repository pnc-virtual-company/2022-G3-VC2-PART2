import { defineStore } from 'pinia'
import axios from "../axios-http";
export const userInformations = defineStore('get-data', {
  state () { 
    return{
      userStore: null
    }
  },

  getters: {
    userData () {
      return this.userStore
    }
  },

  actions: {
    getUserData(){
      axios.get('/users/'+1).then((res)=>{
        this.userStore = res.data ;
      })
    },

    updateAlumniGerneralInfor(data) {
      this.userStore.first_name = data.first_name;
      this.userStore.last_name = data.last_name;
      this.userStore.email = data.email;
      // console.log(this.userStore.email);
      this.userStore.alumni.batch = data.batch;
      this.userStore.alumni.gender = data.gender;
      this.userStore.alumni.phone = data.phone;
      this.userStore.alumni.telegram = data.telegram;
      this.userStore.alumni.major = data.major;
      this.userStore.alumni.birth_date = data.birth_date
      this.userStore.alumni.address = data.address;

      // console.log(data)
      // console.log(this.userStore)
      axios.put('/alumniIntro/'+1, data);
    }
  }
});
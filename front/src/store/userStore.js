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
      axios.get('users/'+1).then((res)=>{
        this.userStore = res.data ;
      })
    },

    updateGerneralInforData(data) {
      this.userStore.alumni = data;
      axios.put('/alumniGeneralInfo/'+1, data);
    }
  }
});
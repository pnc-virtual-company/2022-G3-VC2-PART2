import { defineStore } from 'pinia'

export const alumniProfileStore = defineStore('counter', {
  state () { 
    return{
      generalInforData :{
        alumni: {gender: 'Male',major: 'Web developer',birthDate:'02/06/2022',address:'Tek Tla, Phnom Penh'}
      }
    }
  },

  getters: {
    getGeneralInforData () {
      return this.generalInforData
    }
  },

  actions: {
    updateGerneralInforData(data) {
      this.generalInforData.alumni = data;
      
    },
  },
})

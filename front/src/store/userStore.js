import { defineStore } from 'pinia'
import axios from "../axios-http";
export const userInformations = defineStore('get-data', {
  state () { 
    return{
      userStore: null,
      companiesStore: null,
    }
  },

  getters: {
    userData () {
      return this.userStore
    },
    companyList () {
      return this.companiesStore;
    }
  },

  actions: {
    getUserData(){
      axios.get('users/'+1).then((res)=>{
        this.userStore = res.data ;
      })
    },

    getCompanyList() {
      axios.get('/companies/').then((res)=>{
        this.companiesStore = res.data;
      })
    },

    updateGerneralInforData(data) {
      this.userStore.alumni = data;
      axios.put('/alumniGeneralInfo/'+1, data);
    },

    updateWorkExperience(id, data) {
      this.userStore.work_experience.forEach((experience, index) => {
        if (experience.id == id) {
          this.userStore.work_experience[index].position = data.position;
          this.userStore.work_experience[index].company.name = data.company.name;
          this.userStore.work_experience[index].is_working = data.is_working;
          this.userStore.work_experience[index].start_date = data.start_date;
          if (!data.is_working) {
            this.userStore.work_experience[index].end_date = data.end_date;
          } else {
            this.userStore.work_experience[index].end_date = null;
          }

          let newExperience = {position: data.position, company_id: data.company.id, is_working: data.is_working, start_date: data.start_date, end_date: data.end_date};
          axios.put('/alumnis/experience/' + id, newExperience);
        } 
      });
    }
  }
});
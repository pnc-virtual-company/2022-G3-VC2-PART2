import { defineStore } from 'pinia'
import axios from "../axios-http";
export const userInformations = defineStore('get-data', {
  state () { 
    return{
      userStore: null,
      companiesStore: null,
      alumniStore: null,
    }
  },

  getters: {
    userData () {
      return this.userStore
    },
    companyList () {
      return this.companiesStore;
    },
    alumniList () {
      return this.alumniStore;
    },
  },
  actions: {
    getUserData(){
      axios.get('/users/'+1).then((res)=>{
        this.userStore = res.data ;
      })
    },
    addInviteAlumni(inviteAlumni){
      axios.post('/users',inviteAlumni).then((res)=>{
        console.log(res.data);
      })
    },


    addInviteERO(inviteERO){
      axios.post('/users',inviteERO).then((res)=>{
        console.log(res.data)
      })
    },


    deleteAlumni(id){
      this.alumniStore.forEach((alumni,index)=>{
        if(alumni.id==id){
          this.alumniStore.splice(index ,1)
        }
      })
      axios.delete('/users/'+id);
    },

    updateAlumniGerneralInfor(data) {
      this.userStore.first_name = data.first_name;
      this.userStore.last_name = data.last_name;
      this.userStore.email = data.email;
      this.userStore.alumni.batch = data.batch;
      this.userStore.alumni.gender = data.gender;
      this.userStore.alumni.phone = data.phone;
      this.userStore.alumni.telegram = data.telegram;
      this.userStore.alumni.major = data.major;
      this.userStore.alumni.birth_date = data.birth_date
      this.userStore.alumni.address = data.address;
      axios.put('/alumniIntro/'+1, data);
    },

    getCompanyList() {
      axios.get('/companies/').then((res)=>{
        this.companiesStore = res.data;
      })
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
    },

    getAllAlumni() {
      axios.get('/alumnis').then((res) => {
        this.alumniStore = res.data;
      })
    }
  }
});
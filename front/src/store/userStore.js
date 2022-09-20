import { defineStore } from 'pinia'
import axios from "../axios-http";
export const userInformations = defineStore('get-data', {
  state () { 
    return{
      userStore: null,
      companiesStore: null,
      eroStore: null,
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
    eroList () {
      return this.eroStore;
    },
    alumniList () {
      return this.alumniStore;
    },
  },
  actions: {
    getUserData(){
<<<<<<< HEAD
      axios.get('/users/'+21).then((res)=>{
=======
      axios.get('/users/'+1).then((res)=>{
>>>>>>> dd296365597e9fd107f74b8feb4485d92bbecf47
        this.userStore = res.data;
      })
    },

    addInviteAlumni(inviteAlumni){
      axios.post('/invite/alumnis',inviteAlumni);
    },

    addInviteERO(inviteERO){
      axios.post('/invite/eros',inviteERO);
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

    getCompanyList() {
      axios.get('/companies/').then((res)=>{
        this.companiesStore = res.data;
      })
    },

    getAllAlumni() {
      axios.get('/alumnis').then((res) => {
        this.alumniStore = res.data;
      })
    },

    deleteCompany(id) {
      this.companiesStore.forEach((company, index) => {
        if (company.id == id) {
          this.companiesStore.splice(index, 1);
        }
      });
      axios.delete('/companies/' + id);
    },

    getAllEro(){
      axios.get('/eros/').then((res)=>{
        this.eroStore = res.data;
      });
    },

    deleteEro(id){
      this.eroStore.forEach((ero, index)=>{
        if(ero.id == id){
          this.eroStore.splice(index, 1);
        }
      });
      axios.delete('/users/' +id);
    }

  }
});
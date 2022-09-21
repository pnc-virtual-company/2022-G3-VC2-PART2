import { defineStore } from 'pinia'
import axiosClient from "../axios-http";
export const userInformations = defineStore('user-data', {
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
      console.log(this.userStore)
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
      let userId = this.getCookie('user_id')
      axiosClient.get('/users/'+userId).then((res)=>{
        this.userStore = res.data ; 
      })
    },

    showType(isPassword){
      if(isPassword){
          return 'password';
      }else{
          return 'text';
      }
    },
    addInviteAlumni(inviteAlumni){
      axiosClient.post('/invite/alumnis',inviteAlumni);
    },

    addInviteERO(inviteERO){
      axiosClient.post('/invite/eros',inviteERO);
    },

    deleteAlumni(id){
      this.alumniStore.forEach((alumni,index)=>{
        if(alumni.id==id){
          this.alumniStore.splice(index ,1)
        }
      })
      axiosClient.delete('/users/'+id);
    },

    updateAlumniGerneralInfor(data) {
      let alumniId = this.getCookie('user_id')
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
      axiosClient.put('/alumniIntro/'+alumniId, data);
    },


    getCompanyList() {
      axiosClient.get('/companies/').then((res)=>{
        this.companiesStore = res.data;
      })
    },

    signUp(user){
      axiosClient.post("/alumnis/signup/", user).then((res) => {
        console.log(res.data);
      });
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
          axiosClient.put('/alumnis/experience/' + id, newExperience);
        } 
      });
    },

    getAllAlumni() {
      axiosClient.get('/alumnis').then((res) => {
        this.alumniStore = res.data;
      })
    },

    deleteCompany(id) {
      this.companiesStore.forEach((company, index) => {
        if (company.id == id) {
          this.companiesStore.splice(index, 1);
        }
      });
      axiosClient.delete('/companies/' + id);
    },

    getAllEro(){
      axiosClient.get('/eros/').then((res)=>{
        this.eroStore = res.data;
      });
    },

    deleteEro(id){
      this.eroStore.forEach((ero, index)=>{
        if(ero.id == id){
          this.eroStore.splice(index, 1);
        }
      });
      axiosClient.delete('/users/' +id);
    },
    getCookie(name) {
      var cname = name + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var splitDataToJsonFormat = decodedCookie.split(';');
      for(var i = 0; i < splitDataToJsonFormat.length; i++){
          var cookie = splitDataToJsonFormat[i];
          while(cookie.charAt(0) == ' '){
            cookie = cookie.substring(1);
          }
          if(cookie.indexOf(cname) == 0){
              return cookie.substring(cname.length, cookie.length);
          }
      }
      return "";
    },
  }
});
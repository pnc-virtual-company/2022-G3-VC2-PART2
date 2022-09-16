import { defineStore } from 'pinia'
import axios from "../axios-http";
export const userInformations = defineStore('get-data', {
  state () { 
    return{
      userStore: null,
      companiesStore: null,
      showEditProfile: false,
      showEditCover: false,
      emails:null,
      schoolStore:null,
      isShowAddExperienceForm:false,
    }
  },
  getters: {
    showFormAddExperience(){
      return this.isShowAddExperienceForm;
    },
    userData () {
      return this.userStore
    },
    companyList () {
      return this.companiesStore;
    },
    userEmails () {
      return this.emails;
    },
    schoolList(){
      return this.schoolStore;
    },
  },

  actions: {
    getUserData(){
      axios.get('/users/'+1).then((res)=>{
        this.userStore = res.data ;
      })
    },
    getEmails(){
      axios.get('/emails/'+1).then((res)=>{
        this.emails = res.data ;
      })
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
    getSchoolList(){
      axios.get('/schools/').then((res)=>{
        this.schoolStore = res.data;
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
    updateEducationBackground(id, data) {
      this.userStore.education_backgrounds.forEach((education, index) => {
        if (education.id == id) {
          this.userStore.education_backgrounds[index].degree = data.degree;
          this.userStore.education_backgrounds[index].school.name = data.school.name;
          this.userStore.education_backgrounds[index].major= data.major;
          this.userStore.education_backgrounds[index].is_studying = data.is_studying;
          this.userStore.education_backgrounds[index].start_date = data.start_date;
          if (!data.is_studying) {
            this.userStore.education_backgrounds[index].end_date = data.end_date;
          } else {
            this.userStore.education_backgrounds[index].end_date = null;
          }
          let newEducation = {degree: data.degree, school_id: data.school.id,major:data.major, start_date: data.start_date, end_date: data.end_date, is_studying:data.is_studying};
          axios.put('/alumni/schools/' + id, newEducation)
        } 
      });
    },
    getImage(name) {
          return axios.defaults.baseURL + "users/image/" + name;
    },
    uploadImage(path, image){
      axios.post(path, image)
    },
    addExperience(data){
      axios.post('/alumnis/experience', data).then(res => {
        console.log(res)
        this.getUserData()

      }
      )
    }
  }
});
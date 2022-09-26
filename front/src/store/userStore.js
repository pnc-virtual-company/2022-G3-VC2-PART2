import { defineStore } from 'pinia'
import axiosClient from "../axios-http";
export const userInformations = defineStore('user-data', {
  state () { 
    return{
      userStore: null,
      companiesStore: null, 
      emails:null,
      schoolStore:null,
      isShowAddExperienceForm:false,
      skillStore: null,
      eroStore: null,
      alumniStore: null,
      unacceptedAlumniStore: null,
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
    skillList() {
      return this.skillStore;
    },
    eroList () {
      return this.eroStore;
    },
    alumniList () {
      return this.alumniStore;
    },
    unacceptedAlumni() {
      return this.unacceptedAlumniStore;
    }
  },

  actions: {
    getUserData(){
      let userId = this.getCookie('user_id')
      axiosClient.get('/users/'+userId).then((res)=>{
        this.userStore = res.data; 
        this.getDataNeed();
      })
    },

    getDataNeed() {
      if (this.userStore) {
        this.getEmails();
        if (this.userStore.role == 'admin') {
          this.getAllEro();
        }
      }
    },

    getEmails(){
      axiosClient.get('/emails/'+ this.userStore.id).then((res)=>{
        this.emails = res.data ;
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
      if (window.confirm('Are you sure to remove this alumni account?')) {
        this.alumniStore.forEach((alumni,index)=>{
          if(alumni.id==id){
            this.alumniStore.splice(index ,1)
          }
        })
        axiosClient.delete('/users/'+id);
      }
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

    updateEroInfor(infor) {
      this.userStore.email = infor.email;
      axiosClient.put('/users/ero/' + this.userStore.id, infor);
    },
    
    getSchoolList(){
      axiosClient.get('/schools/').then((res)=>{
        this.schoolStore = res.data;
      })
    },

    getCompanyList() {
      axiosClient.get('/companies/').then((res)=>{
        this.companiesStore = res.data;
      })
    },

    signUp(user){
      axiosClient.post('/alumnis/signup/', user).then(res=>{
        console.log(res.data);
      });
    },
    
    updateWorkExperience(id, data) {
      this.userStore.work_experience.forEach((experience, index) => {
        if (experience.id == id) {
          this.userStore.work_experience[index].position = data.position;
          this.userStore.work_experience[index].company = data.company;
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

    deleteWorkExperience(id) {
      this.userStore.work_experience.forEach((experience, index) => {
        if (experience.id == id) {
          this.userStore.work_experience.splice(index, 1);
        }
      });
      axiosClient.delete('/alumnis/experience/' + id);
    },

    addCompany(company) {
      this.companiesStore.push(company);
    },

    addSchool(school) {
      this.schoolStore.push(school);
    },

    updateEducationBackground(id, data) {
      this.userStore.education_backgrounds.forEach((education, index) => {
        if (education.id == id) {
          this.userStore.education_backgrounds[index].degree = data.degree;
          this.userStore.education_backgrounds[index].school = data.school;
          this.userStore.education_backgrounds[index].major= data.major;
          this.userStore.education_backgrounds[index].is_studying = data.is_studying;
          this.userStore.education_backgrounds[index].start_date = data.start_date;
          if (!data.is_studying) {
            this.userStore.education_backgrounds[index].end_date = data.end_date;
          } else {
            this.userStore.education_backgrounds[index].end_date = null;
          }
          let newEducation = {degree: data.degree, school_id: data.school.id,major:data.major, start_date: data.start_date, end_date: data.end_date, is_studying:data.is_studying};
          axiosClient.put('/alumni/schools/' + id, newEducation);
        } 
      });
    },

    deleteEducationBackground(id) {
      this.userStore.education_backgrounds.forEach((education, index) => {
        if (education.id == id) {
          this.userStore.education_backgrounds.splice(index, 1);
        }
      });
      axiosClient.delete('/alumni/schools/' + id);
    },

    getImage(name) {
      return axiosClient.defaults.baseURL + "users/image/" + name;
    },

    uploadImage(path, image){
      axiosClient.post(path, image)
    },

    addExperience(data){
      axiosClient.post('/alumnis/experience', data).then(() => {
        this.getUserData()
        }
      )
    },

    addEducationBackground(data){
      axiosClient.post('/alumni/schools', data).then(() => {
        this.getUserData()
        }
      )
    },
    
    getSkills() {
      axiosClient.get('/skills/').then((res) => {
        this.skillStore = res.data;
      })
    },

    getFullDate(date) {
      let monthList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      let arrayDate = date.split("-");
      let newDate = monthList[parseInt(arrayDate[1])-1] + " " + arrayDate[2] + ", " + arrayDate[0];
      return newDate;
    },

    getMonthYearDate(date) {
      let monthList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      let arrayDate = date.split("-");
      let newDate = monthList[parseInt(arrayDate[1])-1] + " " + arrayDate[0];
      return newDate;
    },
    
    getAllAlumni() {
      axiosClient.get('/alumnis').then((res) => {
        this.alumniStore = res.data;
      })
    },

    getUnacceptedAlumni() {
      axiosClient.get('/alumnis/unaccepted/').then((res) => {
        this.unacceptedAlumniStore = res.data;
      })
    },

    deleteCompany(id) {
      if (window.confirm('Are you sure to remove this company?')) {
        this.companiesStore.forEach((company, index) => {
          if (company.id == id) {
            this.companiesStore.splice(index, 1);
          }
        });
        axiosClient.delete('/companies/' + id);
      }
    },

    getAllEro(){
      axiosClient.get('/eros/').then((res)=>{
        this.eroStore = res.data;
      });
    },

    deleteEro(id){
      if (window.confirm('Are you sure to remove this ero account?')) {
        this.eroStore.forEach((ero, index)=>{
          if(ero.id == id){
            this.eroStore.splice(index, 1);
          }
        });
        axiosClient.delete('/users/' +id);
      }
    },

    getBatches() {
      let yearList = [];
      let startYear = 2007;
      let latestBatch = this.getLatestBatchOfAlumni();
      while (startYear <= latestBatch) {
        yearList.push(startYear);
        startYear += 1;
      }
      return yearList;
    },

    getLatestBatchOfAlumni() {
      let latestBatch = this.alumniList[0].alumni.batch;
      this.alumniList.forEach(eachAlumni => {
        if (eachAlumni.first_name && eachAlumni.last_name) {
          if (eachAlumni.alumni.batch > latestBatch) {
            latestBatch = eachAlumni.alumni.batch;
          }
        }
      })
      return latestBatch;
    },
    
    getCompanies() {
      let companyList = [];
      if (this.companiesStore) {
        this.companiesStore.forEach(eachCompany => {
            if (!companyList.includes(eachCompany.name)) {
              companyList.push(eachCompany.name);
            }
        });
      }
      return companyList;
    },

    getMajor() {
      let majorList = [];
      this.alumniStore.forEach(eachAlumni => {
        if (eachAlumni.first_name && eachAlumni.last_name) {
          if (!majorList.includes((eachAlumni.alumni.major).toLowerCase())) {
            majorList.push(eachAlumni.alumni.major);
          }
        }
      });
      return majorList;
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

    duration(start, end) {
      let startDateArray = start.split('-');
      let endDateArray = end.split('-');
      let remainYears = endDateArray[0] - startDateArray[0];
      let remainMonths = parseInt(endDateArray[1]) - parseInt(startDateArray[1]);
      let remainDays = parseInt(endDateArray[2]) - parseInt(startDateArray[2]);
      
      let result = "";
      if (remainDays < 0) {
          remainMonths += -1;
      }
      if (remainMonths < 0) {
          if (remainYears == 1) {
              remainMonths = (12 + remainMonths);
              remainYears = 0;
          } else if (remainYears >= 2) {
              remainYears -= 1;
              remainMonths = (12 + remainMonths).toString();
          }
      }

      if (remainYears >= 1 || remainMonths >= 1) {
          if (remainYears >= 1) {
              if (remainYears >= 2) {
                  result += remainYears.toString() + ' Years ';
              } else if (remainYears == 1) {
                  result += remainYears.toString() + ' Year ';
              }
          }
          if (remainMonths >= 1) {
              if (result) {
                  result += "and ";
              }
              if (remainMonths >= 2) {
                  result += remainMonths.toString() + ' Months';
              } else if (remainMonths == 1) {
                  result += remainMonths.toString() + ' Month';
              }
          }
      } else {
          result = "Less than a month";
      }

      return result;
    },

    seenRequest(id) {
      this.unacceptedAlumni.find((alumni) => { if (alumni.id == id) { alumni.is_seen = true } })
      axiosClient.put('/users/request/seen/' + id);
    },

    acceptRequest(id) {
      this.unacceptedAlumni.find((alumni, index) => { 
        if (alumni.id == id) {
          alumni.is_accepted = true
          this.alumniList.push(alumni)
          this.unacceptedAlumni.splice(index, 1)
        }
      })
      axiosClient.put('/users/request/accept/' + id);
    }
  }
});
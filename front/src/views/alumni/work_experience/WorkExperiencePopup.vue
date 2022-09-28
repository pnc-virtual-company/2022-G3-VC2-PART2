<template>
    <popup-component @click="onClickPopup">
        <card-components>
            <form @input="checkValidation" class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Work Experience</h1> 
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <div class="w-full bg-white font-medium">
                            <span class="bg-white">Company:</span>
                            <div class="flex bg-white mt-1">
                                <span :class="{ 'border-red-400': isCompanyNull, 'border-gray-300': !isCompanyNull }" class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </span>
                                <div :class="{ 'border-red-400': isCompanyNull, 'border-gray-300': !isCompanyNull && !isFocusCompany, 'border-sky rounded-l-md':isFocusCompany }" class="w-full flex items-center border-2 rounded-r-md">
                                    <div v-if="companyId" class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3">
                                        <span class="font-normal">{{ selectedCompany }}</span>
                                        <svg @click="companyId = null; company = null;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-600 ml-1 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <input :disabled="companyId" @input="filterCompany" @focus="isFocusCompany = true; isShowCompanies = true" @blur="isFocusCompany = false" v-model="company" id="company" type="text" :placeholder="[[ placeholder ]]" :class="{ 'border-red-400': isCompanyNull, 'border-gray-300': !isCompanyNull }" class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                                </div>
                            </div>
                        </div>
                        <div v-if="isShowCompanies" class="absolute min-w-[22rem] max-h-[12rem] ml-11 overflow-y-auto scroll-box border-l-[1px] border-r-[1px] border-b-[1px] bg-white border-sky rounded-none cursor-pointer font-normal text-base block flex-1">
                            <div @click="$emit('create-company'); isShowCompanies = false" class="flex items-center py-2 pl-6 hover:bg-[#d9eafd]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 rounded-full border-[2px] border-[blue] text-[blue] font-bold mr-[10px]">
                                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-[blue]">Add new company</p>
                            </div>
                            <div v-for:="eachCompany of companiesToDisplay" @click="selectedCompany = eachCompany.name; company = null; companyId = eachCompany.id; isShowCompanies = false; checkValidation();" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                                <img v-if="eachCompany.logo" :src="userData.getImage(eachCompany.logo)" class="w-10 h-10 rounded-full mr-[10px]">
                                <div class="flex flex-col">
                                    <p class="font-medium">{{ eachCompany.name }}</p>
                                    <span class="text-[0.80rem]">{{ eachCompany.address }}</span>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Position:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'border-red-400': isPositionNull, 'border-gray-300': !isPositionNull }"  class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                <img class="w-[26px] h-[26px]"  src="../../../assets/position.png" alt="">
                            </span>
                            <input :class="{ 'border-red-400': isPositionNull, 'border-gray-300': !isPositionNull }"  v-model ="position"  type="text" id="website-admin" placeholder="Position" class="rounded-none pl-3 font-normal text-base  block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md  outline-sky">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Start date:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'border-red-400': isStartDateNull, 'border-gray-300': !isStartDateNull }" class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" v-model="start_date" :max="max_start_date" :class="{ 'border-red-400': isStartDateNull, 'border-gray-300': !isStartDateNull  }" type="date" id="website-admin" class="rounded-none font-normal text-base  block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md  outline-sky">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">End date:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'bg-gray-200': isWorking, 'border-gray-300': !isEndDateNull, 'border-red-400': isEndDateNull && !isWorking}" class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0">
                                <svg :class="{ 'bg-gray-300': isWorking }"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" :disabled='isWorking' v-model="end_date" :min="start_date" :max="new Date()" :class="{ 'bg-gray-200 text-gray-300': isWorking, 'border-gray-300': !isEndDateNull, 'border-red-400': isEndDateNull && !isWorking }" type="date" id="website-admin" class="rounded-none font-normal text-base block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md outline-sky" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-3 bg-white">
                    <input v-model="isWorking" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600  outline-sky">
                    <label for="default-checkbox" class="ml-2 bg-white font-base">I'm currently working this position</label>
                </div>
                <div v-if="errorMessage" class="m-auto">
                    <p class="text-red-500 text-center">{{ errorMessage }}</p>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup', userData.isShowAddExperienceForm=false)" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components v-if="!userData.isShowAddExperienceForm" @click="updateWorkExperience" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                        Update
                    </button-components>
                    <button-components v-else @click="addWorkExperience" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                        Save
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>
<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const userData = userInformations();
            return {
                userData
            }
        },
        props: ['experienceId'],
        data(){
            return {
                company:'',
                selectedCompany: null,
                companyId: null,
                position: '',
                start_date: '',
                end_date:null,
                max_start_date: null,
                isWorking:false,
                isPositionNull: false,
                isStartDateNull: false,
                isEndDateNull: false,
                errorMessage: null,
                isShowCompanies: false,
                isCompanyNull: false,
                companiesToDisplay: this.userData.companyList,
                isFocusCompany: false,
                placeholder: null,
            }
        },

        methods: {
            addExperienceFront(experience){
                this.userData.userStore.work_experience.push(experience);
            },
            addWorkExperience(){
                if(this.isValidated()){
                    let companyInfor = this.userData.companyList.find((company) => company.id == this.companyId)
                    let userExperience = {
                        user_id: this.userData.userData.id,
                        company_id: companyInfor.id,
                        position: this.position,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        is_working: this.isWorking,
                    }
                    let userExperienceFront = userExperience
                    userExperienceFront.company= companyInfor
                    this.addExperienceFront(userExperienceFront);
                    this.userData.isShowAddExperienceForm=false;
                    this.$emit('click-popup');
                    this.userData.addExperience(userExperience)
                }
            },
            updateWorkExperience(){
                if(this.isValidated()){
                    if (this.isWorking) {
                        this.end_date = null;
                    }
                    let userExperience = {
                        company: this.userData.companyList.find((company) => company.id == this.companyId),
                        position: this.position,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        is_working: this.isWorking,
                    }
                    this.$emit('update-experience', this.experienceId, userExperience);
                    this.$emit('click-popup');
                }
            },
            
            isValidated() {
                let isPassedValidate = true;
                this.isPositionNull = false;
                this.isStartDateNull = false;
                this.isEndDateNull = false;
                if (!this.position || !this.start_date  || !this.companyId) {
                    isPassedValidate = false;
                    this.errorMessage = "Please input all fields!";
                    if (!this.position) {
                        this.isPositionNull = true;
                    }
                    if (!this.start_date) {
                        this.isStartDateNull = true;
                    }
                    if (!this.companyId) {
                        this.isCompanyNull = true;
                    }
                }
                if (!this.isWorking) {                                                                                                         
                    if (!this.end_date) {
                        isPassedValidate = false;
                        this.errorMessage = "Please input all fields!";
                        this.isEndDateNull = true;
                    }
                }
                return isPassedValidate;
            },
            
            checkValidation() {
                if (this.position) {
                    this.isPositionNull = false;
                }
                if (this.start_date) {
                    this.isStartDateNull = false;
                }
                if (this.end_date) {
                    this.isEndDateNull = false;
                }
                if (this.companyId) {
                    this.isCompanyNull = false;
                }
                if (!this.isWorking && !this.isPositionNull && !this.isStartDateNull && !this.isEndDateNull && !this.isCompanyNull || this.isWorking &&!this.isPositionNull && !this.isStartDateNull && !this.isCompanyNull) {
                    this.errorMessage = null;
                }
            },

            checkDate() {
                if (this.end_date) {
                    this.max_start_date = this.end_date;
                }
            },

            onClickPopup(e) {
                if (e.target.id == undefined) {
                    this.isShowCompanies = false;
                } else if (e.target.id != 'company') {
                    this.isShowCompanies = false;
                }
            },

            filterCompany() {
                let filteredCompanies = [];
                if (this.company) {
                    this.userData.companyList.forEach(eachCompany => {
                        if ((eachCompany.name.toLowerCase()).includes(this.company.toLowerCase())) {
                            filteredCompanies.push(eachCompany);
                        }
                    });
                } else {
                    filteredCompanies = this.userData.companyList;
                }
                this.companiesToDisplay = filteredCompanies;
            }
        },

        watch: {
            companyId(newValue) {
                if (!newValue) {
                    this.placeholder = "Type to find companies";
                } else {
                    this.placeholder = null;
                }
            }
        },
        
        created() {
            if(!this.userData.isShowAddExperienceForm){
                let experience = this.userData.userData.work_experience.find((experience) => experience.id == this.experienceId);
                this.companyId = experience.company.id;
                this.position = experience.position;
                this.start_date = experience.start_date;
                this.end_date = experience.end_date;
                this.isWorking = experience.is_working;
                this.selectedCompany = experience.company.name;     
                if (!experience.is_working) {
                    this.max_start_date = experience.end_date;
                }
            } else {
                this.placeholder = "Type to find companies";
            }
        }
    }
</script>

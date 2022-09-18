<template>
    <popup-component @click="onClickPopup">
        <card-components>
            <form  class="bg-white"  @input="checkValidation" >
                <h1 class="text-center font-bold text-2xl bg-white" >Update education background</h1>
                <div class="w-full bg-white font-medium">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">University:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'border-red-400': isSchoolNull, 'border-gray-300': !isSchoolNull }" class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </span>
                            <div :class="{ 'border-red-400': isSchoolNull, 'border-gray-300': !isSchoolNull && !isFocusSchool, 'border-sky rounded-l-md':isFocusSchool }" class="w-full flex items-center border-2 rounded-r-md">
                                <div v-if="schoolId" class="flex justify-end items-center ml-3 bg-gray-300 h-[75%] rounded-2xl px-3">
                                    <span class="font-normal">{{ selectedSchool }}</span>
                                    <svg @click="schoolId = null; school = null;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-600 ml-1 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input :disabled="schoolId" @input="filterSchools" @focus="isFocusSchool = true; isShowSchools = true" @blur="isFocusSchool = false" id="school" v-model="school" type="text" :placeholder="[[ placeholder ]]" :class="{ 'border-red-400': isSchoolNull, 'border-gray-300': !isSchoolNull }" class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                            </div>
                        </div>
                    </div>
                    <div v-if="isShowSchools" class="absolute min-w-[22rem] max-h-[12rem] ml-11 overflow-auto border-l-[1px] border-r-[1px] border-b-[1px] bg-white border-sky rounded-none cursor-pointer font-normal text-base block flex-1">
                        <div @click="$emit('create-school'); isShowSchools = false" class="flex items-center py-2 pl-6 hover:bg-[#d9eafd]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 rounded-full border-[2px] border-[blue] text-[blue] font-bold mr-[10px]">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-[blue]">Add new company</p>
                        </div>
                        <div v-for:="eachSchool of schoolsToDisplay" @click="selectedSchool = eachSchool.name; school = null; schoolId = eachSchool.id; isShowSchools = false; checkValidation();" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <img v-if="eachSchool.logo" :src="educationData.getImage(eachSchool.logo)" class="w-10 h-10 rounded-full mr-[10px]">
                            <div class="flex flex-col">
                                <p class="font-medium">{{ eachSchool.name }}</p>
                                <span class="text-[0.80rem]">{{ eachSchool.address }}</span>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Degree:</span>
                        <div class="flex bg-white mt-1">
                            <span  class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class=" h-[26px]"  src="../../../assets/degree.png" alt="">
                            </span>
                            <select v-model="degree" class="rounded-none bg-white cursor-pointer font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                                <option class="cursor-pointer" value="Associate Degree">Associate Degree</option>
                                <option class="cursor-pointer" value="Bachelor Degree">Bachelor Degree</option>
                                <option class="cursor-pointer" value="Master Degree">Master Degree</option>
                                <option class="cursor-pointer" value="Doctor Degree">Doctor Degree</option>
                                <option class="cursor-pointer" value="PhD Degree">PhD Degree</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Major:</span>
                        <div class="flex bg-white mt-1">
                            <span class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0" :class="{ 'border-red-400': isMajorNull, 'border-gray-300': !isMajorNull }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                    <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                    <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                                </svg>
                            </span>
                            <input v-model="major" type="text" id="website-admin" :class="{ 'border-red-400': isMajorNull, 'border-gray-300': !isMajorNull }" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md outline-sky">
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
                            <input @input="checkDate" v-model="start_date" :max="max_start_date" :class="{ 'border-red-400': isStartDateNull, 'border-gray-300': !isStartDateNull }" type="date" id="website-admin" class="rounded-none bg-white font-normal text-base  block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md outline-sky" placeholder="email">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">End date:</span>
                        <div class="flex bg-white mt-1">
                            <span class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0" :class="{ 'border-red-400': isEndDateNull && !isStudying, 'border-gray-300': !isEndDateNull, 'bg-gray-200': isStudying }">
                                <svg :class="{ 'bg-gray-300': isStudying}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" :disabled='isStudying' v-model="end_date" :min="start_date" :max="new Date()" :class="{ 'border-red-400': isEndDateNull && !isStudying, 'border-gray-300': !isEndDateNull, 'bg-gray-200 text-gray-300': isStudying }" type="date" id="website-admin" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md outline-sky" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-3 bg-white">
                    <input v-model="isStudying" id="is-studying" type="checkbox" value='' class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600  outline-sky">
                    <label for="is-studying" class="ml-2 bg-white font-base">I'm currently studying this university</label>
                </div>
                <div v-if="errorMessage" class="m-auto">
                    <p class="text-red-500 text-center">{{ errorMessage }}</p>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components v-if="educationId==null" @click="addEducationBackground" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                        Save
                    </button-components>
                    <button-components v-else @click="updateEducationBackground" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                        Update
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
            const educationData = userInformations();
            return {
                educationData
            }
        },
        props: ['educationId'],

        data(){
            return {
                school:'',
                schoolId: null,
                isShowSchools: false,
                degree: '',
                start_date: '',
                end_date:'',
                major:'',
                max_start_date: null,
                isStudying:false,
                isSchoolNull: false,
                isStartDateNull: false,
                isEndDateNull: false,
                isMajorNull:false,
                errorMessage: null,
                isFocusSchool: false,
                selectedSchool: null,
                placeholder: null,
                schoolsToDisplay: this.educationData.schoolList,
            }
        },

        methods: {
            addEducationBackground(){
                if(this.isValidated()){
                    let school = this.educationData.schoolList.find((school)=>school.id == this.schoolId)
                    let educationBackground = {
                        school_id: this.schoolId,
                        degree: this.degree,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        major: this.major,
                        is_studying:this.isStudying,
                        user_id: 1,
                        school: school
                    }
                    let educationBackgroundFront = educationBackground;
                    educationBackgroundFront.school = school;
                    this.educationData.userStore.education_backgrounds.push(educationBackgroundFront)
                    this.educationData.addEducationBackground(educationBackground);
                    this.$emit('click-popup');
                }
            },
            updateEducationBackground(){
                if(this.isValidated()){
                    let educationBackground = {
                        school: this.educationData.schoolList.find((school)=>school.id == this.schoolId),
                        degree: this.degree,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        major: this.major,
                        is_studying:this.isStudying
                    }
                    this.$emit('update-education',this.educationId,educationBackground);
                    this.$emit('click-popup')
                }
            },
            checkDate() {
                if (this.end_date) {
                    this.max_start_date = this.end_date;
                }
            },

            isValidated() {
                let isPassedValidate = true;
                this.isMajorNull = false;
                this.isStartDateNull = false;
                this.isEndDateNull = false;
                this.isSchoolNull = false;

                if (!this.major || !this.start_date || !this.schoolId) {
                    isPassedValidate = false;
                    this.errorMessage = "Please input all fields!";
                    if (!this.major) {
                        this.isMajorNull = true;
                    }
                    if (!this.start_date) {
                        this.isStartDateNull = true;
                    }
                    if (!this.schoolId) {
                        this.isSchoolNull = true;
                    }
                }
                if (!this.isStudying) {                                                                                                         
                    if (!this.end_date) {
                        isPassedValidate = false;
                        this.errorMessage = "Please input all fields!";
                        this.isEndDateNull = true;
                    }
                }
                return isPassedValidate;
            },

            checkValidation() {
                if (this.major) {
                    this.isMajorNull = false;
                }
                if (this.start_date) {
                    this.isStartDateNull = false;
                }
                if (this.end_date) {
                    this.isEndDateNull = false;
                }
                if (this.schoolId) {
                    this.isSchoolNull = false;
                }
                if (!this.isStudying &&!this.isMajorNull && !this.isStartDateNull && !this.isEndDateNull || this.isStudying &&!this.isMajorNull && !this.isStartDateNull) {
                    this.errorMessage = null;
                }
            },

            filterSchools() {
                console.log('filter');
                let filteredSchools = [];
                if (this.school) {
                    this.educationData.schoolList.forEach(eachSchool => {
                        if ((eachSchool.name.toLowerCase()).includes(this.school.toLowerCase())) {
                            filteredSchools.push(eachSchool);
                        }
                    });
                } else {
                    filteredSchools = this.educationData.schoolList;
                }
                this.schoolsToDisplay = filteredSchools;
            },

            onClickPopup(e) {
                if (e.target.id == undefined) {
                    this.isShowSchools = false;
                } else if (e.target.id != 'school') {
                    this.isShowSchools = false;
                }
            },
        },

        watch: {
            isStudying(newValue) {
                if (newValue) {
                    this.isEndDateNull = false;
                }
            },

            schoolId(newValue) {
                if (!newValue) {
                    this.placeholder = "Type to find schools";
                } else {
                    this.placeholder = null;
                }
            }
        },

        created() {
            if(this.educationId != null) {
                let education = this.educationData.userData.education_backgrounds.find((education) => education.id == this.educationId);
                this.degree = education.degree;
                this.selectedSchool = education.school.name;
                this.schoolId = education.school.id;
                this.start_date = education.start_date;
                this.end_date = education.end_date;
                this.major = education.major;
                this.isStudying = education.is_studying;
                if (!education.is_studying) {
                    this.max_start_date = education.end_date;
                }
            }else{
                this.placeholder = 'Type to find schools';
                this.degree = 'Associat Degree';
            }
        },
    }
</script>

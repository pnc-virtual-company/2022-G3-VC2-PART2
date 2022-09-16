<template>
    <popup-component>
        <card-components>
            <form  class="bg-white"  @input="checkValidation" >
                <h1 class="text-center font-bold text-2xl bg-white" >Update education background</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">University::</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[26px] h-[26px]"  src="../../../assets/school.png" alt="">
                            </span>
                            <select v-model="school" id="" class="rounded-none bg-white cursor-pointer font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                                <option class="cursor-pointer" v-for="school of educationData.schoolList" :key="school" :value="school.name">{{ school.name }}</option>
                            </select>
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
                            <select v-model="degree" id="" class="rounded-none bg-white cursor-pointer font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                                <option class="cursor-pointer" value="Associat Degree">Associate Degree</option>
                                <option class="cursor-pointer" value="Bachelor Degree">Bachelor Degree</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Major:</span>
                        <div class="flex bg-white mt-1">
                            <span class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0 border-gray-300" :class="{ 'border-red-400': isMajorNull }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                    <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                    <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                                </svg>
                            </span>
                            <input :class="{ 'border-red-400': isMajorNull }" v-model="major" type="text" id="website-admin" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Start date:</span>
                        <div class="flex bg-white mt-1">
                            <span  class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" v-model="start_date" :max="max_start_date" :class="{ 'border-red-400': isStartDateNull }" type="date" id="website-admin" class="rounded-none bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky" placeholder="email">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">End date:</span>
                        <div class="flex bg-white mt-1">
                            <span class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0 border-gray-300" :class="{ 'bg-gray-200': isStudying, 'border-red-400': isEndDateNull && !isStudying}">
                                <svg :class="{ 'bg-gray-300': isStudying}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" :disabled='isStudying' v-model="end_date" :min="start_date" :max="new Date()" :class="{ 'bg-gray-200 text-gray-300': isStudying, 'border-red-400': isEndDateNull && !isStudying }" type="date" id="website-admin" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky" >
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
                    <button-components @click="updateEducationBackground" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
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
            const educationData = userInformations();
            return {
                educationData
            }
        },
        props: ['educationId'],

        data(){
            return {
                school:'',
                degree: '',
                start_date: '',
                end_date:'',
                major:'',
                istudying:'',
                max_start_date: null,
                isStudying:false,
                isschoolNull: false,
                isStartDateNull: false,
                isEndDateNull: false,
                isMajorNull:false,
                errorMessage: null,
            }
        },

        methods: {
            updateEducationBackground(){
                if(this.isValidated()){
                    let educationBackground = {
                        school: this.educationData.schoolList.find((school)=>school.name == this.school),
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

                if (!this.major || !this.start_date) {
                    isPassedValidate = false;
                    this.errorMessage = "Please input all fields!";
                    if (!this.major) {
                        this.isMajorNull = true;
                    }
                    if (!this.start_date) {
                        this.isStartDateNull = true;
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
                if (!this.isStudying &&!this.isMajorNull && !this.isStartDateNull && !this.isEndDateNull || this.isStudying &&!this.isMajorNull && !this.isStartDateNull) {
                    this.errorMessage = null;
                }
            },
        },
        created() {
            let education = this.educationData.userData.education_backgrounds.find((education) => education.id == this.educationId);
            this.degree = education.degree;
            this.school = education.school.name;
            this.start_date = education.start_date;
            this.end_date = education.end_date;
            this.major = education.major;
            this.isStudying = education.is_studying;
            if (!education.is_studying) {
                this.max_start_date = education.end_date;
            }
        }

    }
</script>

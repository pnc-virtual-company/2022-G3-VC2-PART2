<template>
    <popup-component>
        <card-components>
            <form @input="checkValidation" class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Update work experience</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Companies:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </span>
                            <select v-model="company" id="" class="rounded-none bg-white cursor-pointer font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                                <option class="cursor-pointer" v-for="company of userData.companyList" :key="company" :value="company.name">{{ company.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Position:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'border-red-400': isPositionNull }"  class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[26px] h-[26px]"  src="../../../assets/position.png" alt="">
                            </span>
                            <input :class="{ 'border-red-400': isPositionNull }"  v-model ="position"  type="text" id="website-admin" placeholder="Position" class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Start date:</span>
                        <div class="flex bg-white mt-1">
                            <span :class="{ 'border-red-400': isStartDateNull}" class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
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
                            <span :class="{ 'bg-gray-200': isWorking, 'border-red-400': isEndDateNull && !isWorking}" class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg :class="{ 'bg-gray-300': isWorking }"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input @input="checkDate" :disabled='isWorking' v-model="end_date" :min="start_date" :max="new Date()" :class="{ 'bg-gray-200 text-gray-300': isWorking, 'border-red-400': isEndDateNull && !isWorking }" type="date" id="website-admin" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky" >
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
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components @click="updateWorkExperience" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
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
                position: '',
                start_date: '',
                end_date:'',
                max_start_date: null,
                isWorking:false,
                isPositionNull: false,
                isStartDateNull: false,
                isEndDateNull: false,
                errorMessage: null,
            }
        },

        methods: {
            updateWorkExperience(){
                if(this.isValidated()){
                    let userExperience = {
                        company: this.userData.companyList.find((company) => company.name == this.company),
                        position: this.position,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        is_working: this.isWorking
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

                if (!this.position || !this.start_date) {
                    isPassedValidate = false;
                    this.errorMessage = "Please input all fields!";
                    if (!this.position) {
                        this.isPositionNull = true;
                    }
                    if (!this.start_date) {
                        this.isStartDateNull = true;
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
                console.log("log");
                if (this.position) {
                    this.isPositionNull = false;
                }
                if (this.start_date) {
                    this.isStartDateNull = false;
                }
                if (this.end_date) {
                    this.isEndDateNull = false;
                }
                if (!this.isWorking &&!this.isPositionNull && !this.isStartDateNull && !this.isEndDateNull || this.isWorking &&!this.isPositionNull && !this.isStartDateNull) {
                    this.errorMessage = null;
                }
            },

            checkDate() {
                if (this.end_date) {
                    this.max_start_date = this.end_date;
                }
            }
        },

        created() {
            let experience = this.userData.userData.work_experience.find((experience) => experience.id == this.experienceId);
            this.position = experience.position;
            this.company = experience.company.name;
            this.start_date = experience.start_date;
            this.end_date = experience.end_date;
            this.isWorking = experience.is_working;
            if (!experience.is_working) {
                this.max_start_date = experience.end_date;
            }
        }
    }
</script>

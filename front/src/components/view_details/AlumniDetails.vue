<template>
    <popup-component @click="checkClick" id="free-space">
        <div class="w-7/12 relative h-[95%] rounded bg-white">
            <div @click="$emit('close-details')" class="absolute top-2 right-2 p-1 cursor-pointer bg-white shadow opacity-60 shadow-black text-[1rem] rounded-full text-red-400 font-bold flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-red-600 text-2xl cursor-pointer">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="overflow-y-auto w-full h-full scroll-box rounded">
                <div class="w-full">
                    <div>
                        <img alt="Vue logo" class=" object-cover  object-center h-[45vh] w-full" v-if="userData" :src="data.getImage(userData.cover)">
                    </div>
                    <div class="flex justify-between items-end mt-[-6rem] ml-11">
                        <div class="flex flex-col items-center">
                            <div>
                                <img alt="Vue logo" class="object-cover  object-center w-[148px] h-[148px] rounded-full" v-if="userData" :src="data.getImage(userData.profile)" width="120">
                            </div>
                            <h1 v-if="userData" class="bg-white font-bold text-xl mt-2">{{userData.first_name}} {{userData.last_name}}</h1>
                        </div>
                    </div>
                </div>

                <hr class="w-[95%] m-auto border-gray-300 mt-3">
                <div class="w-11/12 p-[20px]    ">
                    <div class="flex bg-white">
                        <p v-if="currenWork" class="text-[20px] text-sky font-bold italic m-0 w-[50%]">Current work: {{currenWork.position}}</p>
                        <p v-if="currenWork" class="text-[20px] text-sky font-bold italic m-0 w-[50%]" >Company: {{currenWork.company.name}} </p>
                    </div>
                    <div class="bg-white flex">
                        <the-email>{{userData.email}}</the-email>
                    </div>
                    <div class="bg-white flex">
                        <the-phone>{{userData.alumni.phone}}</the-phone>
                        <the-major>{{userData.alumni.major.toUpperCase()}} - {{userData.alumni.batch}}</the-major>
                    </div>
                    <div class="bg-white flex">
                        <the-telegram>{{userData.alumni.telegram}}</the-telegram>
                        <the-address>{{userData.alumni.address}}</the-address>
                    </div>
                    <div class="flex bg-white ">
                        <the-gender>{{userData.alumni.gender}}</the-gender>
                        <the-birthdate>{{data.getFullDate(userData.alumni.birth_date)}}</the-birthdate>
                    </div>
                </div>

                <div class="p-[20px]">
                    <div class="flex justify-between border-t-[1px] border-gray-300">
                        <div class="w-full mt-[0.60rem] flex justify-start items-center">
                            <h1 class="font-bold text-2xl text-sky">Skills</h1>
                        </div>
                    </div> 
                    <div v-if="userData.skills.length > 0" class="flex flex-wrap justify-start">
                        <p v-for:="alumniSkill of userData.skills" class="bg-gray-300 text-[18px] text-center rounded-[15px] py-[0.30rem] px-4 mt-4 mr-4">{{ alumniSkill.skill.name }}</p>
                    </div>
                    <div v-else class="w-full flex flex-col justify-center itmes-center text-gray-400 text-center text-[16.5px]">
                        <p>Doesn't have any skills for now!</p>
                    </div>
                </div>

                <hr class="w-[95%] m-auto border-gray-300">
                <div class="p-[20px]">
                    <div class="flex justify-start">
                        <h1 class="font-bold text-2xl text-sky">Work Experience</h1>
                    </div>
                    <div :class="{'h-[41.1vh]': orderedExperience.length > 0}">
                        <div v-if="!orderedExperience || orderedExperience.length <= 0" class="flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
                            <p>Doesn't have any work experience for now!</p>
                        </div>
                        <div v-else>
                            <div v-for:="experience of orderedExperience" class="border-b-[1px] border-b-gray-300 pb-3 text-black">
                                <div class="flex items-center justify-between mt-3 w-full">
                                    <div class="flex items-center w-[87%]">
                                        <img class="w-14 h-14 mr-3 align-items-sm-center rounded-full" :src="data.getImage(experience.company.logo)">
                                        <div class="w-full flex flex-col">
                                            <h1 class="font-bold text-xl text-[20px] truncate">
                                                {{ experience.position }} <span v-if="!experience.is_working" class="text-green-500 text-[16px]">({{ data.duration(experience.start_date, experience.end_date) }})</span>
                                            </h1>
                                            <div class="flex">
                                                <div class="w-[50%]">
                                                    <div>
                                                        <div class="text-[16px] font-medium truncate">
                                                            <a v-if="experience.company.link" :href="experience.company.link" target="blank" class="text-sky underline decoration-sky hover:animate-pulse hover:pl-[1px]">{{ experience.company.name }}</a>
                                                            <p v-else>{{ experience.company.name }}</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="text-[16px] truncate">
                                                            <p v-if="experience.is_working">Start date: {{ data.getFullDate(experience.start_date) }} - <span class="font-medium">Present</span></p>
                                                            <p v-else>Start date: {{ data.getFullDate(experience.start_date) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-[50%]">
                                                    <div>
                                                        <p class="text-[16px] truncate">
                                                            Address: {{experience.company.address }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p v-if="!experience.is_working" class="text-[16px] truncate">
                                                            End date: {{ data.getFullDate(experience.end_date) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <pagination-component v-if="orderedExperience.length > 0">
                        <button-number class="hover:bg-blue-100" @click="previous">
                            <svg  class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </button-number>
                        <button-number v-for="index in numberGination" :key="index" @click="changePagination(index)" :class="{'bg-sky' : paginationStand==index}" >{{index}}</button-number>
                        <button-number class="hover:bg-blue-100" @click="next">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </button-number>
                    </pagination-component>
                </div>

                <div class="p-[20px]">
                    <div class="flex justify-start">
                        <h1 class="font-bold text-2xl text-sky">Education Background</h1>
                    </div>
                    <div :class="{'h-[41.1vh]': orderedBackground.length > 0}">
                        <div v-if="!orderedBackground || orderedBackground.length <= 0" class="flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
                            <p>Doesn't have any education background for now!</p>
                        </div>
                        <div v-else>
                            <div v-for:="education of orderedBackground" class="border-b-[1px] border-b-gray-300 pb-3 text-black">
                                <div class="flex items-center justify-between mt-3 w-full">
                                    <div class="flex items-center w-[87%]">
                                        <img class="w-14 h-14 mr-3 align-items-sm-center rounded-full" :src="data.getImage(education.school.logo)">
                                        <div class="w-full flex flex-col">
                                            <h1 class="font-bold text-xl text-[20px] truncate">
                                                {{education.major}} <span class="text-green-500 text-[16px]">({{education.degree}})</span>
                                            </h1>
                                            <div class="flex">
                                                <div class="w-[50%]">
                                                    <div>
                                                        <div class="text-[16px] font-medium truncate">
                                                            <a v-if="education.school.link" :href="education.school.link" target="blank" class="text-sky underline decoration-sky hover:animate-pulse hover:pl-[1px]">{{ education.school.name }}</a>
                                                            <p v-else>{{education.school.name}}</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="text-[16px] truncate">
                                                            <p v-if="education.is_studying">Start date: {{data.getMonthYearDate(education.start_date)}} - <span class="font-medium">Present</span></p>
                                                            <p v-else>Start date: {{data.getMonthYearDate(education.start_date)}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-[50%]">
                                                    <div>
                                                        <p class="text-[16px] truncate">
                                                            Address: {{education.school.address}}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p v-if="!education.is_studying" class="text-[16px] truncate">
                                                            End date: {{data.getMonthYearDate(education.end_date)}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <pagination-component v-if="orderedExperience.length > 0">
                        <button-number class="hover:bg-blue-100" @click="previousEdu">
                            <svg  class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </button-number>
                        <button-number v-for="index in numberGinationEdu" :key="index" @click="changePaginationEdu(index)" :class="{'bg-sky' : paginationStandEdu==index}" >{{index}}</button-number>
                        <button-number class="hover:bg-blue-100" @click="nextEdu">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </button-number>
                    </pagination-component>
                </div>
            </div>
        </div>
    </popup-component>
</template>

<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data
            }
        },

        props: ['userId'],

        data() {
            return {
                userData: null,
                lastIndexSelect: 3,
                paginationIndex: 1,
                lastIndexSelectEdu: 3,
                paginationIndexEdu: 1,
            }
        },

        methods: {
            checkClick(e) {
                if (e.target.id == 'free-space') {
                    this.$emit('close-details');
                }
            },

            /// Work experience
            next() {
                if(this.lastIndexSelect < this.userData.work_experience.length){
                    this.lastIndexSelect += 3;
                    this.paginationIndex ++;
                }
            },
            previous() {
                if(this.lastIndexSelect > 3){
                    this.lastIndexSelect -= 3;
                    this.paginationIndex --;
                }
            },
            changePagination(page){
                this.paginationIndex = page
                this.lastIndexSelect = page * 3
            },
            showFormAddExp(){
                this.$emit('click-popup');
                this.userData.isShowAddExperienceForm = true;
            },
            endDate(date, working) {
                let result = "Present";
                if (!working) {
                    result = date;
                }
                return result;
            },

            // Education background
            nextEdu() {
                if(this.paginationIndexEdu < this.userData.education_backgrounds.length/3){
                    this.lastIndexSelectEdu += 3;
                    this.paginationIndexEdu ++;
                }
            },
            previousEdu() {
                if(this.lastIndexSelectEdu > 3){
                    this.lastIndexSelectEdu -= 3;
                    this.paginationIndexEdu --;
                }
            },
            changePaginationEdu(page){
                this.paginationIndexEdu = page
                this.lastIndexSelectEdu = page * 3
            },
        },

        computed: {
            // Work experience
            currenWork(){
                let currenWork = this.userData.work_experience.find(company => company.is_working == true);
                return currenWork;
            },

            orderedExperience() {
                let expList = [];
                this.userData.work_experience.forEach(eachExp => {
                    if (eachExp.is_working) {
                        expList.push(eachExp);
                    }
                });
                let notPresentExp = [];
                this.userData.work_experience.forEach(eachExp => {
                    if (!eachExp.is_working) {
                        notPresentExp.push(eachExp);
                    }
                });
                notPresentExp.reverse().forEach(eachExp => {
                    expList.push(eachExp);  
                });
                let ThreeWorkExp = []
                for(let i = 0; i < expList.length; i++) {   
                    if(i >= this.lastIndexSelect-3 && i < this.lastIndexSelect){
                        ThreeWorkExp.push(expList[i])
                    }
                }   
                return ThreeWorkExp;    
            },

            paginationStand(){
                return this.paginationIndex;
            },
            numberGination(){
                return Math.ceil(this.userData.work_experience.length/3)
            },

            /// Education background
            paginationStandEdu(){
                return this.paginationIndexEdu;
            },
            numberGinationEdu(){
                return Math.ceil(this.userData.education_backgrounds.length/3)
            },
            orderedBackground() {
                let eduList = [];
                this.userData.education_backgrounds.forEach(eachBg => {
                    if (!eachBg.end_date) {
                        eduList.push(eachBg);
                    }
                });

                let notPresentBg = [];
                this.userData.education_backgrounds.forEach(eachBg => {
                    if (eachBg.end_date) {
                        notPresentBg.push(eachBg);
                    }
                });
                notPresentBg.reverse().forEach(eachBg => {
                    eduList.push(eachBg);
                });
                let ThreeEducationBackground = []
                for(let i = 0; i < eduList.length; i++) {   
                    if(i >= this.lastIndexSelectEdu-3 && i < this.lastIndexSelectEdu){
                        ThreeEducationBackground.push(eduList[i])
                    }
                }   
                return ThreeEducationBackground; 
            }
        },

        created() {
            this.userData = this.data.alumniList.find(alumni => alumni.id == this.userId)
        }
    }
</script>
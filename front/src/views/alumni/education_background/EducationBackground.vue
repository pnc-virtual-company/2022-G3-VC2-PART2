<template>
    <card-components v-if="educationData.userData !=null" >
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Education Background</h1>
            <div >
                <icon-action @click="$emit('click-popup')">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 rounded-full hover:text-blue-700 text-sky cursor-pointer font-bold">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </icon-action>
            </div>
        </div>
        <div class="h-[41.1vh]">
            <card-informations  v-for:="education of orderedBackground" @delete-item="$emit('delete-item', education.id)" @click-popup="$emit('click-popup', education.id)" >
                <template #logo>
                    <img class="w-14 h-14 mr-3 align-items-sm-center rounded-full" :src="educationData.getImage(education.school.logo)">
                </template>
                <template #header>{{education.major}} <span class="text-green-500 text-[16px]">({{education.degree}})</span></template>
                <template #content-1>
                    <a v-if="education.school.link" :href="education.school.link" target="blank" class="text-blue-800 underline decoration-[blue] hover:animate-pulse hover:pl-[1px]">{{ education.school.name }}</a>
                    <p v-else>{{education.school.name}}</p>
                </template>
                <template #content-2>Address: {{education.school.address}}</template>
                <template #content-3>
                    <p v-if="education.is_studying">Start year: {{education.start_date}} - <span class="font-medium">Present</span></p>
                    <p v-else>Start year: {{education.start_date}}</p>
                </template>
                <template v-if="!education.is_studying" #content-4>End year: {{education.end_date}}</template>
            </card-informations>
        </div>
        <pagination-component>
            <button-number class="hover:bg-blue-100" @click="previous">
                <svg  class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </button-number>
            <button-number v-for="index in numberGination" :key="index" @click="changePagination(index)" :class="{'bg-sky' : paginationStand==index}" >{{index}}</button-number>
            <button-number class="hover:bg-blue-100" @click="next">
                <svg class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </button-number>
        </pagination-component>
    </card-components>
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
        data(){
            return{
                lastIndexSelect: 3,
                paginationIndex: 1,
            }
        },
        methods: {
            next() {
                if(this.paginationIndex < this.educationData.userData.education_backgrounds.length/3){
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
        },

        computed: {
            paginationStand(){
                return this.paginationIndex;
            },
            numberGination(){
                return Math.ceil(this.educationData.userData.education_backgrounds.length/3)
            },
            orderedBackground() {
                let eduList = [];
                this.educationData.userData.education_backgrounds.forEach(eachBg => {
                    if (!eachBg.end_date) {
                        eduList.push(eachBg);
                    }
                });

                let notPresentBg = [];
                this.educationData.userData.education_backgrounds.forEach(eachBg => {
                    if (eachBg.end_date) {
                        notPresentBg.push(eachBg);
                    }
                });
                notPresentBg.reverse().forEach(eachBg => {
                    eduList.push(eachBg);
                });
                let ThreeEducationBackground = []
                for(let i = 0; i < eduList.length; i++) {   
                    if(i >= this.lastIndexSelect-3 && i < this.lastIndexSelect){
                        ThreeEducationBackground.push(eduList[i])
                    }
                }   
                return ThreeEducationBackground; 
            }
        }
    }
</script>
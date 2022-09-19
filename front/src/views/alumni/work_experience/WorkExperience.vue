<template>
    <div>
    <card-components>
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Work Experience</h1>
            <div >
                <icon-action @click="showFormAddExp">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 rounded-full hover:text-blue-700 text-sky cursor-pointer font-bold">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </icon-action>
            </div>
        </div>
        <div>
            <card-informations v-for:="experience of orderedExperience" @delete-item="$emit('delete-item', experience.id)" @click-popup="$emit('click-popup', experience.id)">
                <template #logo>
                    <img class="w-14 h-14 mr-3 align-items-sm-center rounded-full" :src="userData.getImage(experience.company.logo)">
                </template>
                <template #header>{{ experience.position }} <span class="text-green-500 text-[16px]">({{ duration(experience.start_date, experience.end_date) }})</span></template>
                <template #content-1>
                    <a v-if="experience.company.link" :href="experience.company.link" target="blank" class="text-blue-800 underline decoration-[blue] hover:animate-pulse hover:pl-[1px]">{{ experience.company.name }}</a>
                    <p v-else>{{ experience.company.name }}</p>
                </template>
                <template #content-2>Address: {{experience.company.address }}</template>
                <template #content-3>
                    <p v-if="experience.is_working">Start date: {{ experience.start_date }} - Present</p>
                    <p v-else>Start date: {{ experience.start_date }}</p>
                </template>
                <template v-if="!experience.is_working" #content-4>End date: {{experience.end_date }}</template>
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
</div>
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
        data(){
            return{
                lastIndexSelect: 3,
                paginationIndex: 1,
            }
        },
        methods: {
            next() {
                if(this.lastIndexSelect < this.userData.userData.work_experience.length){
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

            duration(start, end) {
                let startDate = new Date(start);
                let endDate = new Date(end);
                let totalMillieconds = endDate - startDate;
                let result = totalMillieconds / 31536000000;
                if (result < 1) {
                    let numberOfMonths = result.toString().substring(2, 3);
                    if (numberOfMonths > 1) {
                        return numberOfMonths + " Months";
                    } else {
                        return numberOfMonths + " Month";
                    }
                } else {
                    let numberOfYears = result.toString().substring(0, 4);
                    if (numberOfYears % 1 == 0) {
                        if(numberOfYears >= 10) {
                            return numberOfYears.toString().substring(0, 2) + " Years";
                        } else if (numberOfYears >= 2) {
                            return numberOfYears.toString().substring(0, 1) + " Years";
                        } else {
                            return numberOfYears.toString().substring(0, 1) + " Year";
                        }
                    }else {
                        if(numberOfYears >= 10) {
                            return numberOfYears.toString().substring(0, 4) + " Years";
                        } else if (numberOfYears >= 2) {
                            return numberOfYears.toString().substring(0, 3) + " Years";
                        } else {
                            return numberOfYears.toString().substring(0, 3) + " Year";
                        }
                    }
                }
            }
        },

        computed: {
            paginationStand(){
                return this.paginationIndex;
            },
            numberGination(){
                return Math.ceil(this.userData.userData.work_experience.length/3)
            },
            orderedExperience() {
                let expList = [];
                this.userData.userData.work_experience.forEach(eachExp => {
                    if (eachExp.is_working) {
                        expList.push(eachExp);
                    }
                });

                let notPresentExp = [];
                this.userData.userData.work_experience.forEach(eachExp => {
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
            }
        }
    }
</script>
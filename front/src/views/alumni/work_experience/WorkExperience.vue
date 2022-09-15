<template>
    <card-components>
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Work Experience</h1>
            <div >
                <icon-action>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 rounded-full hover:text-blue-700 text-sky cursor-pointer font-bold">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </icon-action>
            </div>
        </div>
        <div>
            <card-informations v-for:="experience of orderedExperience" @click-popup="$emit('click-popup', experience.id)">
                <template #logo>
                    <img class="w-14 mr-3 align-items-sm-center" src="../../../assets/logo.png">
                </template>
                <template #header>{{ experience.position }} <span class="text-green-500 text-[16px]">({{ duration(experience.start_date, experience.end_date) }})</span></template>
                <template #content-1>
                    <a v-if="experience.company.link" :href="experience.company.link" target="blank" class="text-blue-800 underline decoration-[blue] hover:animate-pulse hover:pl-[1px]">{{ experience.company.name }}</a>
                    <p v-else>{{ experience.company.name }}</p>
                </template>
                <template #content-2>Address: {{experience.company.location }}</template>
                <template #content-3>Start date: {{ experience.start_date }}</template>
                <template #content-4>End date: {{experience.end_date }}</template>
            </card-informations>
        </div>
    </card-components>
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

        methods: {
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
                
                return expList;
            }
        }
    }
</script>
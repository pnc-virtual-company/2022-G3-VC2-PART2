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
                <template #header>{{ experience.position }}</template>
                <template #content-1>{{ experience.company.name }}</template>
                <template #content-2>{{ experience.start_date }} - {{ endDate(experience.end_date, experience.is_working) }}</template>
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
<template>
    <div>
        <work-experience v-if="userData.userData" @click-popup="(id) => { isShow = !isShow; experienceId = id; }"></work-experience>
        <work-experience-popup v-if="isShow" @create-company="isShowCreateCompany = !isShowCreateCompany" @update-experience="updateWorkExperience" :experienceId="experienceId" @click-popup="isShow = !isShow"></work-experience-popup>
        <component-create v-if="isShowCreateCompany" @create-company="createCompany" @close-create="isShowCreateCompany = !isShowCreateCompany"></component-create>
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
            return {
                experienceId: null,
                isShow: false,
                isShowCreateCompany: false,
            }
        },
        
        methods: {
            updateWorkExperience(id, data) {
                this.userData.updateWorkExperience(id, data);
            },

            createCompany(company) {
                this.userData.createCompany(company);
            }
        },
    }
</script>
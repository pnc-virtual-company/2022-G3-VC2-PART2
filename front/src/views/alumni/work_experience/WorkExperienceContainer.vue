<template>
    <div>
        <work-experience v-if="userData.userData" @click-popup="(id) => { isShow = !isShow; experienceId = id; }"></work-experience>
        <work-experience-popup v-if="isShow" @update-experience="updateWorkExperience" :experienceId="experienceId" @show-add-form="addForm" @click-popup="isShow = !isShow"></work-experience-popup>
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
            }
        },
        
        methods: {
            updateWorkExperience(id, data) {
                this.userData.updateWorkExperience(id, data);
            },
            addForm(){

            }
        },
    }
</script>
<template>
    <div>
        <education-background v-if="educationData.userData"  @click-popup="(id) => { isShow = !isShow; educationId = id; }"></education-background>
        <education-background-popup v-if="isShow" @click-popup="isShow = !isShow" :educationId="educationId" @update-education="updateEducationBackground"></education-background-popup>
    </div>
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
            return {
                isShow: false,
                educationId: null
            }
        },
        methods: {
            updateEducationBackground(id,data){
                this.educationData.updateEducationBackground(id,data);
            }
        },

        computed:{

        }
    }
</script>
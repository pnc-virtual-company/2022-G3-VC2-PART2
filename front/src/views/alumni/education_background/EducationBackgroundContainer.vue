<template>
    <div>
        <education-background v-if="educationData.userData" @delete-item="deleteEducation" @click-popup="(id) => { isShow = !isShow; educationId = id; }"></education-background>
        <education-background-popup v-if="isShow" ref="updatePopup" @create-school="isShowCreateSchool = !isShowCreateSchool" @click-popup="isShow = !isShow" :educationId="educationId" @update-education="updateEducationBackground"></education-background-popup>
        <component-create v-if="isShowCreateSchool" @create-object="createSchool" @close-create="isShowCreateSchool = !isShowCreateSchool"></component-create>
    </div>
</template>

<script>
    import {userInformations} from "@/store/userStore";
    import axios from "../../../axios-http";
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
                educationId: null,
                isShowCreateSchool: false
            }
        },
        
        methods: {
            updateEducationBackground(id,data){
                this.educationData.updateEducationBackground(id,data);
            },

            createSchool(school) {
                axios.post('/schools/', school).then((res) => {
                    this.educationData.addSchool(res.data);
                    this.$refs.updatePopup.selectedSchool = res.data.name;
                    this.$refs.updatePopup.schoolId = res.data.id;
                    this.isShowCreateSchool = false;
                });
            },

            deleteEducation(id) {
                if (window.confirm('Are you sure to remove this Education Background?')) {
                    this.educationData.deleteEducationBackground(id);
                }
            }
        },
    }
</script>
<template>
    <div>
        <work-experience v-if="userData.userData" @delete-item="deleteWorkExper" @click-popup="(id) => { isShow = !isShow; experienceId = id; }"></work-experience>
        <work-experience-popup v-if="isShow" ref="updatePopup" @create-company="isShowCreateCompany = !isShowCreateCompany" @update-experience="updateWorkExperience" :experienceId="experienceId" @show-add-form="addForm" @click-popup="isShow = !isShow"></work-experience-popup>
        <component-create v-if="isShowCreateCompany" @create-object="createCompany" @close-create="isShowCreateCompany = !isShowCreateCompany">
                        <template #title>
                            ADD WORK EXPERIENCE
                        </template>
                        <template #logo>
                            <img src="../../../assets/company_logo.jpg" class="w-full h-full rounded-full"> 
                        </template>                        
                        <template #label_1>
                           Company name
                        </template>
        </component-create>
    </div>
</template>

<script>
    import {userInformations} from "@/store/userStore"
    import axios from "../../../axios-http";
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
                axios.post('/companies/', company).then((res) => {
                    this.userData.addCompany(res.data);
                    this.$refs.updatePopup.selectedCompany = res.data.name;
                    this.$refs.updatePopup.companyId = res.data.id;
                    this.isShowCreateCompany = false;
                });
            },

            deleteWorkExper(id) {
                if (window.confirm('Are you sure to remove this Work Experience?')) {
                    this.userData.deleteWorkExperience(id);
                }
            }
        },
    }
</script>
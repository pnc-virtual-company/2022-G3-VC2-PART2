<template>
    <popup-component @click="onClickPopup">
        <card-components>
            <h1 class="text-center font-bold text-2xl">Edit your skills</h1>
            <div class="bg-white">
                <div class="w-full bg-white font-medium">
                    <div class="w-full flex flex-wrap mb-3 mt-2">
                        <div v-if="currentSkills.length > 0" v-for:="(eachSkill, index) of currentSkills" class="flex justify-start items-center mr-3 mt-2 bg-gray-300 rounded-2xl px-3 py-1">
                            <span v-if="eachSkill.skill.name" class="font-normal">{{ eachSkill.skill.name }}</span>
                            <span v-else class="font-normal">{{ eachSkill.name }}</span>
                            <svg @click="deleteSkill(eachSkill.id, index)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-600 ml-1 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div v-else class="w-full flex flex-col justify-center itmes-center mt-2">
                            <p class="text-gray-400 text-center">You have no any skills for now!</p>
                            <p class="text-gray-400 text-center">Please add some!</p>
                        </div>
                    </div>
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Add skill:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[27px] h-[27px]"  src="../../../assets/skills.png" alt="">
                            </span>
                            <input @input="filterSkills(); checkSkillName()" @keydown.enter="createSkill" ref="inputSkill" @focus="isShowSkills = true" v-model="skill" id="skill" type="text" placeholder="Type to find or create skill" class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md rounded-l-none p-2 outline-sky border-2 border-gray-300">
                            <button-components @click="createSkill" class="ml-1 bg-[#118811] font-medium text-white hover:bg-[green] border-none w-fit px-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 font-bold text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button-components>
                        </div>
                    </div>
                    <div v-if="isShowSkills && skillsToDisplay.length > 0" class="absolute min-w-[22rem] max-h-[12rem] ml-11 overflow-auto border-l-[1px] border-r-[1px] border-b-[1px] bg-white border-sky rounded-none cursor-pointer font-normal text-base block flex-1">
                        <div v-for:="eachSkill of skillsToDisplay" @click="addSkill(eachSkill)" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <div class="w-[1.5rem] h-[1.25rem] flex justify-start items-center">
                                <svg v-if="isSkillExisted(eachSkill.id)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-bold text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <p class="font-medium">{{ eachSkill.name }}</p>
                            </div>
                        </div>
                    </div>                    
                </div>
                <error-message v-if="isSkillNull">{{ erroMessage }}</error-message>
                <div class="bg-white flex justify-end mt-6">
                    <button-components @click="$emit('click-popup')" class="ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">
                        Done
                    </button-components>
                </div>
            </div>
        </card-components>
    </popup-component>
</template>
<script>
    import {userInformations} from "@/store/userStore";
    import axios from "../../../axios-http";
import ErrorMessage from '../../../components/alert_component/ErrorMessage.vue';
    export default {
  components: { ErrorMessage },
        setup(){
            const data = userInformations();
            return {
                data
            }
        },

        data(){
            return{
                currentSkills: null,
                skill:null,
                isShowSkills:false,
                skillsToDisplay: null,
                isSkillNull: false,
                erroMessage: null,
            }
        },

        methods: {
            filterSkills() {
                let filteredSkills = [];
                if (this.skill) {
                    this.data.skillList.forEach(eachSkill => {
                        if ((eachSkill.name.toLowerCase()).includes(this.skill.toLowerCase())) {
                            filteredSkills.push(eachSkill);
                        }
                    });
                } else {
                    filteredSkills = this.data.skillList;
                }
                this.skillsToDisplay = filteredSkills;
            },

            onClickPopup(e) {
                if (e.target.id == undefined) {
                    this.isShowSkills = false;
                } else if (e.target.id != 'skill') {
                    this.isShowSkills = false;
                }
            },

            isSkillExisted(skillId) {
                let isFound = false;
                this.currentSkills.forEach(eachSkill => {
                    if (eachSkill.skill.id == skillId) {
                        isFound = true;
                    }
                });
                return isFound;
            },

            createSkill() {
                this.isShowSkills = false;
                this.$refs.inputSkill.blur();
                if (this.skill) {
                    if (!this.isSkillNameExisted(this.skill)) {
                        let skill = {name: this.skill};
                        axios.post('/skills/', skill).then((res) => {
                            this.addSkill(res.data);
                            this.data.skillList.push(res.data);
                            this.skill = null;
                        })
                    } else {
                        let existSkill = this.data.skillList.find((skill) => skill.name.toLowerCase() == this.skill.toLowerCase())
                        this.addSkill(existSkill);
                        this.skill = null;
                    }
                } else {
                    this.isSkillNull = true;
                    this.erroMessage = "Please input skill name!";
                }
            },

            isSkillNameExisted(name) {
                let isFound = false;
                this.data.skillList.forEach(eachSkill => {
                    if (eachSkill.name.toLowerCase() == name.toLowerCase()) {
                        isFound = true;
                    }
                });
                return isFound;
            },

            checkSkillName() {
                if (this.skill) {
                    this.isSkillNull = false;
                }
            },

            addSkill(skill) {
                if (!this.isSkillExisted(skill.id)) {
                    let alumniSkill = {user_id: this.data.userData.id, skill_id: skill.id};
                    axios.post('/alumni/skills/', alumniSkill).then((res) => {
                        this.data.userData.skills.push(res.data);
                        this.isShowSkills = false;
                    })
                } else {
                    this.isSkillNull = true;
                    this.erroMessage = "This skill is already added!"
                }
            },

            deleteSkill(id, index) {
                this.data.userData.skills.splice(index, 1);
                axios.delete('/alumni/skills/' + id);
            },
        },

        created() {
            this.currentSkills = this.data.userData.skills;
            this.skillsToDisplay = this.data.skillList;
        }
    }
</script>

<style>

</style>
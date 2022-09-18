<template>
    <div>
        <div class="flex justify-between border-t-[1px] border-gray-300">
            <div class="w-full mt-[0.60rem] flex justify-between items-center">
                <h1 class="font-bold text-2xl text-sky">Skills</h1>
                <div class="flex">
                    <icon-action @click="$emit('click-popup')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-6 rounded-full  hover:text-blue-700 text-sky cursor-pointer">
                                <path  d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                        </span>
                    </icon-action>
                </div>
            </div>
        </div> 
        <div class="flex flex-wrap justify-start">
            <p v-for:="alumniSkill of userData.userData.skills" class="bg-gray-300 text-[18px] text-center rounded-[15px] py-[0.30rem] px-4 mt-4 mr-4">{{ alumniSkill.skill.name }}</p>
        </div>
        <div v-if="userData.userData.skills.length <= 0" class="w-full flex flex-col justify-center itmes-center">
            <p class="text-gray-400 text-center">You have no any skills for now!</p>
        </div>
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
    }
</script>

<style>

</style>
<template>
    <div class="m-auto flex font-bold items-center mb-8 mt-12 text-lg justify-evenly" :class="{'w-10/12': userData.userData.role == 'admin', 'w-5/12': userData.userData.role == 'ero'}">
        <span @click="$emit('switch-view', 'alumni'); currentView = 'alumni'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'alumni' }" class="cursor-pointer px-2 text-[1.3rem]">Alumni</span>
        <span v-if="userData.userData.role == 'admin'" @click="$emit('switch-view', 'ero'); currentView = 'ero'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'ero' }" class="cursor-pointer px-2 text-[1.3rem]">ERO</span>
        <span @click="$emit('switch-view', 'companies'); currentView = 'companies'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'companies' }" class="cursor-pointer px-2 text-[1.3rem]">Companies</span>
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
                currentView: 'alumni',
            }
        }
    }
</script>
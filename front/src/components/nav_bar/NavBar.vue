<template>
    <nav class="w-full bg-white sticky top-0 z-50 shadow">
        <div class="w-full flex justify-between items-center py-[0.13rem] px-6">
            <div>
                <img class="w-14" src="../../assets/PNCaa.jpg">
            </div>
            <div v-if="userRole == 'admin' || userRole == 'ero'" class="flex">
                <router-link v-if="userRole == 'ero'" class="relative mr-6 py-1 rounded-lg px-4 flex items-center" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'requests' }" to="/requests">
                    <img class="w-11" src="../../assets/people_requests.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Requests</p>
                    <p v-if="countNewRequests > 0" class="bg-red-500 text-white text-sm rounded-full px-[0.40rem] absolute -top-[0.15rem] -right-2">{{ countNewRequests }}</p>
                    <p v-if="ringRequests && countNewRequests > 0" class="bg-red-500 text-white text-sm rounded-full px-[0.40rem] absolute -top-[0.15rem] -right-2 animate-ping">{{ countNewRequests }}</p>
                </router-link>
                <router-link  class="mr-6 py-1 rounded-lg px-4  items-center flex" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'explore' }" to="/explore">
                    <img class="w-9 " src="../../assets/explore.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Explore</p>
                </router-link>
                <router-link class="mr-6 py-1 rounded-lg px-4 flex items-center" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'manage' }" to="/manage">
                    <img class="w-11" src="../../assets/manage.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Manage</p>
                </router-link>
            </div>
            <div class="flex items-center">
                <router-link v-if="userRole == 'alumni'" class="mr-6 py-2 rounded-lg px-4  items-center flex" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'explore' }" to="/explore">
                    <img class="w-9 " src="../../assets/explore.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Explore</p>
                </router-link>
                <router-link v-if="userRole == 'alumni'" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'profile' }" class="mr-6 py-1 rounded-lg px-4 flex items-center" to="/profile">
                    <img class="w-11 rounded-full" :src="urlProfile" alt="">
                    <p class="ml-3 text-[22px] font-medium">{{ userData.userData.first_name }} {{ userData.userData.last_name }}</p>
                </router-link>
                <router-link v-if="userRole == 'ero'" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'ero_profile' }" class="mr-6 py-1 rounded-lg px-4 flex items-center" to="/ero_profile">
                    <img class="w-11 rounded-full" :src="urlProfile" alt="">
                    <p class="ml-3 text-[22px] font-medium">{{ userData.userData.first_name }} {{ userData.userData.last_name }}</p>
                </router-link>
                <button @click="logout" :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'logout' }" class="flex py-2 px-4 rounded-lg items-center">
                    <img class="w-[2rem]" src="../../assets/logout.png" >
                    <p class="ml-3 text-[18px] font-medium">Log out</p>
                </button>
            </div>
        </div>
    </nav>
</template>

<script>

    import {userInformations} from "@/store/userStore"
    import axiosClient from  '@/axios-http';
    import {manageCookies} from '@/store/cookie.js'

    export default {
        setup(){
            const userCookie = manageCookies();
            const userData = userInformations();
            return {
                userData,
                userCookie

            }
        },
        data(){
            return{
                isShow:false,
                role:null,
                ringRequests: false,
            }
        },
        computed:{
            userRole(){
                if(this.userData.userData != null){
                    return this.userData.userData.role;
                }else{
                    return null;
                }
            },

            urlProfile(){
                if(this.userData.userData.profile.substring(0,12) == "IMG_PROFILE_"){
                    return this.userData.getImage(this.userData.userData.profile);
                }else{
                    return this.userData.userData.profile;
                }
            },

            countNewRequests() {
                if (this.userData.unacceptedAlumni) {
                    return this.userData.unacceptedAlumni.filter(alumni => !alumni.is_seen).length;
                } else {
                    return 0;
                }
            }
        },
        
        methods: {
            logout(){
                this.userCookie.deleteCookie('user_token')
                this.userCookie.deleteCookie('user_id')
                this.userCookie.deleteCookie('user_role')
                this.$router.go('login')
                axiosClient.post('users/logout');
            }
        },

        mounted() {
            this.ringRequests = true;
            setTimeout(() => {
                this.ringRequests = false;
            }, 10000)
        }
    }
</script>

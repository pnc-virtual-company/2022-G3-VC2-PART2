<template>
    <div class=" ">

        <div class="flex  w-[95%] m-auto   ">
            <div class=" w-[40%]  flex justify-center mt-[7%] align-items-md-center">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[56%] mt-[20%]">
            </div>
            <div class="mt-[7%] w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">WELCOME BACK</p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[10px] rounded-[7px]">
                    <form class="p-[5px]">
                        <div class="relative z-0 mb-6 w-full group p-[5px]">
                            <input type="email" name="floating_email" id="floating_email"
                                v-model="email"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required="">
                            <label for="floating_email"
                                class="peer-focus:text-[1rem] absolute text-[1.4rem] text-black-500 dark:text-black-500 duration-300 transform -translate-y-9 scale-75 top-5 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[rgb(44,98,247)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9">email
                                address
                            </label>
                            <span>{{erroEmail}}</span>
                        </div>
                        <div class="relative z-0 mb-6 w-full group p-[5px]">
                            <input @input="checkValidation" :type="userInfor.showType(!isShowPassword)" name="floating_password" id="floating_password"
                                v-model="password"
                                :class="{'focus:border-sky': isCorrectPassword ,'focus:border-red-600': !isCorrectPassword}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none peer"
                                placeholder=" " required="">
                            <button-eye-slash @click="isShowPassword=!isShowPassword" v-if="!isShowPassword"  class="top-6"></button-eye-slash>
                            <button-eye @click="isShowPassword=!isShowPassword" v-else class="top-6"></button-eye>
                            <label for="floating_password" :class="{'peer-focus:text-sky': isCorrectPassword ,'peer-focus:text-red-600': !isCorrectPassword}" class="peer-focus:text-[1rem] absolute text-[1.4rem] text-black-500 dark:text-black-500 duration-300 transform -translate-y-9 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9">password</label>
                            <span class="text-red-600">{{erroPassword}}</span>
                        </div>
                        <div class="text-center text-[1.1rem] text-bold  text-[#2EA3F2] pb-2 underline ">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div >
                            <div v-if="showLoading" class="bg-sky flex justify-center p-[5.7px] rounded-md">
                                <button-loading class="text-[1rem]"></button-loading>
                            </div>
                            <button @click="login" v-else type="button"
                                class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {userInformations} from "../store/userStore";
    import { manageCookies } from "@/store/cookie";
    import axiosClient from "../axios-http";
    export default {
    setup(){
        const  userCookie = manageCookies();
        const userInfor = userInformations();
        return {
            userInfor,
            userCookie,
        }
    },
    data(){
        return {
            isShowPassword:false,
            email: "",
            password: "",
            erroEmail: "",
            erroPassword: "",
            showLoading: false,
            isCorrectPassword: false,
            isCorrectEmail: false,
        }
    },
    methods: {
        login(){
            if(this.checkValidation()){
                this.showLoading = true;
                let user = {email: this.email, password: this.password}
                axiosClient.post('users/login', user).then( res => {
                    this.showLoading = false;
                    this.userCookie.setCookie('user_token', res.data.token,30)
                    this.userCookie.setCookie('user_id', res.data.user.id,30)
                    this.userCookie.setCookie('user_role', res.data.user.role,30)
                    if(res.data.user.role == 'ero'){
                        console.log(res.data.user)
                        this.$router.push('explore')
                        window.location.reload()
                    }else if(res.data.user.role == 'alumni'){
                        this.$router.go('explore')
                    }
                }).catch(()=>{ 
                    this.showLoading = false;
                })
            }
        },
        emailValidation(email){
            if (email.length>8){
                if(email.includes('@') && email.includes('.')){
                    this.erroEmail = ''
                    return true
                }
            }
            return false
        },
        checkValidation(){
            if(this.password.length > 7){
                this.isCorrectPassword = true;
                this.erroPassword = '';
            }else{
                this.isCorrectPassword = false;
                this.erroPassword = "Password must creater or equel 8 characters!"
            }
            this.isCorrectEmail = this.emailValidation(this.email);
            if(this.isCorrectPassword && this.isCorrectEmail){
                return true;
            }else{
                return false;
            }
        }
    }
}
</script>

<style>

</style>
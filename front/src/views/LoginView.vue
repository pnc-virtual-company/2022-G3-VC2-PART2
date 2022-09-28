<template>
    <div class="flex justify-center items-center">
        <div v-if="!isAlumniRegister && !isEroRegister" class="flex w-[95%] mt-[7rem] justify-center items-center m-auto"> 
            <div class="w-[40%]">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[60%]">
            </div>
            <div class="w-[60%]">
                <header class="text-center text-[3rem] font-medium ml-[90px]">
                    <p class="text-[#2EA3F2]">WELCOME BACK</p>
                </header>
                <div class="form shadow shadow-gray-500 w-[80%] ml-[120px] bg-white opacity-[80%] p-[10px] rounded-[7px]">
                    <form class="py-[5px] px-[20px]" @submit.prevent="login">
                        <div class="relative w-full group p-[5px] mt-5">
                            <input type="email" ref="emailField"
                                v-model="email"
                                class="block py-1 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Email" required="true">
                            <span>{{erroEmail}}</span>
                        </div>
                        <div class="relative w-full group p-[5px] mt-3">
                            <input @input="checkValidation" :type="userInfor.showType(!isShowPassword)"
                                v-model="password"
                                :class="{'focus:border-sky': isCorrectPassword ,'focus:border-red-600': !isCorrectPassword}"
                                class="block py-1 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none peer"
                                placeholder="Password" required="true">
                            <button-eye-slash @click="isShowPassword=!isShowPassword" v-if="!isShowPassword"  class="top-5"></button-eye-slash>
                            <button-eye @click="isShowPassword=!isShowPassword" v-else class="top-5"></button-eye>
                            <span class="text-red-600">{{erroPassword}}</span>
                        </div>

                        <error-message v-if="errorMessage" class="text-lg">{{ errorMessage }}</error-message>

                        <div class="text-center text-[1.1rem] text-bold  text-[#2EA3F2] pb-2 underline mt-1">
                            <a><router-link to="/forgot_password">Forgot your password?</router-link></a>
                        </div>
                        <div class="w-full box-border mt-2">
                            <div v-if="showLoading" class=" box-border bg-sky flex justify-center p-[5.7px] rounded-md">
                                <button-loading class="text-[1.1rem]"></button-loading>
                            </div>
                            <button v-else type="submit" class=" box-border shadow shadow-gray-500 text-white bg-sky hover:bg-blue-500 focus:ring-4 outline-none font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="w-full text-center mt-4 mb-4">
                        <p class="font-medium text-[17px] mb-2">Create an account</p>
                        <router-link to="signup">
                            <button type="button" class="shadow shadow-gray-500 bg-white text-sky-hover outline-none font-bold border-2 border-sky-hover rounded-lg text-[1.1rem] w-[250px] px-5 py-2 text-center hover:w-[255px]">
                                Sign up
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <alumni-register v-if="isAlumniRegister" @saveAlumniRegister="saveAlumniRegister"></alumni-register>
        <ero-register v-if="isEroRegister" @saveEroRegister="saveEroRegister"></ero-register>
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
                errorMessage: null,
                isAlumniRegister: false,
                isEroRegister: false,
                saveUserId: null,
            }
        },

        methods: {

            login(){
                if(this.checkValidation()){
                    this.showLoading = true;
                    let user = {email: this.email, password: this.password}
                    axiosClient.post('users/login', user).then( res => {
                        let userId = this.$CryptoJS.AES.encrypt(res.data.user.id.toString(), "Screat id").toString();
                        let userRole = this.$CryptoJS.AES.encrypt(res.data.user.role, "Screat role").toString();
                        this.showLoading = false;
                        if (res.data.user.first_name && res.data.user.last_name) {
                            this.userCookie.setCookie('user_token', res.data.token,30)
                            this.userCookie.setCookie('user_id', userId,30)
                            this.userCookie.setCookie('user_role', userRole,30)
                            if(res.data.user.role == 'alumni'){
                                this.$router.go('profile')
                            }else if(res.data.user.role == 'ero'){
                                this.$router.go('ero_profile')
                            }else if (res.data.user.role == 'admin') {
                                this.$router.go('manage');
                            }
                        } else {
                            this.saveUserId = res.data.user.id;
                            if(res.data.user.role == 'alumni'){
                                this.isAlumniRegister = true;
                            }else if(res.data.user.role == 'ero'){
                                this.isEroRegister = true;
                            }
                        }
                    }).catch(()=>{ 
                        this.showLoading = false;
                        this.errorMessage = "Incorrect email or password!";
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
            },

            saveEroRegister(data) {
                axiosClient.put('/eros/register/' + this.saveUserId, data).then((res) => {
                    let userId = this.$CryptoJS.AES.encrypt(res.data.user.id.toString(), "Screat id").toString();
                    let userRole = this.$CryptoJS.AES.encrypt(res.data.user.role, "Screat role").toString();
                    this.userCookie.setCookie('user_token', res.data.token,30)
                    this.userCookie.setCookie('user_id', userId,30)
                    this.userCookie.setCookie('user_role', userRole,30)
                    this.$router.go('/ero_profile');
                });
            },
            
            saveAlumniRegister(data) {
                axiosClient.put('/alumnis/register/' + this.saveUserId, data).then((res) => {
                    let userId = this.$CryptoJS.AES.encrypt(res.data.user.id.toString(), "Screat id").toString();
                    let userRole = this.$CryptoJS.AES.encrypt(res.data.user.role, "Screat role").toString();
                    this.userCookie.setCookie('user_token', res.data.token,30)
                    this.userCookie.setCookie('user_id', userId,30)
                    this.userCookie.setCookie('user_role', userRole,30)
                    this.$router.go('/profile');
                });
            }
        },

        mounted() {
            if (!this.isAlumniRegister && !this.isEroRegister) {
                this.$refs.emailField.focus();
            }
        }
    }
</script>
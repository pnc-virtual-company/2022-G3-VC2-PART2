<template>
    <div>
        <div v-if="!userId" class="flex items-center w-[95%] m-auto mt-[13rem]">
            <div class="w-[40%]">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[70%]">
            </div>
            <div class="w-[60%] ">
                <div class="form  w-[80%] shadow shadow-gray-400 ml-[120px] bg-white opacity-[80%] p-[10px] rounded-[7px]">
                    <form @submit.prevent="getVerifyCode" class="p-[5px]">
                    <h1 class="text-[#2EA3F2] text-[2.5rem] text-center">Fogot Password</h1>
                    <p class="text-[#2EA3F2] text-center text-[1.2rem] w-[60%] m-auto">Enter your email to get verification codes</p>
                        <div class="relative z-0 mb-6 w-full group p-[5px] flex">
                            <div class=" mb-[-1.22px]  w-[90%] m-auto flex ">
                                <span class=" inline-flex items-center p-2 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer text-sm rounded-l-md border-b-2 border-gray-300 ">
                                   <img src="../assets/email.png" alt="">
                                </span>
                                    <input type="email" v-model="email"
                                        class=" w-full text-lg pl-2 border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer "
                                        placeholder="Email" required="true">                               
                            </div>
                        </div>

                        <error-message v-if="isIncorrectEmail">Incorect email address!</error-message>
                        
                        <div class="z-0 mb-6 w-full group p-[5px] flex" >
                            <div v-if="showLoading" class="w-[90%] m-auto box-border bg-sky flex justify-center p-[5.7px] rounded-md">
                                <button-loading class="text-[1.1rem]"></button-loading>
                            </div>
                            <button v-else type="submit"
                                class="w-[90%] ml-auto m-auto text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {userInformations} from "../store/userStore";
    import axiosClient from "../axios-http";
    export default {
        setup(){
            const userInfor = userInformations();
            return {
                userInfor,
            }
        },

        data() {
            return {
                email: '',
                isIncorrectEmail: false,
                showLoading: false,
            }
        },

        methods: {
            getVerifyCode() {
                this.isIncorrectEmail = false;
                this.showLoading = true;
                let verifyCode =  this.userInfor.generateVerifyCode();
                axiosClient.put('/verify_code', {email: this.email, verify_code: verifyCode}).then((res) => {
                    this.userInfor.storeEmail(this.email);
                    console.log(res.data);
                    this.showLoading = false;
                    this.$router.push('/verify_code');
                }).catch(() => {
                    this.showLoading = false;
                    this.isIncorrectEmail = true;
                })
            }
        },
    }
</script>

<style>

</style>
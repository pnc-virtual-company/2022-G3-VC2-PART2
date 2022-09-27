<template>
    <div>
        <div v-if="!userId" class="flex  w-[95%] m-auto items-center mt-[12rem]">
            <div class=" w-[40%]">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[60%]">
            </div>
            <div class="w-[60%] ">
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[80%] shadow shadow-gray-400 p-[10px] rounded-[7px]">
                    <form @submit.prevent="verify" class="p-[5px]">
                        <h1 class="text-[#2EA3F2] text-[2.5rem] text-center">Verify Code</h1>
                        <p class="text-[#2EA3F2] text-center text-[1.2rem] w-[80%] m-auto">Please enter the 6-digits verification code we sent via Gamil: {{ userInfor.getVerifyCodeEmail }}</p>
                        <div class="relative z-0 mb-6 w-full group flex mt-6">
                            <div class="w-[90%] m-auto flex justify-center items-center ">
                                    <input type="text" ref="verifyField" v-model="verifyCode" :class="{'text-2xl font-bold': verifyCode, 'text-lg': !verifyCode}"
                                        class="w-[23rem] h-[3.5rem] uppercase border-[3px] rounded-md text-center border-gray-500 px-[10px] py-2 outline-sky"
                                        placeholder="VERIFY CODE" required="true">                              
                            </div>
                        </div>

                        <error-message v-if="isIncorrectCode">Incorect verification code!</error-message>
                        
                        <div class="z-0 mb-6 w-full group p-[5px] flex" >
                            <div v-if="showLoading" class="w-[90%] m-auto box-border bg-sky flex justify-center p-[5.7px] rounded-md">
                                <button-loading class="text-[1.1rem]"></button-loading>
                            </div>
                            <button v-else type="submit"
                                class="w-[90%] text-center ml-auto m-auto text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <create-new-password v-if="userId" :userId="userId"></create-new-password>
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
                verifyCode: '',
                userId: null,
                showLoading: false,
                isIncorrectCode: false
            }
        },

        methods: {
            verify() {
                this.showLoading = true;
                this.isIncorrectCode = false;
                axiosClient.post('/users/verify', {email: this.userInfor.getVerifyCodeEmail, verify_code: this.verifyCode}).then((res) => {
                    this.userId = res.data;
                    this.showLoading = false;
                    this.userInfor.storeEmail(null);
                }).catch(() => {
                    this.showLoading = false;
                    this.isIncorrectCode = true;
                })
            }
        },

        mounted() {
            this.$refs.verifyField.focus();
        }
    }
</script>

<style>

</style>
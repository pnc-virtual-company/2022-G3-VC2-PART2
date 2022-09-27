<template>
    <div>
        <div class="flex items-center w-[95%] m-auto mt-[12rem] ">
             <div class=" w-[40%]">
                        <img src="../../assets/Logo-pn.png" class="w-[100%] h-[60%]">
                    </div>
            <div class=" w-[60%]">
                <form @submit.prevent="savePassword" class="w-[80%] m-auto bg-white opacity-[80%] shadow shadow-gray-400 p-[10px] rounded-[7px]">
                    <p class="mt-0 text-2xl font-bold text-center">Create New Password</p>
                    <p class="w-[80%] text-center m-auto text-gray-600 text-[17px]">This password will be saved as your current password, then you can use is to Login into your account</p>
                    <div class="w-[90%] relative m-auto mt-3 bg-white">
                        <span class="bg-white text-lg font-medium">New password</span>
                        <div class="flex items-center">
                            <input @input="checkValidation" v-model="myNewPassword" ref="newPasswordField" :type="showType(newpassword)" required="true" class="font-normal text-lg  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky">
                            <button-eye-slash @click="newpassword = !newpassword" v-if="newpassword" ></button-eye-slash>
                            <button-eye @click="newpassword = !newpassword" v-else></button-eye>
                        </div>
                    </div>
                    <div class="w-[90%] relative m-auto mt-3 bg-white">
                        <span class="bg-white text-lg font-medium">New Password(Confirmation<span class="text-[rgb(243,68,68)]">*</span>)</span>
                        <div class="flex items-center">
                            <input @input="checkValidation" v-model="myConfirmNewPassword" :type="showType(showNewPassword)"  required="true"  class="font-normal text-lg  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky">
                            <button-eye-slash @click="showNewPassword = !showNewPassword" v-if="showNewPassword" ></button-eye-slash>
                            <button-eye @click="showNewPassword = !showNewPassword" v-else></button-eye>
                        </div>
                    </div>
                    <error-message class="text-red-400 mt-4 text-center text-lg">{{errorMessage}}</error-message>
                    <div class="w-[90%]  m-auto pb-4 mt-2">
                        <div v-if="showLoading" class="w-[90%] m-auto box-border bg-sky flex justify-center p-[5.7px] rounded-md">
                            <button-loading class="text-[1.1rem]"></button-loading>
                        </div>
                        <button v-else type="submit"
                            class="w-[100%] ml-auto m-auto text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import axiosClient from "../../axios-http";
    export default {
        props: ['userId'],

        data(){
            return{
                newpassword:true,
                showNewPassword: true,
                myNewPassword: '',
                myConfirmNewPassword: '',
                errorMessage: null,
            }
        },
        methods: {
            showType(isPassword){
                if(isPassword){
                    return 'password';
                }else{
                    return 'text';
                }
            },

            savePassword() {
                if (this.myNewPassword == this.myConfirmNewPassword) {
                    this.errorMessage = null,
                    this.showLoading = true;
                    axiosClient.post('/users/create_password/' + this.userId, {password: this.myNewPassword}).then(() => {
                        this.showLoading = false;
                        this.$router.push('/login');
                    }).catch(() => {
                        this.showLoading = false;
                    })
                } else {
                    this.errorMessage = "Confirm Password must be the same as New Password!"
                }
            }
        },

        computed:{
            isCompleted(){
                return this.completed;
            }
        },

        mounted() {
            this.$refs.newPasswordField.focus();
        }
    }
</script>
<template>
    <popup-component>
        <card-components class="w-[40%]">
            <div class="w-full relative mt-3 bg-white">
                <p class="mt-0 text-2xl font-bold">Reset your password</p>
                <div class="w-full relative mt-3 bg-white">
                    <span class="bg-white text-lg font-medium">Current password:</span>
                    <div class="flex items-center">
                        <input @input="checkValidation" :type="showType(showOldPassword)" id="website-admin" v-model="oldPassword" :class="{'outline-red-400': !isOldPassword && oldPassword != ''}" class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" placeholder="Current password">
                        <button-eye-slash @click="showOldPassword = !showOldPassword" v-if="showOldPassword" ></button-eye-slash>
                        <button-eye @click="showOldPassword = !showOldPassword" v-else></button-eye>
                    </div>
                </div>
                <div class="w-full relative mt-3 bg-white">
                    <span class="bg-white text-lg font-medium">New password:</span>
                    <div class="flex items-center">
                        <input @input="checkValidation" :type="showType(showConfirmPassword)" id="website-admin" v-model="newPassword" :class="{'outline-red-400': !isNewPassword & newPassword !=''} " class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" placeholder="New password">
                        <button-eye-slash @click="showConfirmPassword = !showConfirmPassword" v-if="showConfirmPassword" ></button-eye-slash>
                        <button-eye @click="showConfirmPassword = !showConfirmPassword" v-else></button-eye>
                    </div>
                </div>
                <div class="w-full relative mt-3 bg-white">
                    <span class="bg-white text-lg font-medium">Confirm new password:</span>
                    <div class="flex items-center">
                        <input @input="checkValidation" :type="showType(showNewPassword)" id="website-admin" :class="{'outline-red-400': !isConfirmPassword && confirmPassword !=''}" class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" v-model="confirmPassword" placeholder="Confirm new password">
                        <button-eye-slash @click="showNewPassword = !showNewPassword" v-if="showNewPassword" ></button-eye-slash>
                        <button-eye @click="showNewPassword = !showNewPassword" v-else></button-eye>
                    </div>
                </div>
                <h2 class="text-red-400 mt-4 text-center text-lg">{{message}}</h2>
                <div class="flex justify-end w-full mt-5">
                    <button-components @click="$emit('click-reset')" class="mr-3 font-bold bg-[#a0a0a0] hover:bg-[#969696] text-white border-none">Cancel</button-components>
                    <button-loading v-if="showLoading"></button-loading>
                    <button-components v-else @click="resetPassword" class="bg-sky font-bold hover:bg-sky-hover text-white border-none">Save</button-components>
                </div>
            </div>
        </card-components>
    </popup-component>
</template>
<script>
    import {userInformations} from "../../../store/userStore";
    import axios from "../../../axios-http";
    export default {
        setup(){
            const userInfor = userInformations();
            return {
                userInfor
            }
        },
        data(){
            return{
                showLoading: false,
                oldPassword:'',
                newPassword:'',
                confirmPassword:'',
                isOldPassword:false,
                isNewPassword:false,
                isConfirmPassword:false,
                completed:false,
                message:'',
                showOldPassword: true,
                showNewPassword: true,
                showConfirmPassword: true,
            }
        },
        methods: {
            resetPassword(){
                if(this.isCompleted){
                    this.showLoading = true;
                    let userPassword = {confirm_current_password:this.oldPassword, new_password:this.newPassword};
                    axios.put('/users/update/password/9', userPassword).then(res => {
                        this.showLoading = false;
                        if(res.data.message == 'password is changed'){
                            this.$emit('click-reset');
                        }else{
                            this.message = res.data.message;
                        }
                    })
                }else{
                    if(this.oldPassword.length < 8 || this.newPassword.length < 8 ){
                        this.message = 'Password must creater or equel 8 characters!';
                    }else if(this.newPassword != this.confirmPassword){
                        this.message = 'Confirm password must the same as new password!';
                    }
                }
            },
            checkValidation(){
                if(this.oldPassword.length > 7){
                   this.isOldPassword = true;
                }else{
                    this.isOldPassword = false;
                }
                if(this.newPassword.length > 7){
                    this.isNewPassword = true;
                }else{
                    this.isNewPassword = false;
                }
                if(this.confirmPassword == this.newPassword){
                    this.isConfirmPassword = true;
                }else{
                    this.isConfirmPassword = false;
                }
                if(this.isNewPassword && this.isConfirmPassword && this.isOldPassword){
                    this.completed = true;
                }else{
                    this.completed = false;
                }
            },
            showType(isPassword){
                if(isPassword){
                    return 'password';
                }else{
                    return 'text';
                }
            },
        },
        computed:{
            isCompleted(){
                return this.completed;
            }
        }
    }
</script>
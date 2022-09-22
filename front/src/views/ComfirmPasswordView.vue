<template>
    <div>
        <div class="flex w-[95%] m-auto  ">
             <div class=" w-[40%]  flex justify-center mt-[7%] align-items-md-center">
                        <img src="../assets/Logo-pn.png" class="w-[100%] h-[56%] mt-[20%]">
                    </div>
            <div class=" w-[60%] mt-[12%] ">
                <div class="w-[80%] m-auto bg-white opacity-[60%] p-[10px] rounded-[7px]">
                    <p class="mt-0 text-2xl font-bold text-center">Comfirm Password</p>
                    <div class="w-[90%] relative m-auto mt-3 bg-white">
                        <span class="bg-white text-lg font-medium">New password</span>
                        <div class="flex items-center">
                            <input @input="checkValidation" :type="showType(newpassword)" id="website-admin"  class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky">
                            <button-eye-slash @click="newpassword = !newpassword" v-if="newpassword" ></button-eye-slash>
                            <button-eye @click="newpassword = !newpassword" v-else></button-eye>
                        </div>
                    </div>
                    <div class="w-[90%] relative m-auto mt-3 bg-white">
                        <span class="bg-white text-lg font-medium">New Password(Confirmation<span class="text-[rgb(243,68,68)]">*</span>)</span>
                        <div class="flex items-center">
                            <input @input="checkValidation" :type="showType(showNewPassword)" id="website-admin"    class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky">
                            <button-eye-slash @click="showNewPassword = !showNewPassword" v-if="showNewPassword" ></button-eye-slash>
                            <button-eye @click="showNewPassword = !showNewPassword" v-else></button-eye>
                        </div>
                    </div>
                    <h2 class="text-red-400 mt-4 text-center text-lg">{{message}}</h2>
                    <div class="w-[90%]  m-auto pb-4">
                        <button type="submit"
                            class="w-[100%] ml-auto m-auto text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >Reset Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
       
        data(){
            return{
                newpassword:true,
                showNewPassword: true,
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
        },
        computed:{
            isCompleted(){
                return this.completed;
            }
        }
    }
</script>
<template>
    <div>
        <div class="flex  w-[95%] m-auto mt-[6%]">
            <div class=" w-[40%] mt-[1%]   flex justify-center  align-items-md-center">
                <img src="../../assets/Logo-pn.png" class="w-[100%] h-[60%] mt-[20%]">
            </div>
            <div class=" w-[60%] ">
                <div class="mt-[8%]">
                    <header class="text-center text-[3rem] ml-[80px]">
                        <p class="text-[#2EA3F2]">Register Account </p>
                    </header>
                    <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[20px] rounded-[7px]">
                        <form class="p-[3px]" @submit.prevent="registerEro">
                            <div class="grid gap-6 mb-6 md:grid-cols-2 w-[100%] m-auto">
                                <div>
                                    <input type="text" v-model="first_name" id="first_name" class="focus:border-blue-600 outline-none bg-gray-100 border-b-2 border-gray-300 text-black-900 text-lg   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="First name" >
                                </div>
                                <div>
                                    <input type="text" v-model="last_name" id="last_name" class="focus:border-blue-600 outline-none bg-gray-100 border-b-2 border-gray-300 text-black-900 text-lg   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last name" >
                                </div>
                            </div>
                            <div class="w-[100%] m-auto">
                                <button type="submit" class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { userInformations } from "@/store/userStore"
import axiosClient from "../../axios-http";
export default {
    setup() {
        const userData = userInformations();
        return {
        userData
        }
    },
    data(){
        return {
            first_name:"",
            last_name: "",
        }
    },
    methods: {
        registerEro(){
            if(this.first_name && this.last_name){
                let data = {
                    first_name : this.first_name,
                    last_name : this.last_name,
                }
                axiosClient.put('/eros/register/' + this.userData.userData.id, data).then((res) => {
                    console.log(res.data);
                    this.$router.push('/manage');
                });
            }
        }
    }
}
</script>

<style>

</style>



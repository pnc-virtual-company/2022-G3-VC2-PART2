<template>
    <div>
        <div class="flex items-center w-[95%] m-auto mt-6">
            <div class=" w-[40%]  flex justify-center  align-items-md-center ">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[56%]">
            </div>
            <div class=" w-[60%]">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Sign up </p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[65%] p-[15px] rounded-[7px]">
                    <form @submit.prevent="signUp" class="p-[2px]">
                        <div class="grid gap-6 mb-4 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input v-model="first_name" type="text" id="first_name"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="First name">
                            </div>
                            <div>
                                <input v-model="last_name" type="text" id="last_name"
                                    class="block px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-4 md:grid-cols-1 w-[90%] m-auto">
                            <input v-model="email" type="email" name="email" id=""
                                class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Email" required="">
                        </div>
                        <div class="grid gap-6 mb-4 md:grid-cols-2 w-[90%] m-auto ">
                            <div>
                                <input v-model="batch" type="text" id="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Batch">
                            </div>

                            <div>        
                                <select v-model="major" class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option value="web">WEB</option>
                                    <option value="sna">SNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-4 md:grid-cols-2 w-[90%] m-auto ">
                            <div>
                                <input  v-model="telegram" type="text" id="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Telegram">
                            </div>
                            
                            <div>
                                <input v-model="phone" type="phone" id="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Phone">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-4 md:grid-cols-1 w-[90%] m-auto ">
                            <div>
                                <input v-model="address" type="text" id="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Address">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-4 md:grid-cols-1 w-[90%] m-auto">
                            <input v-model="birth_date" type="text" name="date_birth" id="date_birth"
                                class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Date of Birth: e.g: 2022-08-27 " required="">
                        </div>
                       
                        <div class="grid gap-3 mb-2 md:grid-cols-1 w-[90%] m-auto">
                            <div class="flex items-center mb-4" >
                                <div class="flex items-center">
                                    <input v-model="gender" id="default-radio-1" type="radio" value="male" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300  ">
                                    <label for="default-radio-1"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300 outline-none border-none">Male</label>
                                </div>
                                <div class="flex items-center ml-3">
                                    <input v-model="gender" id="default-radio-2" type="radio" value="female" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300  ">
                                    <label for="default-radio-2"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300 outline-none border-none">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="w-[90%] m-auto pb-4">
                            <button type="submit"
                                class="px-5 py-1 text-white w-full bg-[#2EA3F2] hover:bg-blue-00 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem]    text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
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
                first_name:"",
                last_name:"",
                email:"",
                batch:"",
                telegram:"",
                phone:"",
                address:"",
                birth_date:"",
                gender:"",
                major: "",
            }
        },
        methods:{
            signUp() {
                if (this.first_name && this.last_name && this.email &&this.batch && this.telegram && this.phone &&this.address &&this.birth_date &&this.gender ){
                    console.log('sign');
                    let user = {
                        first_name : this.first_name,
                        last_name : this.last_name,
                        email : this.email,
                        batch : this.batch,
                        telegram : this.telegram,
                        phone : this.phone,
                        address : this.address,
                        birth_date : this.birth_date,
                        gender : this.gender,
                    }
                    this.userData.signUp(user)
                }
            }
        }
    }
</script>

<style>

</style>



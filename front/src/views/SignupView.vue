<template>
    <div>
        <div class="flex items-center w-[95%] m-auto mt-20">
            <div class="w-[40%]">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[60%]">
            </div>
            <div class="w-[60%]">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Sign up </p>
                </header>
                <div class="form w-[80%] ml-[120px] bg-white opacity-[80%] p-[15px] rounded-[7px] shadow shadow-gray-400">
                    <form @submit.prevent="signUp" class="relative p-[2px]">
                        <router-link to="/login" class="absolute -top-1 text-sky-hover flex items-center font-bold text-[20px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                            </svg> 
                            Back
                        </router-link>

                        <div class="grid gap-6 md:grid-cols-2 w-[90%] m-auto mt-8">
                            <div>
                                <input v-model="first_name" type="text" id="first_name"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600"
                                    placeholder="First name" required="true">
                            </div>
                            <div>
                                <input v-model="last_name" type="text" id="last_name"
                                    class="block px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600"
                                    placeholder="Last name" required="true">
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-1 w-[90%] m-auto mt-4">
                            <input v-model="email" type="email" name="email" id=""
                                class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600"
                                placeholder="Email" required="true">
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 w-[90%] m-auto mt-4">
                            <div>
                                <input v-model="batch" type="text"
                                    class="block w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 "
                                    placeholder="Batch" required="true">
                            </div>

                            <div class="border-b-2 border-gray-300">        
                                <select v-model="major" class="outline-none w-full">
                                    <option value="Major" hidden class="text-gray-300">Select a major</option>
                                    <option value="web">WEB</option>
                                    <option value="sna">SNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 w-[90%] m-auto mt-4">
                            <div>
                                <input  v-model="telegram" type="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 "
                                    placeholder="Telegram" required="true">
                            </div>
                            
                            <div>
                                <input v-model="phone" type="phone"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 "
                                    placeholder="Phone" required="true">
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-1 w-[90%] m-auto mt-4">
                            <div>
                                <input v-model="address" type="text"
                                    class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 "
                                    placeholder="Address" required="true">
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-1 w-[90%] m-auto mt-4">
                            <input v-model="birth_date" type="text" name="date_birth" id="date_birth"
                                class="block  px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600"
                                placeholder="Date of Birth: e.g: 2022-08-27 " required="true">
                        </div>
                       
                        <div class="grid gap-3 mb-2 md:grid-cols-1 w-[90%] m-auto mt-4">
                            <div class="flex items-center" >
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

                        <div class="w-[90%] m-auto pb-4 mt-5">
                            <button type="submit"
                                class="px-5 py-2 text-center text-white w-full focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] bg-sky hover:bg-sky-hover">Sign Up</button>
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
                gender:"male",
                major: "Major",
            }
        },
        methods:{
            signUp() {
                if (this.first_name && this.last_name && this.email &&this.batch && this.telegram && this.phone &&this.address &&this.birth_date &&this.gender && this.major != 'Major'){
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
                        major : this.major
                    }
                    this.userData.signUp(user)
                }
            }
        }
    }
</script>

<style>

</style>



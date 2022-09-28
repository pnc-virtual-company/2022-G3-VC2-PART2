<template>
    <div>
        <div class="flex items-center w-[95%] m-auto mt-[4.5rem]">
            <div class=" w-[40%]  flex justify-center align-items-md-center ">
                <img src="../../assets/Logo-pn.png" class="w-[100%] h-[60%] ">
            </div>
            <div class=" w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Register Account </p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[80%] shadow shadow-gray-400 p-[15px] rounded-[7px]">
                    <form @submit.prevent="registerAlumni" class="p-[2px]">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" v-model="firstName"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="First name">
                            </div>
                            <div>
                                <input type="text" v-model="lastName"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" v-model="batch"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Batch">
                            </div>
                            <div class="border-b-2 border-gray-300">        
                                <select v-model="major" class="outline-none w-full">
                                    <option value="Major" hidden class="text-gray-300">Select a major</option>
                                    <option value="web">WEB</option>
                                    <option value="sna">SNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto ">
                            <div>
                                <input type="text" v-model="phone"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Phone">
                            </div>
                            <div>
                                <input type="text" v-model="telegram"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Telegram">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="text" name="text" v-model="address"
                                class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" Address" required="">
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="text" name="date_birth" v-model="birthDate"
                                class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Date of Birth: e.g: 2022-08-27 " required="">
                        </div>
                        <div class="grid gap-3 mb-2 md:grid-cols-1 w-[90%] m-auto">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center">
                                    <input type="radio" value="male" name="default-radio" v-model="gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300  ">
                                    <label for="default-radio-1"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300 outline-none border-none">Male</label>
                                </div>
                                <div class="flex items-center ml-4">
                                    <input type="radio" value="famale" name="default-radio" v-model="gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 ">
                                    <label for="default-radio-2"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="w-[90%] m-auto pb-3">
                            <button type="submit"
                                class=" text-white w-full bg-[#2EA3F2] hover:bg-blue-00 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem]  px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                firstName:"",
                lastName: "",
                batch: "",
                major: "Major",
                phone: "",
                telegram: "",
                address: "",
                birthDate: "",
                gender: "male",
            }
        },
        methods: {
            registerAlumni(){
                if(this.firstName && this.lastName && this.batch && this.major != "Major" && this.phone && this.telegram && this.address && this.birthDate && this.gender){
                    let data = {
                        first_name : this.firstName,
                        last_name : this.lastName,
                        batch: this.batch,
                        major: this.major,
                        phone: this.phone,
                        telegram: this.telegram,
                        address: this.address,
                        birth_date: this.birthDate,
                        gender: this.gender,
                    }
                    this.$emit('saveAlumniRegister', data);
                }
            }
        }
    }
</script>

<style>

</style>



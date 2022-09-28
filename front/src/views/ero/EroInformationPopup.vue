<template>
    <popup-component>
        <card-components>
            <form @submit.prevent="saveUpdate" class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white">General Information</h1>
                <div class="flex flex-col bg-white mt-3">
                    <div class="flex w-full">
                        <div class="w-[50%] bg-white mr-2">
                            <span class="bg-white font-medium text-lg">First name:</span>
                            <div class="flex bg-white w-full mt-1">
                                <span :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                                </span>
                                <input v-model="first_name" @input="checkValidate" type="text" :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="rounded-none outline-sky bg-white text-lg block flex-1 w-full border-2 p-2 rounded-r-md" placeholder="First name">
                            </div>
                        </div> 
                        <div class="w-[50%] bg-white mr-2">
                            <span class="bg-white font-medium text-lg">Last name:</span>
                            <div class="flex bg-white w-full mt-1">
                                <span :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                                </span>
                                <input v-model="last_name" @input="checkValidate" type="text" :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="rounded-none outline-sky bg-white text-lg block flex-1 w-full border-2 p-2 rounded-r-md" placeholder="Last name">
                            </div>
                        </div> 
                    </div>
                    <div class="w-full bg-white mr-2 mt-3">
                        <span class="bg-white font-medium text-lg">Email:</span>
                        <div class="flex bg-white w-full mt-1">
                            <span :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                            </span>
                            <input v-model="email" @input="checkValidate" type="text" :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="rounded-none outline-sky bg-white text-lg block flex-1 w-full border-2 p-2 rounded-r-md" placeholder="Email">
                        </div>
                    </div>  
                </div>
                <error-message v-if="errorMessage">{{ errorMessage }}</error-message>
                <div class="bg-white flex justify-end mt-6">
                    <button @click="$emit('click-popup')" class="border-sky border rounded-md py-2 w-[141px] bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">Cancel</button>
                    <button type="submit" class="border-sky border rounded-md py-2 w-[141px] ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">Save</button>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>

<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data,
            }
        },

        data() {
            return {
                email: '',
                first_name: '',
                last_name: '',
                errorMessage: null,
                isEmailNull: false,
            }
        },

        methods: {
            saveUpdate() {
                if (this.email) {
                    if (this.email.includes('@')) {
                        if (!this.isEmailExisted(this.email)) {
                            this.$emit('save-update', {email: this.email, first_name: this.first_name, last_name: this.last_name});
                            this.$emit('click-popup');
                        }  else {
                            this.isEmailNull = true;
                            this.errorMessage = "This email is already used!";
                        }
                    }  else {
                        this.isEmailNull = true;
                        this.errorMessage = "Incorrect email address!";
                    }
                } else {
                    this.isEmailNull = true;
                    this.errorMessage = "Please input email address";
                }
            },

            checkValidate() {
                if (this.email) {
                    this.isEmailNull = false;
                    this.errorMessage = null;
                }
            },

            isEmailExisted(myEmail){
                for (let eachEmail of this.data.userEmails){
                    if(eachEmail.email == myEmail){
                        return true;
                    }
                }
                return false;
            },
        },

        created() {
            this.email = this.data.userData.email;
            this.first_name = this.data.userData.first_name;
            this.last_name = this.data.userData.last_name;
        }
    }
</script>
<template>
    <popup-component>
        <card-components >
            <h1 v-if="invitedSuccess" class="text-center text-2xl text-green-500 bg-white" >Your inviting is success</h1>
            <div v-else class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Invite Alumni</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <div :class="{'border-gray-300': !isEmailNull, 'border-red-500': isEmailNull}" class="flex bg-white mt-1 border-b-2">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-sky">
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                </svg>
                            </span>
                            <input v-model="email" @input="checkValidate" type="email" id="website-admin" placeholder="Email" required class="text-[1.2rem] rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full p-2 rounded-r-md outline-none" >
                        </div>
                        <error-message v-if="errorMessage">{{ errorMessage }}</error-message>
                    </div>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white text-[1rem] font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components  class="ml-3 bg-sky font-medium text-white text-[1rem] hover:bg-sky-hover" @click="inviteAlumni">
                        Invite
                    </button-components>
                </div>
            </div>
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
        
        data(){
            return{
                invitedSuccess: false,
                email:'',
                isEmailNull: false,
                errorMessage: null
            }
        },

        methods:{
            generatePassword(){
                var chars = "0123456789ABCDEFGHIJ0123456789KLMNOPQRSTU0123456789VWXYZabcdefghij0123456789klmnopq0123456789rstuvwxyz";
                var string_length = 8;
                var randomstring = '';
                for (var i=0; i<string_length; i++) {
                    var rnum = Math.floor(Math.random() * chars.length);
                    randomstring += chars.substring(rnum,rnum+1);
                }
                return randomstring;
            },

            inviteAlumni(){
                if (this.email) {
                    if (this.email.includes('@')) {
                        if (!this.isEmailExisted(this.email)) {
                            let newInvite = {email:this.email, role: 'alumni', password: this.generatePassword()}
                            this.$emit("addInviteAlumni", newInvite);
                            this.invitedSuccess = !this.invitedSuccess;
                            setTimeout(() =>{
                                this.invitedSuccess = !this.invitedSuccess
                                this.$emit('click-popup')
                        }, 1500)
                            
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
        }
    }     
</script>
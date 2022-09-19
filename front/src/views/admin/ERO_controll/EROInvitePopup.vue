<template>
    <popup-component class="bg-green-200 ">
        <card-components >
            <form class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Invite ERO</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-b-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-sky">
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                </svg>
                            </span>
                            <input v-model ="email" type="text" id="website-admin" placeholder="email" class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-b-2 p-2 rounded-r-md outline-none" >
                        </div>
                    </div>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components @click="InviteERO" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                        Invite
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>

<script>
    export default {
        data(){
            return {
                email:'',
            }
        },
        methods:{
            generatePassword(){
                var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                var string_length = 8;
                var randomstring = '';
                for (var i=0; i<string_length; i++) {
                    var rnum = Math.floor(Math.random() * chars.length);
                    randomstring += chars.substring(rnum,rnum+1);
                }
                return randomstring;
            },
            InviteERO(){
                let newInvite = {email:this.email, role: 'ero', password: this.generatePassword()}
                console.log(newInvite)
                this.$emit("addInviteERO", newInvite);
            },
          
        }
    }
</script>
<template>
    <popup-component @click="checkClick" id="free-space">
        <div class="w-7/12 relative max-h-[95%] rounded bg-white">
            <div @click="$emit('close-details')" class="absolute top-2 right-2 p-1 cursor-pointer bg-white shadow opacity-60 shadow-black text-[1rem] rounded-full text-red-400 font-bold flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-red-600 text-2xl cursor-pointer">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="overflow-y-auto w-full h-full scroll-box rounded">
                <div class="w-full">
                    <div>
                        <img alt="Vue logo" class=" object-cover  object-center h-[45vh] w-full" v-if="userData" :src="data.getImage(userData.cover)">
                    </div>
                    <div class="flex justify-between items-end mt-[-6rem] ml-11">
                        <div class="flex flex-col items-center">
                            <div>
                                <img alt="Vue logo" class="object-cover  object-center w-[148px] h-[148px] rounded-full" v-if="userData" :src="data.getImage(userData.profile)" width="120">
                            </div>
                            <h1 v-if="userData" class="bg-white font-bold text-xl mt-2">{{userData.first_name}} {{userData.last_name}}</h1>
                        </div>
                    </div>
                </div>

                <hr class="w-[95%] m-auto border-gray-300 mt-3">
                <div class="w-11/12 p-[20px]    ">
                    <div class="bg-white flex">
                        <the-email>{{userData.email}}</the-email>
                    </div>
                </div>
            </div>
        </div>
    </popup-component>
</template>

<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data
            }
        },

        props: ['userId'],

        methods: {
            checkClick(e) {
                if (e.target.id == 'free-space') {
                    this.$emit('close-details');
                }
            },
        },

        data() {
            return {
                userData: null,
            }
        },

        created() {
            this.userData = this.data.eroList.find(ero => ero.id == this.userId)
        }
    }
</script>
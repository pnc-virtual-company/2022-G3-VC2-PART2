<template>
    <popup-component @click="checkClick" id="free-space">
        <div class="w-7/12 relative max-h-[90%] rounded-md bg-white py-[20px] px-[35px]">
            <div class="absolute top-2 right-5 p-1 opacity-60 text-[1rem] text-red-400 font-bold flex justify-center items-center">
                <svg @click="$emit('close-details')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-red-600 text-2xl cursor-pointer">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </div>

            <div>
                <p class="text-center text-2xl font-bold">General Information of alumni:</p>
                <p class="text-center text-sky-hover text-2xl font-bold capitalize mt-1">{{ account.first_name }} {{ account.last_name }}</p>
            </div>

            <div class="w-full h-full m-auto rounded text-[18px] mt-4">
                <hr class="w-full m-auto border-gray-300">
                <div class="mt-4">
                    <p class="bg-white">
                        <span class="font-medium">Email:</span> {{account.email}}
                    </p>
                </div>
                <div class="mt-4 flex justify-between">
                    <p class="bg-white w-[50%]">
                        <span class="font-medium">Phone:</span> {{account.alumni.phone}}
                    </p>
                    <p class="bg-white w-[40%] uppercase">
                        <span class="font-medium capitalize">Batch:</span> {{account.alumni.major}} - {{ account.alumni.batch }}
                    </p>
                </div>
                <div class="mt-4 flex justify-between">
                    <p class="bg-white w-[50%]">
                        <span class="font-medium">Telegram:</span> {{account.alumni.telegram}}
                    </p>
                    <p class="bg-white w-[40%] capitalize">
                        <span class="font-medium">Address:</span> {{account.alumni.address}}
                    </p>
                </div>
                <div class="mt-4 flex justify-between">
                    <p class="bg-white w-[50%] capitalize">
                        <span class="font-medium">Gender:</span> {{account.alumni.gender}}
                    </p>
                    <p class="bg-white w-[40%] capitalize">
                        <span class="font-medium">Birth date:</span> {{data.getFullDate(account.alumni.birth_date)}}
                    </p>
                </div>
            </div>

            <div class="w-full mt-6 flex justify-end">
                <button @click="data.acceptRequest(account.id); this.$emit('close-details');" class="bg-sky font-medium text-[18px] py-[0.60rem] px-4 rounded-md text-white hover:bg-sky-hover flex items-center mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Accept request
                </button>
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

        props: ['account'],

        methods: {
            checkClick(e) {
                if (e.target.id == 'free-space') {
                    this.$emit('close-details');
                }
            },
        },
    }
</script>
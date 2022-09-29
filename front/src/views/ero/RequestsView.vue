<template>
    <div v-if="data.alumniList" class="w-10/12 m-auto mt-[10px]">
        <p class="text-center font-bold text-2xl">All requests</p>
        <div class="w-full m-auto rounded max-h-[30.35rem] overflow-y-auto scroll-box mt-[15px]">
            <div v-if="unseenAccounts.length > 0">
                <div v-for="account of unseenAccounts" :key="account" :class="{ 'border-sky bg-[rgba(0,0,0,0.09)]': account.is_seen, 'border-orange-400 opacity-100 bg-white': !account.is_seen}" class="shadow shadow-gray-400 border-l-[4px] py-[10px] px-[17px] mb-2 rounded-md flex flex-col justify-between">
                    <div class="flex justify-between">
                        <p :class="{'text-gray-500': account.is_seen, 'text-black': !account.is_seen}" class="text-lg">
                            <span class="capitalize text-sky font-medium">{{ account.first_name }}</span> <span class="capitalize text-sky font-medium">{{ account.last_name }}</span> requests to create an account
                        </p>
                        <small class="text-stone-400">{{ account.created_at }}</small>
                    </div>
                    <div class="flex justify-between">
                        <div class="w-[21%] flex flex-col justify-evenly">
                            <span class="capitalize text-lg text-[#ada5a5]">
                                Name
                            </span>
                            <span :class="{'text-gray-500': account.is_seen, 'text-black': !account.is_seen}" class="text-lg font-meduim capitalize">
                                {{ account.first_name }} {{ account.last_name }}
                            </span>
                        </div>
                        <div class="w-[40%] flex flex-col justify-evenly">
                            <span class="capitalize text-lg text-[#ada5a5]">
                                Email
                            </span>
                            <span :class="{'text-gray-500': account.is_seen, 'text-black': !account.is_seen}" class="text-lg font-meduim">
                                {{ account.email }}  
                            </span>
                        </div>
                        <div class="w-[15%] flex flex-col justify-evenly">
                            <span class="capitalize text-lg text-[#ada5a5]">
                                Batch
                            </span>
                            <span :class="{'text-gray-500': account.is_seen, 'text-black': !account.is_seen}" class="uppercase text-lg font-meduim">
                                {{ account.alumni.major }} - {{ account.alumni.batch }}
                            </span>
                        </div>
                        <div class="w-[10%] flex flex-col justify-evenly">
                            <span class="capitalize text-lg text-[#ada5a5]">
                                Status
                            </span>
                            <span v-if="account.is_seen" class="capitalize text-lg font-semibold text-sky-hover">
                                Pending
                            </span>
                            <span v-else class="capitalize text-lg font-semibold text-orange-400">
                                New
                            </span>
                        </div>
                        <div class="w-[10%] text-center">
                            <span class="text-center text-[#ada5a5]">Actions</span>
                            <div class="flex justify-center items-center mt-1">
                                <button @click="viewRequest(account.id); data.seenRequest(account.id)" class="mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-sky hover:text-sky-hover cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                    </svg>
                                </button>
                                <button class="ml-4 flex justify-center items-center" @click="data.deleteRequest(account.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-sky cursor-pointer hover:text-sky-hover">
                                        <path class="cursor-pointer" fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="text-gray-400 text-[16.5px] h-full w-full flex flex-col justify-center items-center">
                <img src="../../assets/data-empty.png" class="w-40">
                <p>No any request for now!</p>
            </div>
        </div>

        <request-details v-if="isViewDetails" :account="unseenAccounts.find(account => account.id == viewAccountId)" @close-details="isViewDetails = false"></request-details>
    </div>
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
                isViewDetails: false,
                viewAccountId: null,
            }
        },

        methods: {
            viewRequest(id) {
                this.isViewDetails = true;
                this.viewAccountId = id;
            }
        },

        computed: {
            unseenAccounts() {
                if (this.data.unacceptedAlumni) {
                    return this.data.unacceptedAlumni.filter(alumni => !alumni.is_accepted).reverse();
                } else {
                    return [];
                }
            }
        }
    }
</script>
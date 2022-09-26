<template>
    <div class="w-10/12 m-auto">
        <input-search @search-keyword="updateKeyword"></input-search>
        <div class="flex justify-between">
            <div class="mt-4 flex">
                <button-components @click="currentView = 'invited'" :class="{ 'bg-sky text-white': currentView == 'invited', 'bg-white text-sky hover:bg-gray-200': currentView != 'invited' }" class="border-none shadow shadow-gray-400 py-2 text-[1rem] font-bold">Invited</button-components>
                <button-components @click="currentView = 'registered'" :class="{ 'bg-sky text-white': currentView == 'registered', 'bg-white text-sky hover:bg-gray-200': currentView != 'registered' }" class="border-none shadow shadow-gray-400 py-2 text-[1rem] bg-white font-bold ml-2">Registered</button-components>
                <div v-if="currentView != 'all'" @click="currentView = 'all'" class="cursor-pointer px-2 ml-2 bg-white shadow shadow-gray-400 text-[1rem] rounded-lg text-red-400 font-bold flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-red-600 text-2xl cursor-pointer">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <button-components @click="$emit('click-popup')" class="shadow shadow-gray-400 py-[0.55rem] text-[1rem] bg-sky text-white hover:bg-sky-hover font-bold border-none">Invite</button-components>
            </div>
        </div>
        <div  class="bg-sky w-full capitalize p-3 font-medium text-xl text-white rounded-md mt-4 text-center">
            <p>{{ currentView }} Alumni</p>
        </div>
        <div v-if="filteredAlumni">
            <card-list v-for="alumni of filteredAlumni" :key="alumni" @delete-item="data.deleteAlumni(alumni.id)">
                <template #title-5 >
                    <img :src="data.getImage(alumni.profile)" class="w-[55px] rounded-full">
                </template>
                <template #title-1>name</template>
                <template #text-1>
                    <p v-if="alumni.first_name && alumni.last_name">{{ alumni.first_name }} {{ alumni.last_name}}</p>
                    <p v-else class="text-gray-500">Unregistered</p>
                </template>
                <template #title-2>email</template>
                <template #text-2>{{ alumni.email }}</template>
                <template #title-3>gender</template>
                <template #text-3>
                    <p v-if="alumni.first_name && alumni.last_name">{{ alumni.alumni.gender }}</p>
                    <p v-else class="text-gray-500">Unregistered</p>
                </template>
                <template #title-4>Batch</template>
                <template #text-4>
                    <p v-if="alumni.first_name && alumni.last_name">{{ alumni.alumni.major}} {{ alumni.alumni.batch }}</p>
                    <p v-else class="text-gray-500">Unregistered</p>
                </template>
                <template #button-details>
                    <button @click="$emit('view-details', alumni.id)" v-if="alumni.first_name && alumni.last_name" class="mr-2 hover:bg-[#e6e6ec] rounded-full p-2 flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-sky cursor-pointer hover:text-sky-hover">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                    </button>
                    <button v-else class="invisible mr-2 hover:bg-[#e6e6ec] rounded-full p-2 flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-sky cursor-pointer hover:text-sky-hover">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                    </button>
                </template>
            </card-list>
        </div>
        <div v-if="!data.alumniList" class="mt-4 flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
            <img src="../../../assets/data-empty.png" class="w-40">
            <p>No any alumni for now!</p>
            <p>Click on button invite to invite some</p>
        </div>
        <div v-else-if="filteredAlumni.length <= 0" class="mt-4 m-auto flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
            <img src="../../../assets/no-results.png" class="w-40">
            <p>Nothing found!</p>
        </div>
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
                keyword: null,
                currentView: 'all',
            }
        },

        methods: {
            updateKeyword(newKeyword) {
                this.keyword = newKeyword;
            }
        },

        computed: {
            filteredAlumni() {
                let alumniList = [];
                if (this.currentView == 'all') {
                    if (this.keyword) {
                        let splitedKeywords = this.keyword.split(' ');
                        this.data.alumniList.forEach(eachAlumni => {
                            let isIncludesKeyword = false;
                            splitedKeywords.forEach(eachKeyword => {
                                if (eachKeyword) {
                                    if (eachAlumni.first_name && eachAlumni.last_name) {
                                        if (
                                            (eachAlumni.first_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.last_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.email.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.alumni.gender.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || ((eachAlumni.alumni.batch.toString()).toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.alumni.major.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        ) {
                                            isIncludesKeyword = true;
                                        }
                                    } else {
                                        if ((eachAlumni.email.toLowerCase()).includes(eachKeyword.toLowerCase())) {
                                            isIncludesKeyword = true;
                                        }
                                    }
                                }
                            })
    
                            if (isIncludesKeyword) {
                                alumniList.push(eachAlumni);
                            }
                        });
                    } else {
                        alumniList = this.data.alumniList;
                    }
                } else if (this.currentView == 'invited') {
                    let invitedAlumni = this.data.alumniList.filter(alumni => !alumni.first_name && !alumni.last_name);
                    if (this.keyword) {
                        let splitedKeywords = this.keyword.split(' ');
                        invitedAlumni.forEach(eachAlumni => {
                            let isIncludesKeyword = false;
                            splitedKeywords.forEach(eachKeyword => {
                                if (eachKeyword) {
                                    if ((eachAlumni.email.toLowerCase()).includes(eachKeyword.toLowerCase())) {
                                        isIncludesKeyword = true;
                                    }
                                }
                            })
    
                            if (isIncludesKeyword) {
                                alumniList.push(eachAlumni);
                            }
                        });
                    } else {
                        alumniList = invitedAlumni;
                    }
                } else if (this.currentView == 'registered') {
                    let registeredAlumni = this.data.alumniList.filter(alumni => alumni.first_name && alumni.last_name);
                    if (this.keyword) {
                        let splitedKeywords = this.keyword.split(' ');
                        registeredAlumni.forEach(eachAlumni => {
                            let isIncludesKeyword = false;
                            splitedKeywords.forEach(eachKeyword => {
                                if (eachKeyword) {
                                    if (eachAlumni.first_name && eachAlumni.last_name) {
                                        if (
                                            (eachAlumni.first_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.last_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.email.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.alumni.gender.toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || ((eachAlumni.alumni.batch.toString()).toLowerCase()).includes(eachKeyword.toLowerCase())
                                            || (eachAlumni.alumni.major.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        ) {
                                            isIncludesKeyword = true;
                                        }
                                    } else {
                                        if ((eachAlumni.email.toLowerCase()).includes(eachKeyword.toLowerCase())) {
                                            isIncludesKeyword = true;
                                        }
                                    }
                                }
                            })
    
                            if (isIncludesKeyword) {
                                alumniList.push(eachAlumni);
                            }
                        });
                    } else {
                        alumniList = registeredAlumni;
                    }
                }

                return alumniList;
            }
        }
    }
</script>

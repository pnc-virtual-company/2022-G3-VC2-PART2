<template>
    <div class="w-10/12 m-auto">
        <input-search @search-keyword="updateKeyword" ></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="shadow shadow-gray-400 py-[0.55rem] text-[1rem] bg-sky text-white hover:bg-sky-hover font-bold border-none">Invite</button-components>
        </div>
        <div v-if="filteredEro">
            <card-list-ERO v-for="ero of filteredEro" :key="ero" @delete-item="data.deleteEro(ero.id)">
                <template #title-1 >
                    <div class="flex justify-center aling-items-sm-center">
                        <img :src="data.getImage(ero.profile)" class="w-[55px] h-[55px] rounded-full">
                    </div>
                </template>
                <template #title-2>name</template>
                <template #text-2 >
                    <p v-if="ero.first_name && ero.last_name">{{ero.first_name}} {{ero.last_name}}</p>
                    <p v-else class="text-gray-500">Unregistered</p>
                </template>
                <template #title-3>email</template>
                <template #text-3>{{ero.email}}</template>
                <template #button-details>
                    <button @click="$emit('view-details', ero.id)" v-if="ero.first_name && ero.last_name" class="mr-2 hover:bg-[#e6e6ec] rounded-full p-2 flex justify-center items-center">
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
            </card-list-ERO>
        </div>
        <div v-if="!data.eroList" class="mt-4 flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
            <img src="../../../assets/data-empty.png" class="w-40">
            <p>No any ero for now!</p>
            <p>Click on button invite to invite some</p>
        </div>
        <div v-else-if="filteredEro.length <= 0" class="mt-4 m-auto flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
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
            }
        },

        methods: {
            updateKeyword(newKeyword) {
                this.keyword = newKeyword;
            }
        },

        computed: {
            filteredEro() {
                let eroList = [];
                if (this.keyword) {
                    let splitedKeywords = this.keyword.split(' ');
                    this.data.eroList.forEach(eachEro => {
                        let isIncludesKeyword = false;
                        splitedKeywords.forEach(eachKeyword => {
                            if (eachKeyword) {
                                if (eachEro.first_name && eachEro.last_name) {
                                    if (
                                        (eachEro.first_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (eachEro.last_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (eachEro.email.toLowerCase()).includes(eachKeyword.toLowerCase())
                                    ) {
                                        isIncludesKeyword = true;
                                    }
                                } else {
                                    if ((eachEro.email.toLowerCase()).includes(eachKeyword.toLowerCase())) {
                                        isIncludesKeyword = true;
                                    }
                                }
                            }
                        })

                        if (isIncludesKeyword) {
                            eroList.push(eachEro);
                        }
                    });
                } else {
                    eroList = this.data.eroList;
                }
                return eroList;
            }
        }
    }
</script>
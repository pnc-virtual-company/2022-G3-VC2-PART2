<template>
    <div class="w-10/12 m-auto">
        <input-search @search-keyword="updateKeyword"></input-search>
        <div class="mt-4">
            <explore-information @update-filters="updateFilters" @clear-filters="clearFilters"></explore-information>
            <div>
                <div v-if="filteredAlumni.length > 0">
                    <list-explore v-for="alumni of filteredAlumni" :class="{ 
                        'border-l-[5px] border-sky': data.isWebStudent(alumni),
                        'border-l-[5px] border-orange-400': data.isSnaStudent(alumni)
                    }" :key="alumni">
                        <template #title-1 >
                            <div class="">
                                <img :src="data.getImage(alumni.profile)" class="w-[55px] h-[55px] rounded-full">
                            </div>
                        </template>
                        <template #title-2>Name</template>
                        <template #text-2>{{ alumni.first_name }} {{ alumni.last_name}}</template>
                        <template #title-3>Gender</template>
                        <template #text-3>{{ alumni.alumni.gender }}</template>
                        <template #title-4>Batch</template>
                        <template #text-4>{{ alumni.alumni.batch }}</template>
                        <template #title-5>Major</template>
                        <template #text-5>{{ alumni.alumni.major }}</template>
                        <template #title-6>Current work</template>
                        <template #text-6>
                            <p v-if="currentPositon(alumni.work_experience)">{{ currentPositon(alumni.work_experience) }}</p>
                            <p v-else>Unknown</p>
                        </template>
                        <template #text-7>
                            <p v-if="currentWork(alumni.work_experience)" class="text-sky-hover font-medium">({{ currentWork(alumni.work_experience) }})</p>
                        </template>
                        <template #button-details>
                            <button @click="$emit('view-details', alumni.id)" class="hover:bg-[#e6e6ec] rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-sky hover:text-sky-hover cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </button>
                        </template>
                    </list-explore>
                </div>
                <div v-if="!data.alumniList" class="mt-4 flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
                    <img src="../../../assets/data-empty.png" class="w-40">
                    <p>No any alumni for now!</p>
                    <div v-if="data.userData" class="mt-2">
                        <router-link v-if="data.userData.role == 'admin' || data.userData.role == 'ero'" to="/manage" class="mt-3">
                            <button class="bg-sky text-white py-2 px-16 hover:bg-sky-hover rounded">Invite some</button>
                        </router-link>
                    </div>
                </div>
                <div v-else-if="filteredAlumni.length <= 0" class="mt-4 m-auto flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
                    <img src="../../../assets/no-results.png" class="w-40">
                    <p>Nothing found!</p>
                </div>
            </div>
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

        data(){
            return {
                keyword: '',
                batch: 'Batch',
                major: 'Major',
                company: 'Company',
                gender: 'Gender',
            }
        },

        methods: {
            currentWork(work_experience) {
                let myCurrentWork = work_experience.find((current_work) => current_work.is_working == true);
                if (myCurrentWork) {
                    return myCurrentWork.company.name;
                } else {
                    return "";
                }
            },

            currentPositon(work_experience) {
                
                let myCurrentPosition = work_experience.find((postion) => postion.is_working == true );
                if (myCurrentPosition) {
                    return myCurrentPosition.position;
                } else {
                    return "";
                }
            },

            updateKeyword(newKeyword) {
                this.keyword = newKeyword;
            },

            updateFilters(data) {
                this.batch = data.batch;
                this.major = data.major;
                this.company = data.company;
                this.gender = data.gender;
            },

            clearFilters() {
                this.batch = 'Batch';
                this.major = 'Major';
                this.company = 'Company';
                this.gender = 'Gender';
            }
        },

        computed: {
            filteredAlumni() {
                let preAlumniList = [];
                if (this.data.alumniList) {
                    this.data.alumniList.forEach(alumni => {
                        if (alumni.id != this.data.userData.id && alumni.first_name && alumni.last_name) {
                            preAlumniList.push(alumni);
                        }
                    })
                }

                if (this.keyword.trim() || this.batch != "Batch" || this.major != "Major" || this.company != "Company" || this.gender != "Gender") {
                    let resultAlumniList = [];
                    preAlumniList.forEach(eachAlumni => {
                        let isIncludesFilterKey = true;
                        if (this.keyword) {
                            let splitedKeywords = this.keyword.split(' ');
                            let isIncludesSearchKey = false;
                            let currentWork = this.currentWork(eachAlumni.work_experience);
                            let currentPositon = this.currentPositon(eachAlumni.work_experience);
                            splitedKeywords.forEach(eachKeyword => {
                                if (eachKeyword) {
                                    if (
                                        (eachAlumni.first_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (eachAlumni.last_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (eachAlumni.alumni.gender.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || ((eachAlumni.alumni.batch.toString()).toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (eachAlumni.alumni.major.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (currentWork.toLowerCase()).includes(eachKeyword.toLowerCase())
                                        || (currentPositon.toLowerCase()).includes(eachKeyword.toLowerCase())
                                    ) {
                                        isIncludesSearchKey = true;
                                    }
                                }
                            })
                            
                            if (!isIncludesSearchKey) {
                                isIncludesFilterKey = false;
                            }
                        }
                        if (this.batch != "Batch") {
                            if (eachAlumni.alumni.batch != this.batch) {
                                isIncludesFilterKey = false;
                            }
                        }
                        if (this.major != "Major") {
                            if ((eachAlumni.alumni.major).toLowerCase() != this.major.toLowerCase()) {
                                isIncludesFilterKey = false;
                            }
                        }
                        if (this.company != "Company") {
                            if ((this.currentWork(eachAlumni.work_experience)).toLowerCase() != this.company.toLowerCase()) {
                                isIncludesFilterKey = false;
                            }
                        }
                        if (this.gender != "Gender") {
                            if ((eachAlumni.alumni.gender).toLowerCase() != this.gender.toLowerCase()) {
                                isIncludesFilterKey = false;
                            }
                        }

                        if (isIncludesFilterKey) {
                            resultAlumniList.push(eachAlumni);
                        }
                    });

                    return resultAlumniList;
                } else {
                    return preAlumniList;
                }
            },
        },
    }
</script>
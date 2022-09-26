<template>
    <div @change="$emit('update-filters', {batch: batchKey, major: majorKey, company: companyKey, gender: gender})" class="relative w-[100%] flex justify-between">
        <select v-model="batchKey" class="w-[22.5%] max-h-32 outline-sky bg-white shadow shadow-gray-400 p-[13px] rounded-lg text-sky font-bold" >
            <option hidden selected value="Batch">Batch</option>
            <option v-for="batch of batches" :key="batch" :value="batch">{{ batch }}</option>
        </select>
        <select v-model="majorKey" class="w-[22.5%] outline-sky bg-white shadow shadow-gray-400 p-[13px] rounded-lg text-sky font-bold">
            <option hidden selected value="Major">Major</option>
            <option v-for="major of majors" :key="major" :value='major'>{{major}}</option>
        </select>
        <select v-model="companyKey" class="w-[22.5%] outline-sky bg-white shadow shadow-gray-400 p-[13px] rounded-lg text-sky font-bold ">
            <option hidden selected value="Company">Company</option>
            <option v-for="company of companies" :key="company" :value="company">{{company}}</option>
        </select>
        <select v-model="gender" class="w-[22.5%] outline-sky bg-white shadow shadow-gray-400 p-[13px] rounded-lg text-sky font-bold">
            <option hidden selected value="Gender">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <div @click="$emit('clear-filters'); clearFilters()" class="w-[5%] cursor-pointer bg-white shadow shadow-gray-400 text-[1rem] rounded-lg font-bold flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" :class="{ 'text-red-600 w-7 h-7': batchKey != 'Batch' || majorKey != 'Major' || companyKey != 'Major' || gender != 'Gender', 'text-sky w-6 h-6': batchKey == 'Batch' && majorKey == 'Major' && companyKey == 'Company' && gender == 'Gender'}" class="text-2xl cursor-pointer">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
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
                batchKey: "Batch",
                majorKey: "Major",
                companyKey: "Company",
                gender: "Gender",
                optionType: null,
                isShowOptions: false,
            }
        },

        methods: {
            clearFilters() {
                this.batchKey = 'Batch';
                this.majorKey = 'Major';
                this.companyKey = 'Company';
                this.gender = 'Gender';
            },

            checkClick(e) {
                if (e.target.id != 'batch' && e.target.id != 'major' && e.target.id != 'company' && e.target.id != 'gender') {
                    this.isShowOptions = false;
                }
            }
        },

        computed: {
            batches() {
                if (this.data.alumniList) {
                    return this.data.getBatches();
                } else { 
                    return [];
                }
            },
            companies() {
                if (this.data.alumniList) {
                    return this.data.getCompanies();
                } else { 
                    return [];
                }
            },
            majors() {
                if (this.data.alumniList) {
                    return this.data.getMajor();
                } else { 
                    return [];
                }
            }
        }
    }
</script>
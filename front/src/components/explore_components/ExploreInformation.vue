<template>
    <div class="relative w-[100%] grid grid-cols-5 gap-4 ">
            <select class="bg-white shadow   p-[13px] rounded-lg text-sky font-bold" >
                    <option class="" hidden selected>Batch</option>
                    <option v-for="batch of batches" :key="batch" :value="batch">{{ batch }}</option>
            </select>
            <select class="bg-white shadow p-[13px] rounded-lg text-sky font-bold ">
                <option hidden selected>Company</option>
                <option v-for="company of companies" :key="company" :value='company'>{{company}}</option>
            </select>
            <select class="bg-white shadow p-[13px] rounded-lg text-sky font-bold">
                <option hidden selected>Major</option>
                <option v-for="major of majors" :key="major" :value='major'>{{major.alumni.major}}</option>
            </select>
            <select class="bg-white shadow p-[13px] rounded-lg text-sky font-bold">
                <option hidden selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <div class="bg-white shadow text-[1rem] p-[13px] rounded-lg text-red-400 font-bold flex justify-between">
                <label  for="">Clear</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-600 text-2xl cursor-pointer">
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
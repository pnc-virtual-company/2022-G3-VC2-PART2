<template>
    <div>
        <div class="w-10/12 m-auto">
            <div v-if="data.companyList">
                <card-company v-for="company of data.companyList" :key="company" @delete-item="data.deleteCompany(company.id)">
                    <template #title-1 >
                        <div class="">
                            <img :src="data.getImage(company.logo)" class="w-[55px] rounded-full">
                        </div>
                    </template>
                    <template #title-2>Company name</template>
                    <template #text-2>{{ company.name }}</template>
                    <template #title-3>Address</template>
                    <template #text-3>{{ company.address }}</template>
                    <template #text-4>
                        <a v-if="company.link" :href="company.link" target="blank" class="hover:text-sky-hover border-b-2 border-sky text-sky font-bold ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[28px] h-[28px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </template>
                </card-company>
            </div>
            <div v-if="!data.companyList" class="mt-4 flex flex-col text-center text-gray-400 justify-center items-center h-full w-full text-[16.5px]">
                <img src="../../../assets/data-empty.png" class="w-40">
                <p>No any companies for now!</p>
            </div>
        </div>
    </div>  
</template>

<script>
    import {userInformations} from "../../../store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data
            }
        },
    }
</script>
<template>
    <div>
        <div class="w-10/12 m-auto">
            <card-company v-for="company of data.companyList" :key="company" @delete-item="data.deleteCompany(company.id)">
                <template #title-1 >
                    <div class="">
                        <img alt="Vue logo" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-2>Company name</template>
                <template #text-2>{{ company.name }}</template>
                <template #title-3>Address</template>
                <template #text-3>{{ company.address }}</template>
                <template #text-4 >
                    <a v-if="company.link" :href="company.link" target="blank" class="border-b-2 border-sky text-sky font-bold">Visit</a>
                </template>
            </card-company>
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
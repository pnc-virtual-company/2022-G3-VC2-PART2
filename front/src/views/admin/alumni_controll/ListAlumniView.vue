<template>
    <div class="w-10/12 m-auto">
        <input-search></input-search>
        <div class="flex justify-between">
            <div class="mt-4 flex">
                <button-components class="border-white py-2 text-[1rem] text-sky bg-white hover:bg-sky-hover hover:text-white font-bold">Invited</button-components>
                <button-components class="border-none py-2 text-[1rem] bg-white text-sky hover:bg-sky-hover hover:text-white font-bold ml-2">Registered</button-components>
            </div>
            <div class="mt-4 ">
                <button-components @click="$emit('click-popup')" class="py-2 text-[1rem] bg-sky text-white hover:bg-white hover:text-sky-hover font-bold">Invite</button-components>
            </div>

        </div>
        <div >
            <card-list v-for="alumni of data.alumniList" :key="alumni" @delete-item="data.deleteAlumni(alumni.id)">
                <template #title-5 >
                    <div class="">
                        <img alt="Vue logo" class="" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-1>name</template>
                <template #text-1>{{ alumni.first_name }} {{ alumni.last_name}}</template>
                <template #title-2>email</template>
                <template #text-2>{{ alumni.email }}</template>
                <template #title-3>gender</template>
                <template #text-3>{{ alumni.alumni.gender }}</template>
                <template #title-4>Batch</template>
                <template #text-4>{{ alumni.alumni.major}} {{ alumni.alumni.batch }}</template>
            </card-list>
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
        
    }
</script>

<template>
    <div v-if="alumni='grid'" class="w-10/12 m-auto">
        <input-search></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-white hover:bg-sky-hover hover:text-white font-bold">Invite</button-components>
        </div>
        <div class="" >
            <card-list-ERO v-for="ero of data.eroList" :key="ero" @delete-item="data.deleteEro(ero.id)">
                <template #title-1 >
                    <div class="">
                        <img alt="Vue logo" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-2>name</template>
                <template #text-2 >{{ero.first_name}} {{ero.last_name}}</template>
                <template #title-3> email</template>
                <template #text-3>{{ero.email}} </template>
            </card-list-ERO>
        </div>
    </div>
</template>

<script>
    import {userInformations} from "../../../store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data,
            }
        },
    
    }
</script>
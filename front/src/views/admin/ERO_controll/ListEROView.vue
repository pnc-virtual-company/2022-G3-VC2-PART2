<template>
    <div class="w-[83%] m-auto ">
            <input-search></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-[1rem] text-white hover:bg-white hover:text-sky-hover">Invite</button-components>
        </div>
        <div class="" >
            <card-list-ERO v-for="ero of data.eroList" :key="ero" @delete-item="data.deleteEro(ero.id)" >
                <template #title-1 >
                    <div class="flex justify-center aling-items-sm-center">
                        <img alt="" src="../../../assets/logo.png" class=" w-[55px] "/>
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
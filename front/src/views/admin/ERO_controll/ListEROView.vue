<template>
    <div class="w-10/12 m-auto">
        <input-search></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-white hover:bg-sky-hover hover:text-white font-bold">Invite</button-components>
        </div>
        <div class="" >
            <card-list-ERO v-for="i in 3" :key="i" class="">
                <template #title-1>name</template>
                <template #text-1 >thib tik</template>
                <template #title-2> email</template>
                <template #text-2>phearunchhun@gmail.com </template>
                <template #title-4>gender </template>
                <template #text-4>Male</template>
                <template #title-5>Status </template>
                <template #text-5>Registered</template>
            </card-list-ERO>
        </div>
    </div>
</template>

<script>
        import {userInformations} from "@/store/userStore"

    export default {
        setup(){
            const userData = userInformations();
            return {
                userData
            }
        },
        data(){
            return {
                // alumni:false,
            }
        }
    }
</script>
<template>
    <div class="w-10/12 m-auto">
        <input-search></input-search>
        <div class="flex justify-between">
            <div class="mt-4 flex">
                <button-components class="border-white py-2 text-sky bg-white hover:bg-sky-hover hover:text-white font-bold">Invited</button-components>
                <button-components class="border-none py-2 bg-white text-sky hover:bg-sky-hover hover:text-white font-bold ml-2">Registered</button-components>
            </div>
            <div class="mt-4 ">
                <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-white hover:bg-sky-hover hover:text-white font-bold">Invite</button-components>
            </div>

        </div>
        <div >
            <card-list v-for="i in 3" :key="i" >
                <template #title-5 >
                    <div class="">
                        <img alt="Vue logo" class="" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-1>name</template>
                <template #text-1>Khy Phat</template>
                <template #title-2>email</template>
                <template #text-2>khy.phat@gmail.com</template>
                <template #title-3>gender</template>
                <template #text-3>Male</template>
                <template #title-4>Batch</template>
                <template #text-4>WEP 2022</template>
            </card-list>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            }
        }
    }
</script>

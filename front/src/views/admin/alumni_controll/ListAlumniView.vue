<template>
    <div class="w-4/5 m-auto">
        <input-search></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-white hover:bg-sky-hover hover:text-white font-bold">Invite</button-components>
        </div>
        <div class="">
            <card-list v-for="i in 3" :key="i" >
                <template #title-1>name</template>
                <template #text-1>Khy Phat</template>
                <template #title-2>email</template>
                <template #text-2>khy.phat@gmail.com</template>
                <template #title-3>gender</template>
                <template #text-3>Male</template>
                <template #title-4>batch</template>
                <template #text-4>2022</template>
            </card-list>
        </div>
    </div>
</template>
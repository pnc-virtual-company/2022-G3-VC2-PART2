<template>
    <div>
        <div class="w-10/12 m-auto">
            <card-company v-for="i in 3" :key="i" >
                <template #title-1 >
                    <div class="">
                        <img alt="Vue logo" class="" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-2>Company name</template>
                <template #text-2>Camsolution</template>
                <template #title-3>Address</template>
                <template #text-3>Sen Sok Phnom Penh</template>
                <template #text-4 >
                    <a href="https://github.com" target="blank" class="border-b-2 border-sky text-sky font-bold">Visit</a>
                    </template>
            </card-company>
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
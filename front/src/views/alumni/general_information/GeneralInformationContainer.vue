<template>
    <div class=" mt-[20px]">
        <general-information @click-popup="isShow = !isShow"> </general-information>
        <general-information-popup v-if="isShow" @click-popup="isShow = !isShow"></general-information-popup>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                isShow: false,
            }
        },
        methods: {

        },

        computed:{

        }
    }
</script>
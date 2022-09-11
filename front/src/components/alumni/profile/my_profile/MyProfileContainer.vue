<template>
    <div class=" mt-[20px]">
        <profile-alumni @click-popup="isShow = !isShow"> </profile-alumni>
    </div>
    <div v-if="isShow" >
        <my-profile-popup @click-popup="isShow = !isShow"></my-profile-popup>
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
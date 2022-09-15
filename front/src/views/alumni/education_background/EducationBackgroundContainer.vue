<template>
    <div>
        <education_background @click-popup="isShow = !isShow"></education_background>
        <education_background_popup v-if="isShow" @click-popup="isShow = !isShow"></education_background_popup>
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
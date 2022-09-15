<template>
    <div>
        <education-background @click-popup="isShow = !isShow"></education-background>
        <!-- <education-background ></education-background> -->
        <!-- <education_background_popup v-if="isShow" @click-popup="isShow = !isShow"></education_background_popup> -->
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
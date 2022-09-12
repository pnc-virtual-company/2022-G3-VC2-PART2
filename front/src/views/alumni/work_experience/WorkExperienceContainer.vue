<template>
    <div>
        <work-experience @click-popup="isShow = !isShow"></work-experience>
        <work-experience-popup v-if="isShow" @click-popup="isShow = !isShow"></work-experience-popup>
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
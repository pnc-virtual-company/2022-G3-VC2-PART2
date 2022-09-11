<template>
    <div>
        <work-experience @click-popup="isShow = !isShow"></work-experience>
    </div>
    <div v-if="isShow">
        <work-experience-popup @click-popup="isShow = !isShow"></work-experience-popup>
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
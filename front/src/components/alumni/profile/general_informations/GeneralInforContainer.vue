<template>
    <div>
        <general-infor @click-popup="isShow = !isShow"></general-infor>
        <general-infor-popup v-if="isShow" @click-popup="isShow = !isShow"></general-infor-popup>
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



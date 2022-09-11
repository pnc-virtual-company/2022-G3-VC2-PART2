<template>
    <div>
        <general-infor @click-popup="isShow = !isShow"></general-infor>
    </div>
    <div v-if="isShow">
        <general-infor-popup @click-popup="isShow = !isShow"></general-infor-popup>
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



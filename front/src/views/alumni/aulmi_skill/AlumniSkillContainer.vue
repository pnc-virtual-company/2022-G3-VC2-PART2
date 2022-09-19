<template>
    <div>
        <alumni-skill  @click-popup="isShow = !isShow"></alumni-skill>
        <alumni-skill-popup v-if="isShow" @click-popup="isShow = !isShow"></alumni-skill-popup>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                isShow:false
                
            }
        },
        methods: {
        },
    }
</script>
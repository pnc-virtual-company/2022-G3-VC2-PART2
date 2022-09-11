<template>
    <div>
        <general-infor @click-popup="isShow = !isShow" :userInformation="userInformation"></general-infor>
    </div>
    <div v-if="isShow">
        <general-infor-popup @click-popup="isShow = !isShow" :userInformation="userInformation"></general-infor-popup>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                isShow: false,
                userInformation: {firstName: 'Thib', lastName: 'Tik', gender: 'Male',major: 'Web developer',birthDate:'02/06/2022',address:'Tek Tla, Phnom Penh'},
            }
        },
        methods: {

        },

        computed:{

        }
    }
</script>



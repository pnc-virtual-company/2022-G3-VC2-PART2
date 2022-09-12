<template>
    <div>
        <general-infor @click-popup="isShow = !isShow" :userInformation="getAlumniGeneralInfor"></general-infor>
        <general-infor-popup v-if="isShow" @click-popup="isShow = !isShow" :userInformation="getAlumniGeneralInfor" @userInformationUpdate="alumniData.updateGerneralInforData"></general-infor-popup>
    </div>
</template>

<script>
    import { alumniProfileStore } from '@/store/alumniStore';
    export default {
        setup(){
            const alumniData = alumniProfileStore();
            return {
                alumniData
            }
        },

        data(){
            return {
                isShow: false,
                userInformation: this.alumniData.getGeneralInforData
            }
        },
        methods: {
            // updateGeneralInfor(data){

            // }
        },

        computed:{
            getAlumniGeneralInfor(){
                return this.userInformation
            }
        },
    }
</script>



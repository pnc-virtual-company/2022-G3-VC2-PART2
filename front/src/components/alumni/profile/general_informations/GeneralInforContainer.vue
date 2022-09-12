<template>
    <div>
        <general-infor @click-popup="isShow = !isShow" :userInformation="getAlumniGeneralInfor"></general-infor>
        <general-infor-popup v-if="isShow" @click-popup="isShow = !isShow" :userInformation="getAlumniGeneralInfor" @userInformationUpdate="updateGeneralInfor"></general-infor-popup>
    </div>
</template>

<script>
    import { userInformations } from '@/store/userStore';
    export default {
        setup(){
            const alumniData = userInformations();
            return {
                alumniData
            }
        },

        data(){
            return {
                isShow: false,
                userInformation: this.alumniData.userData
            }
        },
        methods: {
            updateGeneralInfor(data){
                console.log(data)
                this.alumniData.updateGerneralInforData(data)
            }
        },

        computed:{
            getAlumniGeneralInfor(){
                return this.userInformation
            }
        },
        // mounted(){
        //     console.log(this.alumniData.userData)
        // }
    }
</script>



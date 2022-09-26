<template>
    <div class=" mt-[20px]">
        <general-information @click-reset="isShowReset = !isShowReset" @click-popup="isShow = !isShow"></general-information>
        <general-information-popup v-if="isShow" @click-popup="isShow = !isShow" @update-data="updateGeneralInfor"></general-information-popup>
        <reset-password v-if="isShowReset" @click-reset="isShowReset = !isShowReset"></reset-password>
    </div>
</template>

<script>
    import {userInformations} from "../../../store/userStore"
    export default {
        setup(){
            const userInfor = userInformations();
            return {
                userInfor
            }
        },
        data(){
            return {
                isShow: false,
                showEditProfile: false,
                showEditCover: false,
                isShowReset: false,
            }
        },
        methods: {
            updateGeneralInfor(data){
                this.userInfor.updateAlumniGerneralInfor(data);
            },
        },
    }
</script>


<template>
    <div class="m-auto">
        <list-ERO @view-details="(id) => { userId = id; isViewDetails = true }" @click-popup="isShow = !isShow"></list-ERO>
        <ERO-invite-popup v-if="isShow" @click-popup="isShow = !isShow" @addInviteERO="addInviteERO" ></ERO-invite-popup>
        <ero-details v-if="isViewDetails" :userId="userId" @close-details="isViewDetails = false"></ero-details>
    </div>
</template>
<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const userData = userInformations();
            return {
                userData
            }
        },

        data(){
            return {
                isShow: false,
                isViewDetails: false,
                userId: null,
            }
        },

        methods:{
            addInviteERO(InviteERO){
                this.userData.addInviteERO(InviteERO)
            }
        }
    }
</script>

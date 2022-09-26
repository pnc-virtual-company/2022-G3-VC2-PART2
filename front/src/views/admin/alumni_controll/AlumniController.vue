
<template>
    <div class="m-auto">
        <list-alumni-view @view-details="(id) => { userId = id; isViewDetails = true }" @click-popup="isShow = !isShow"></list-alumni-view>
        <alumni-invite-popup v-if="isShow" @click-popup="isShow = !isShow" @addInviteAlumni="addInviteAlumni"></alumni-invite-popup>
        <alumni-details v-if="isViewDetails" :userId="userId" @close-details="isViewDetails = false"></alumni-details>
    </div>
</template>


<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const userData = userInformations();
            return {
                userData,
            }
        },
        
        data(){
            return{
                isShow:false,
                isViewDetails: false,
                userId: null,
            }
        },

        methods: {
            addInviteAlumni(InviteAlumni){
                this.userData.addInviteAlumni(InviteAlumni)
            }
        },
    }
</script>

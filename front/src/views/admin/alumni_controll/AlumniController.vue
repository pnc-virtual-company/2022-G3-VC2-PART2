
<template>
    <div class="m-auto">
        <list-alumni-view  @click-popup="isShow = !isShow"></list-alumni-view>
        <alumni-invite-popup v-if="isShow" @click-popup="isShow = !isShow" @addInviteAlumni="addInviteAlumni"></alumni-invite-popup>
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
                isShow:false
            }
        },

        methods: {
            addInviteAlumni(InviteAlumni){
                    this.userData.addInviteAlumni(InviteAlumni)
                }
            
        },

    }
</script>

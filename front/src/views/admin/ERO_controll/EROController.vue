<!-- <template>
    <list-ERO></list-ERO>
    <list-ERO></list-ERO>
</template> -->


<template>
    <div class="m-auto">
        <list-ERO  @click-popup="isShow = !isShow"></list-ERO>
        <ERO-invite-popup v-if="isShow" @click-popup="isShow = !isShow" @addInviteERO="addInviteERO" ></ERO-invite-popup>
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
            }
        },
        methods:{
            addInviteERO(InviteERO){
                this.userData.addInviteERO(InviteERO)

            }
        }
    }
</script>

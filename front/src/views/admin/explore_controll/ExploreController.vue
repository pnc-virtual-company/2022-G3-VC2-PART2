
<template>
    <div v-if="data.userData" class="m-auto">
        <explore-view @view-details="(id) => { userId = id; isViewDetails = true }"></explore-view>
        <alumni-details v-if="isViewDetails" :userId="userId" @close-details="isViewDetails = false"></alumni-details>
    </div>
</template>

<script>
    import {userInformations} from "@/store/userStore"
    export default {
        setup(){
            const data = userInformations();
            return {
                data,
            }
        },

        data() {
            return {
                isViewDetails: false,
                userId: null,
            }
        }
    }
</script>
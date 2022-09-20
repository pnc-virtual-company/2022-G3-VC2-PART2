<template>
    <div class="w-full admin m-auto mt-4">
        <menu-view v-if="userData.userData" @switch-view="(view) => { currentView = view }"></menu-view>
        <alumni-controller v-if="currentView == 'alumni'"></alumni-controller>
        <ERO-controller v-if="currentView == 'ero'"></ERO-controller>
        <company-controller v-if="currentView == 'companies'"></company-controller>
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
                currentView: 'alumni',
            }
        }
    }
</script>

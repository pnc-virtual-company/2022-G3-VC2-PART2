<template>
    <div class="w-full admin m-auto mt-4">
        <menu-view @switch-view="(view) => { currentView = view }"></menu-view>
        <alumni-controller v-if="currentView == 'alumni'"></alumni-controller>
        <ERO-controller v-if="currentView == 'ero'"></ERO-controller>
        <company-controller v-if="currentView == 'companies'"></company-controller>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                currentView: 'alumni',
            }
        }
    }
</script>

<template>
    <div class="flex justify-evenly font-bold items-center m-4  mt-12 text-lg">
        <span @click="$emit('switch-view', 'alumni'); currentView = 'alumni'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'alumni' }" class="cursor-pointer px-2">Alumni</span>
        <span @click="$emit('switch-view', 'ero'); currentView = 'ero'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'ero' }" class="cursor-pointer px-2">ERO</span>
        <span @click="$emit('switch-view', 'companies'); currentView = 'companies'" :class="{ 'border-b-[2px] border-blue-700': currentView == 'companies' }" class="cursor-pointer px-2">Companies</span>
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
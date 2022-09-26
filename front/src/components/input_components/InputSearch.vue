<template>
    <div>
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input ref="inputField" type="text" v-model="keyword" @input="$emit('search-keyword', keyword)" id="search" class="shadow shadow-gray-400 bg-white outline-sky text-lg rounded-lg w-full pl-12 p-[10px]" placeholder="Search" required>
            <svg v-if="keyword" @click="clearKeyword" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex absolute top-[0.65rem] right-[0.65rem] w-7 h-7 text-red-600 text-2xl cursor-pointer">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                keyword: "",
            }
        },

        methods: {
            clearKeyword() {
                this.keyword = "";
                this.$emit('search-keyword', this.keyword);
                this.$refs.inputField.focus();
            }
        }
    }
</script>

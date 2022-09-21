<template>
    <div class="w-10/12 m-auto">
        <input-search @search-keyword="updateKeyword" ></input-search>
        <div class="mt-4 flex justify-end">
            <button-components @click="$emit('click-popup')" class="py-2 bg-sky text-white hover:bg-sky-hover hover:text-white font-bold">Invite</button-components>
        </div>
        <div class="" >
            <card-list-ERO v-for="ero of filteredEro" :key="ero" @delete-item="data.deleteEro(ero.id)">
                <template #title-1 >
                    <div class="">
                        <img alt="Vue logo" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-2>name</template>
                <template #text-2 >{{ero.first_name}} {{ero.last_name}}</template>
                <template #title-3> email</template>
                <template #text-3>{{ero.email}} </template>
            </card-list-ERO>
        </div>
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
                keyword: null,
            }
        },

        methods: {
            updateKeyword(newKeyword) {
                this.keyword = newKeyword;
            }
        },

        computed: {
            filteredEro() {
                let eroList = [];
                if (this.keyword) {
                    let splitedKeywords = this.keyword.split(' ');
                    this.data.eroList.forEach(eachEro => {
                        let isIncludesKeyword = false;
                        splitedKeywords.forEach(eachKeyword => {
                            if (eachKeyword) {
                                if (
                                    (eachEro.first_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                    || (eachEro.last_name.toLowerCase()).includes(eachKeyword.toLowerCase())
                                    || (eachEro.email.toLowerCase()).includes(eachKeyword.toLowerCase())
                                    
                                ) {
                                    isIncludesKeyword = true;
                                }
                            }
                        })

                        if (isIncludesKeyword) {
                            eroList.push(eachEro);
                        }
                    });
                } else {
                    eroList = this.data.eroList;
                }
                return eroList;
            }
        }
    }
</script>
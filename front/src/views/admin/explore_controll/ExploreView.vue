<template>
    <div class="w-10/12 m-auto">
        <input-search></input-search>
        <div class="mt-4">
            <explore-information></explore-information>
            <list-explore v-for="alumni of data.alumniList" :key="alumni">
                <template #title-1 >
                    <div class="">
                        <img alt="Vue logo" class="" src="../../../assets/logo.png" width="50">
                    </div>
                </template>
                <template #title-2> {{ alumni.first_name }} {{ alumni.last_name}}</template>
                <template #text-3>{{ alumni.alumni.batch }}  </template>
                <template #title-4>{{ alumni.alumni.major }} </template>
                <template #text-5>
                    <img alt="Vue logo" class="w-5 h-5 mt-1" src="../../../assets/logo.png" width="">
                </template>
                <template #text-6>
                    <p class="ml-2">{{ currentSchool(alumni.education_backgrounds) }}</p>
                </template>
            </list-explore>
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

        methods: {
            currentSchool(education_backgrounds) {
                let myCurrentSchool = education_backgrounds.find((education_background) => education_background.is_studying == true);
                if (myCurrentSchool) {
                    return myCurrentSchool.school.name;
                } else {
                    return "Drop out of school";
                }
            }
        }
    }
</script>
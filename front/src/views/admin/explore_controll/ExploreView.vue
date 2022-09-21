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
                <template #title-2>Name</template>
                <template #text-2>{{ alumni.first_name }} {{ alumni.last_name}}</template>
                <template #title-3>Gender</template>
                <template #text-3>{{ alumni.alumni.gender }} </template>
                <template #title-4>Batch</template>
                <template #text-4>{{ alumni.alumni.batch }} </template>
                <template #title-5>Major</template>
                <template #text-5>{{ alumni.alumni.major }} </template>
                <template #title-6>Current work</template>
                <template #text-6> {{ currentPositon(alumni.work_experience) +' '}}( </template>
                <template #text-7>{{ currentWork(alumni.work_experience) }}) </template>
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
            currentWork(work_experience) {
                let myCurrentWork = work_experience.find((current_work) => current_work.is_working == true);
                if (myCurrentWork) {
                    return myCurrentWork.company.name;
                } else {
                    return "Drop out of school";
                }
            },
            currentPositon(work_experience) {
                let myCurrentPosition = work_experience.find((postion) => postion.is_working == true );
                if (myCurrentPosition) {
                    return myCurrentPosition.position;
                } 
            },
           
           
        }
    }
</script>
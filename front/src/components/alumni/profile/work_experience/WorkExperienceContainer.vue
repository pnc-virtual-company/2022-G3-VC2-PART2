<template>
    <div>
        <work-experience @click-popup="(id) => { isShow = !isShow; experienceId = id; }"></work-experience>
        <work-experience-popup v-if="isShow" @update-experience="updateWorkExperience" :experienceId="experienceId" @click-popup="isShow = !isShow"></work-experience-popup>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                experienceId: null,
                isShow: false,
            }
        },
        methods: {
            // updateWorkExperience(experienceId, experience) {
            //     axios.put('/alumnis/experience/' + experienceId, experience).then((res) => {
            //         console.log(re.data);
            //     })
            // }
        },

        computed:{

        }
    }
</script>
<template>
    <card-components>
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Work Experience</h1>
            <div >
                <icon-action>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 rounded-full hover:text-blue-700 text-sky cursor-pointer font-bold">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </icon-action>
            </div>
        </div>
        <div>
            <card-informations @click-popup="$emit('click-popup')" v-for:="experience of allExperience">
                <template #header>{{ experience.position }}</template>
                <template #content-1>{{ experience.company }}</template>
                <template #content-2>{{ experience.start_date }} - {{ experience.end_date }}</template>
            </card-informations>
        </div>
    </card-components>
</template>

<script>
    export default {
        data() {
            return {
                allExperience: [
                    {position: 'Laravel Developer', company: 'Z1 Flexible Solution', start_date: 'June, 2020', end_date: 'Present'},
                    {position: 'WEB Developer', company: 'Zination Cambodia', start_date: 'June, 2020', end_date: 'January, 2022'},
                ],
            }
        },
    }
</script>
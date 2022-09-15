<!-- <template>
    <card-components>
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Education Background</h1>
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
            <card-informations @click-popup="$emit('click-popup')" >
                EducationData
                <template #content-1>Passerelles Numeriques Cambodia dsfsdfsfsdfsdfs </template>
                <template #content-2>VP.Start Co,Ltd </template>
                <template #content-3>Start date: August 2022</template>
            </card-informations>
        </div>
    </card-components>
</template>

<script>
     import {userInformations} from "../../../store/userStore"
    export default {
        setup(){
            const EducationData = userInformations();
            return {
                EducationData
            }
        },
    }
</script> -->


<template>
    <card-components>
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-sky">Education Background</h1>
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
            <card-informations  @click-popup="$emit('click-popup')">
                <template #logo>
                    <img class="w-14 mr-3 align-items-sm-center" src="../../../assets/logo.png">
                </template>
                <template #header>Passerelles Numeriques Cambodia  <span class="text-green-500 text-[16px]">(Associat Degree)</span></template>
                <template #content-1> <p >I am a bad boy{{educationData.educationBackgound.user_id}}</p></template>
                <template #content-2>Address: Phnom Penh</template>
                <template #content-3>Start year:2021</template>
                <template #content-4>End year: 2022</template>
            </card-informations>
        </div>
    </card-components>
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

        methods: {
           
        },

        computed: {
        }
    }
</script>
<template>
    <popup-component>
        <card-components>
            <form class="bg-white" >
                <h1 class="text-center font-bold text-2xl bg-white" >Update general informations</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">First name:</span>
                        <div class="bg-white mt-1" >
                            <input type="text" id="website-admin" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-md" placeholder="first name" v-model="userInformationUpdate.firstName" >
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Last name:</span>
                        <div class="bg-white mt-1">
                            <input type="text" id="website-admin" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md" placeholder="last name" v-model="userInformationUpdate.lastName">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Gender:</span>
                        <select id="" class="mt-1 bg-white border-2 border-gray-300 text-gray-900 font-normal mb-6 rounded-lg  w-full p-2"  v-model="userInformationUpdate.gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Birth of date:</span>
                        <div class="bg-white mt-1">
                            <input type="date" id="website-admin" class="bg-white text-base font-normal block flex-1 min-w-0 w-full border-gray-300 border-2 p-1.5 rounded-md" placeholder="Birth of Date" v-model="userInformationUpdate.birthDate">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Major:</span>
                        <div class="bg-white mt-1">
                            <input type="text" id="website-admin" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md" placeholder="major" v-model="userInformationUpdate.major">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Address:</span>
                        <div class="bg-white mt-1">
                            <input type="text" id="website-admin" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md" placeholder="address" v-model="userInformationUpdate.address">
                        </div>
                    </div>
                    <!-- <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Address:</span>
                        <select id="" class="mt-1 bg-white  border-2 border-gray-300 text-gray-900 font-normal mb-6 rounded-lg  w-full p-2">
                            <option value="Phnom Penh" selected>Phnom Penh</option>
                            <option v-for="province of provinces" :key="province" :value="province">{{province}}</option>
                        </select>
                    </div> -->
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="hover:bg-gray-200 hover:text-sky">
                        Cancel
                    </button-components>
                    <button-components class="ml-3 bg-sky font-medium text-white hover:text-blue-200 hover:bg-sky-hover">
                        Save
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>

</template>

<script>
    export default {
        props:{
            userInformation:Object
        },
        data(){
            return {
                userInformationUpdate:this.userInformation,
            }
        }
    }
</script>
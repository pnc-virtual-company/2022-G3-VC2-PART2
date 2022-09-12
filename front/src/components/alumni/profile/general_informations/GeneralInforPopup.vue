<template>
    <popup-component>
        <card-components>
            <form class="bg-white" >
                <h1 class="text-center font-bold text-2xl bg-white" >Update general informations</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Gender:</span>
                        <select id="" class="mt-1 bg-white border-2 border-gray-300 text-gray-900 font-normal mb-6 rounded-lg  w-full p-2"  v-model="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Birth of date:</span>
                        <div class="bg-white mt-1">
                            <input type="date" class="bg-white text-base font-normal block flex-1 min-w-0 w-full border-gray-300 border-2 p-1.5 rounded-md"  placeholder="Birth of date" v-model="birth_date">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Major:</span>
                        <div class="bg-white mt-1">
                            <input type="text" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md" placeholder="major" v-model="major">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Address:</span>
                        <div class="bg-white mt-1">
                            <input type="text" class="bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md" placeholder="address" v-model="address">
                        </div>
                    </div>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="hover:bg-gray-200 hover:text-sky">
                        Cancel
                    </button-components>
                    <button-components class="ml-3 bg-sky font-medium text-white hover:text-blue-200 hover:bg-sky-hover" @click="updateUserInformation()">
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
                userInformationUpdate:this.userInformation.alumni,
                gender: '',
                major: '',
                birth_date: '',
                address: '',
            }
        },
        
        methods:{
            updateUserInformation(){
                let alumniData = {gender: this.gender, major: this.major, birth_date: this.birth_date, address: this.address};
                this.$emit('userInformationUpdate',alumniData);
                this.$emit('click-popup');
            },
            dataUpdate(){
                this.gender = this.userInformationUpdate.gender;
                this.major = this.userInformationUpdate.major;
                this.birth_date = this.userInformationUpdate.birth_date;
                this.address = this.userInformationUpdate.address;
            }
        },
        mounted(){
            this.dataUpdate();
        }
    }
</script>
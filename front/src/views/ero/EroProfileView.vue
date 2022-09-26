<template>
    <div v-if="data.userData" class="w-[60%] m-auto shadow shadow-gray-400 bg-white border-b-[1px] border-b-gray-300 pb-4 rounded-lg">
        <div>
            <div class="mt-[20px]">
                <div>
                    <img alt="Vue logo" class=" object-cover  object-center h-[45vh] w-full rounded-t-lg" :src="urlCover" >
                    <div class="flex justify-end item-center w-full relative -top-[0.30rem] bg-red-700">
                        <div @click="showEditCover = true" class="h-8 mr-2 w-8 rounded-full shadow-sm shadow-[black] bg-white mt-[-35px] ml-[4.8rem] flex justify-end items-center hover:bg-gray-300">
                            <label class="h-full flex justify-center items-center rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] text-black cursor-pointer">
                                    <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                    <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-end mt-[-6rem] ml-11">
                    <div class="flex flex-col items-center">
                        <div>
                            <img alt="Vue logo" class="object-cover  object-center w-[148px] h-[148px] rounded-full" :src="urlProfile" width="120">
                            <div @click="showEditProfile = true" class="shadow-sm shadow-[black] h-8 w-8 rounded-full bg-white mt-[-35px] absolute ml-[6rem] hover:bg-gray-300 flex justify-center items-center">
                                <label class="w-full h-full flex justify-center items-center rounded-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] text-black cursor-pointer">
                                        <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                        <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                            </div>
                        </div>
                        <h1 class="bg-white font-bold text-xl mt-2">{{data.userData.first_name}} {{data.userData.last_name}}</h1>
                    </div>
                    <button-components @click="isShowReset = true" class="bg-red-500 border-none w-fit pl-2 pr-3 text-white flex items-center mr-[21px]">
                        <img class="w-[28px] h-[28px]" src="../../assets/reset_password.png">
                        <p class="text-[1rem]">Reset Password</p>
                    </button-components>
                </div>
            </div>

            <hr class="w-[95%] m-auto border-gray-300 mt-4">
            <div class="flex bg-white p-[20px]">
                <div class="w-11/12 bg-white">
                    <the-email>{{ data.userData.email }}</the-email>
                </div>
                <div class="w-1/12 flex justify-end bg-white">
                    <icon-action @click="isShow = true">
                        <button class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-blue-700 text-sky cursor-pointer">
                                <path class="cursor-pointer" d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                        </button>
                    </icon-action>
                </div>
            </div>
        </div>
        <ero-information-popup v-if="isShow" @save-update="saveUpdate" @click-popup="isShow = !isShow" ></ero-information-popup>
        <reset-password v-if="isShowReset" @click-reset="isShowReset = !isShowReset"></reset-password>
        <preview-profile v-if="showEditProfile" @click-popup="showEditProfile = !showEditProfile" ></preview-profile>
        <preview-cover v-if="showEditCover" @click-popup="showEditCover = !showEditCover"></preview-cover>
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
                isShow: false,
                isShowReset: false,
                showEditProfile: false,
                showEditCover: false
            }
        },

        methods: {
            saveUpdate(infor) {
                this.data.updateEroInfor(infor);
            },

            isEmailExisted(myEmail){
                for (let eachEmail of this.userEmails){
                    if(eachEmail.email == myEmail){
                        return true;
                    }
                }
                return false;
            },
        },

        computed: {
            urlCover(){
                if(this.data.userData.cover.substring(0,10) == "IMG_COVER_"){
                    return this.data.getImage(this.data.userData.cover);
                }else{
                    return this.data.userData.cover;
                }
            },

            urlProfile(){
                if(this.data.userData.profile.substring(0,12) == "IMG_PROFILE_"){
                    return this.data.getImage(this.data.userData.profile);
                }else{
                    return this.data.userData.profile;
                }
            },
        }
    }
</script>
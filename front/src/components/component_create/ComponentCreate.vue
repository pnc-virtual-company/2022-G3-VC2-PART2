<template>
    <div>
        <popup-component>
            <card-components class="w-[40%]">
                <form class="bg-white" @input="checkForm">
                    <h1 class="text-center font-bold text-2xl bg-white">
                        <slot name="title"></slot>
                    </h1>
                    <div class="w-24 h-24 m-auto mt-3 flex justify-center items-end">
                        <img v-if="logoToDisplay" :src="logoToDisplay" class="w-full h-full rounded-full">
                        <img v-else src="../../assets/logo.png" class="w-full h-full rounded-full">
                        <input id="logo-upload" type="file" hidden @change="uploadImage">
                        <div class="shadow-sm shadow-[black] h-8 w-8 rounded-full bg-white mt-[-35px] absolute ml-[4rem] hover:bg-gray-300 flex justify-center items-center">
                            <label for="logo-upload" class="w-full h-full flex justify-center items-center rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] rounded-lg text-black cursor-pointer">
                                    <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                    <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                    <error-message v-if="isNotImageType">
                        Logo must be an image type!
                    </error-message>
                    <div class="w-full bg-white mt-3">
                        <div class="w-full bg-white font-medium">
                            <span class="bg-white"> <slot name="label_1"></slot></span>
                            <div class="flex bg-white mt-1">
                                <span  class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0" :class="{ 'border-red-400': isNameNull, 'border-gray-300': !isNameNull }">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </span>
                                <input v-model="name" type="text" placeholder="Name"  class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md  outline-sky" :class="{ 'border-red-400': isNameNull, 'border-gray-300': !isNameNull }">
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 bg-white font-medium">
                        <span class="bg-white">Address:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0" :class="{ 'border-red-400': isAddressNull, 'border-gray-300': !isAddressNull }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input v-model="address" type="text" placeholder="Address" class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full border-2 p-2 rounded-r-md  outline-sky" :class="{ 'border-red-400': isAddressNull, 'border-gray-300': !isAddressNull }">
                        </div>
                    </div>
                    <div class="w-full bg-white font-medium mr-2 mt-3">
                        <span class="bg-white">Access link:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                            </span>
                            <input type="text" v-model="link" class="rounded-none bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md  outline-sky" placeholder="Access link">
                        </div>
                    </div>
                    <error-message v-if="errorMessage">
                        {{ errorMessage }}
                    </error-message>
                    <div class="bg-white flex justify-end mt-4">
                        <button-components @click="$emit('close-create')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                            Cancel
                        </button-components>
                        <button-components @click="createObject" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                            Add
                        </button-components>
                    </div>
                </form>
            </card-components>
        </popup-component>
        <preview-logo v-if="isPreview" @discard="isPreview = false; previewImage = null" @confirm="saveUpload">
            <img :src="previewImage" class="w-full h-full rounded-full">
        </preview-logo>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                name: null,
                address: null,
                link: null,
                logo: null,
                errorMessage: null,
                isNameNull: false,
                isAddressNull: false,
                logoToDisplay: null,
                isPreview: false,
                image: null,
                previewImage: null,
                isNotImageType: false,
                allowImageExtension: ['jpg', 'png', 'jpeg','gif'],
            }
        },

        methods: {
            createObject(){
                if(this.isValidated()){
                    let formData = new FormData();
                    formData.append('name', this.name);
                    formData.append('address', this.address);
                    formData.append('link', this.link);
                    formData.append('logo', this.logo);
                    this.$emit('create-object', formData);
                }
            },

            isValidated() {
                let isValidated = true;
                this.isNameNull = false;
                this.isAddressNull = false;
                if (!this.name || !this.address) {
                    isValidated = false;
                    this.errorMessage = "Name and address are required!"
                    if (!this.name) {
                        this.isNameNull = true;
                    }
                    if (!this.address) {
                        this.isAddressNull = true;
                    }
                }
                return isValidated;
            },

            checkForm() {
                if (this.name) {
                    this.isNameNull = false;
                }
                if (this.address) {
                    this.isAddressNull = false;
                }
                if (!this.isAddressNull && !this.isNameNull) {
                    this.errorMessage = null;
                }
                if (this.logo) {
                    this.isNotImageType = false;
                }
            },

            uploadImage(event) {
                let fileExtension = event.target.files[0].name.split('.').pop();
                if (this.allowImageExtension.includes(fileExtension.toLowerCase())) {
                    this.image = event.target.files[0];
                    let reader = new FileReader();
                    reader.readAsDataURL(this.image);
                    reader.onload = e => {
                        this.previewImage = e.target.result;
                    }
                    this.isPreview = true;
                } else {
                    this.isNotImageType = true;
                }
                event.target.value = "";
            },
            
            saveUpload() {
                this.logoToDisplay = this.previewImage;
                this.logo = this.image;
                this.previewImage = null;
                this.image = null;
                this.isPreview = false;
            },
        },
    }
</script>
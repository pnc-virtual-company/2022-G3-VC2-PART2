<template>
    <popup-component>
        <card-components class="p-[0rem] ">
            <img v-if="!showNewImage" class="object-cover object-center w-full m-auto h-[300px] rounded-t-lg" :src="urlCover" alt="">
            <img v-if="showNewImage" class="object-cover object-center w-full m-auto h-[300px] rounded-t-lg" :src="coverImage" alt="">
            <div class="flex justify-end item-center w-full relative -top-[0.30rem] bg-red-700">
                <div class="shadow-sm shadow-[black] h-8 mr-2 w-8 rounded-full bg-white mt-[-35px] ml-[4.8rem] flex justify-end items-center">
                    <input id="upload_cover"  name="upload_img" @change="onFileChange" type="file" class="hidden">
                    <label for="upload_cover" class="h-full flex justify-center items-center rounded-full cursor-pointer hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] rounded-lg text-black cursor-pointer">
                            <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
            </div>            
            <div v-if="validation != null" id="toast-warning" class="flex items-center  justify-center p-2 m-auto max-w-xs text-red-500" role="alert">
                <div class="inline-flex justify-center items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="text-base text-red-500 font-normal">{{validation}}</div>
                <button @click="hideWarning" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="bg-white flex justify-end m-6">
                <button-components @click="hidePopup" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                    Cancel
                </button-components>
                <button-components v-if="!disabled" @click="saveUpload()" class="ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">
                    Save
                </button-components>
                <button-components v-else disabled class="ml-3 bg-blue-200 border-gray-300 font-medium text-gray-400">
                    Save
                </button-components>
            </div>
        </card-components>
    </popup-component>  
</template>

<script>
    import {userInformations} from "../../../store/userStore"
    export default {
      setup(){
          const userInfor = userInformations();
          return {
              userInfor
          }
      },
      data(){
        return {
            validation: null,
            profileImage: null,
            disabled: null,
            image: null,
            showNewImage: false,
            allowImageExtension: ['jpg', 'png', 'jpeg','gif'],
        }
      },
        computed:{
            urlCover(){
                if(this.userInfor.userData.cover.substring(0,10) == "IMG_COVER_"){
                    return this.userInfor.getImage(this.userInfor.userData.cover);
                }else{
                    return this.userInfor.userData.cover;
            }
        }
        },

      methods: {
        hidePopup() {
            this.hideWarning()
            this.$emit('click-popup')

        },
        onFileChange(e) {
            let fileExtension = e.target.files[0].name.split('.').pop();
            if (this.allowImageExtension.includes(fileExtension.toLowerCase())) {
                this.image = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(this.image);
                reader.onload = e => {
                    this.coverImage = e.target.result;
                    this.showNewImage= true;
                    this.hideWarning()
                }
            }
        },
        saveUpload(){
            if(this.coverImage!= null){
                this.userInfor.userStore.cover = this.coverImage;
                this.$emit('click-popup')
                this.hidePopup()
                let formData = new FormData();
                formData.append('cover', this.image);
                formData.append('_method', 'PUT');
                this.userInfor.uploadImage('users/update_cover/'+ this.userInfor.userData.id, formData);
            }
            this.hidePopup()
        },
        hideWarning(){
            this.validation = null;
            this.disabled = null;
        }
        }
    }
</script>
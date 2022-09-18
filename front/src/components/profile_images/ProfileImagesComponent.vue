<template>
    <div>
        <div>
            <img alt="Vue logo" class=" w-full h-[182px] rounded-t-lg" :src="urlCover" >
            <div class="flex justify-end item-center w-full relative -top-[0.30rem] bg-red-700">
                <div @click="$emit('click-cover')" class="h-8 mr-2 w-8 rounded-full bg-white mt-[-35px] ml-[4.8rem] flex justify-end items-center hover:bg-gray-300">
                    <label class=" shadow-black h-full flex justify-center items-center rounded-full cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] rounded-lg text-black cursor-pointer">
                            <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-[-6rem] ml-[20px]">
            <div class="flex flex-col items-center">
                <div>
                    <img alt="Vue logo" class="w-[148px] h-[148px] rounded-full" :src="urlProfile" width="120">
                    <div @click="$emit('click-profile')" class="shadow-sm shadow-[black] h-8 w-8 rounded-full bg-white mt-[-35px] absolute ml-[6rem] hover:bg-gray-300 flex justify-center items-center">
                        <label class="w-full h-full flex justify-center items-center rounded-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[80%] rounded-lg text-black cursor-pointer">
                                <path class="cursor-pointer" fill-rule="evenodd" d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                <path class="cursor-pointer" fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                            </svg>
                        </label>
                    </div>
                </div>
                <h1 class="bg-white font-bold text-xl mt-2">{{userInfor.userData.first_name}} {{userInfor.userData.last_name}}</h1>
            </div>
        </div>
    </div>
</template>

<script>
    import {userInformations} from "../../store/userStore"
    export default {
      setup(){
          const userInfor = userInformations();
          return {
              userInfor
          }
      },
      data(){
        return{
           
        }
      },
      computed:{

        urlCover(){
            if(this.userInfor.userData.cover.substring(0,10) == "IMG_COVER_"){
                return this.userInfor.getImage(this.userInfor.userData.cover);
            }else{
                return this.userInfor.userData.cover;
            }
        },
        urlProfile(){
            if(this.userInfor.userData.profile.substring(0,12) == "IMG_PROFILE_"){
                return this.userInfor.getImage(this.userInfor.userData.profile);
            }else{
                return this.userInfor.userData.profile;
            }
        },

      },
}
</script>
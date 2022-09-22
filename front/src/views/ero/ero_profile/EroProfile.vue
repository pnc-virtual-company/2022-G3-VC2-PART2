<template>
    <div class="w-[60%] m-auto shadow bg-white border-b-[1px] border-b-gray-300 pb-4">
            <profile-Ero-component  ></profile-Ero-component>
            <Ero-profile-information @click-popup="$emit('click-popup')">
                <template #slot1>
                        <the-email class="ml-12">{{eroData.userData.email}}</the-email>
                    </template>
            </Ero-profile-information>
            <ero-information-popup v-if="isShow" @click-popup="isShow = !isShow" ></ero-information-popup>
    </div>

</template>
<script>
    import {userInformations} from "../../../store/userStore"
    export default {
      setup(){
          const eroData = userInformations();
          return {
              eroData,
              isShow: false,
          }
      },
    }
  </script>
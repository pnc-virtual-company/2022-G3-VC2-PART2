<template>
  <alumniProfile-container v-if="alumniData.userData != null"></alumniProfile-container>
</template>

<script>
  import { userInformations } from '@/store/userStore';
      export default {
          setup(){
              const alumniData = userInformations();
              return {
                  alumniData
              }
          }
      }
  </script>
  
<template>
    <popup-component>
        <card-components>
            <h1 class="text-center font-bold text-2xl">ADD SKILLS</h1>
            <form class="bg-white">
                <div class="w-100">
                    <h1 >Skills :</h1>
                    <div class="w-full bg-white font-medium  justify-between">
                        <div class="flex h-10 bg-white mt-1 rounded-l-md border-2  border-r-2 border-gray-300 justify-between">
                                <span  class="bg-white inline-flex w-full  items-center">
                                    <img class="rounded-l-md border-2 border-r-2 w-9 h-9" src="../../../assets/preview.png" alt="">
                                    <input @click="isVisible = !isVisible" v-model="searchQury"   type="text" id="website-admin" placeholder="Skill ..." class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full outline-none border-none ">
                                </span>
                                <div class="flex justify-center">
                                    <img  class="w-5 mr-3 mt-2 h-5 justify-center align-items-center" src="../../../assets/Polygon.png" alt="">
                                </div>
                        </div>                        
                    </div>
                    <div v-if="isVisible" class="text-center rounded-l-md border-2  border-r-2 border-gray-300  overflow-y-auto">
                        <div class="overflow-y-auto max-h-36">
                            <p  v-for="sub in data" :key="sub" class="border-y-2 black cursor-pointer hover:bg-blue-300 m-0">{{sub}}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white flex justify-end mt-6">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]" >
                        Cancel
                    </button-components>
                    
                    <button-components class="ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">
                        Add
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>
<script>
export default {
    data(){
        return{
            searchQury:'',
            selectItem:null,
            isVisible:false,
            data:['HTML','CSS','JS','Node ','Node ','Node ','Node ','Node ','Node ','Node ','Node ','Node ','Node ']
        }
    },
    methods:{

    }

}
</script>

<style>

</style>
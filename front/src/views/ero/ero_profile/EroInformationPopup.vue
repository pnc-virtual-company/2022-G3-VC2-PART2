<template>
    <popup-component>
        <card-components>
            <form  class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white mt-[-15px]" >Update General Informations</h1>
                <div class="flex bg-white mt-3">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Email:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300" :class="{'border-red-400':isEmail}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                            </span>
                            <input v-model="email" type="email" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" :class="{'border-red-400':isEmail}" placeholder="Email">
                        </div>
                    </div>  
                </div>
                <div class="bg-white flex justify-end mt-6">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components class="ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">
                        Save
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>
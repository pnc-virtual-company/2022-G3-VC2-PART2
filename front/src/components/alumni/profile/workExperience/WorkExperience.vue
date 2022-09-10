<template>
    <card-profile>
        <div class="flex justify-between bg-white ">
            <h1 class="font-bold text-2xl text-sky bg-white">Work Experience</h1>
            <div class="bg-white">
                <icon-action>
                    <button class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 rounded-full hover:text-blue-700 bg-white text-sky cursor-pointer font-bold">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </icon-action>
            </div>
        </div>
        <div class="border-b-2 pb-3 text-black" @mouseover="visibleIndex = 0" @mouseout="visibleIndex = null">
            <div class="flex items-center justify-between mt-3 w-full">
                <h1 class="font-bold text-xl">Web developer</h1>
                <div class="flex relative" :class="{'invisible': visibleIndex != 0, 'visible': visibleIndex == 0}">
                    <icon-action class="mr-3">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-blue-700 text-sky cursor-pointer">
                                <path class="cursor-pointer" fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </icon-action>
                    <icon-action>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-blue-700 text-sky cursor-pointer">
                                <path class="cursor-pointer" fill-rule="evenodd" d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                        </button>
                    </icon-action>
                </div>
            </div>
            <p class="text-[18px] mt-3">VP.Start Co,Ltd</p>
            <p class="text-[18px] mt-3">Oct 2021 - present</p>
        </div>
    </card-profile>
</template>

<script>
    export default {
        data() {
            return {
                visibleIndex: null,
            }
        },
    }
</script>
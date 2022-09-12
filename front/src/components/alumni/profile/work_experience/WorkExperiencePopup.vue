<template>
    <popup-component>
        <card-components>
            <form class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Update work experience</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Companies:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </span>
                            <select id="" class="rounded-none bg-white cursor-pointer font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md">
                                <option class="cursor-pointer" v-for="company of companies" :key="company" :value="company">{{company}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-full bg-white font-medium">
                        <span class="bg-white">Position:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[26px] h-[26px]"  src="../../../../assets/position.png" alt="">
                            </span>
                            <input type="text" id="website-admin" placeholder="position" class="rounded-none pl-3 bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" >
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Start date:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input type="date" id="website-admin" class="rounded-none bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="email">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">End date:</span>
                        <div class="flex bg-white mt-1">
                            <span class="inline-flex items-center p-2 text-sm bg-white rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                            <input type="date" id="website-admin" class="rounded-none bg-white font-normal text-base block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-3 bg-white">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 bg-white font-base">I'm currently working this position</label>
                </div>
                <div class="bg-white flex justify-end mt-4">
                    <button-components @click="$emit('click-popup')" class="hover:bg-gray-200 hover:text-sky">
                        Cancel
                    </button-components>
                    <button-components class="ml-3 bg-sky font-medium text-white hover:text-blue-200 hover:bg-sky-hover">
                        Save
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>


<script>
    export default {
        data(){
            return {
                companies:["Renet Japan","Cellcard","Cathay United Bank", " WING Bank", "Forval", "Slash", "VP.Start", "Camsolution","Cambodia Public Bank (Campu Bank)", "Amret", "RHB Bank", "Zination","UDAYA", "Vectorasoft", "Mango Byte", "Nokor Tech", "Z1 Flexible Solution", "Dynamo Tech Solution", "Woori Bank", "First Cambodia" ,"Online ISP", "Canadia Bank", "NTT Company","WEB Essential", "ATech Group", "Techbodia company", 'Proseth Solution', 'NTC Company'],
            }
        }
    }
</script>

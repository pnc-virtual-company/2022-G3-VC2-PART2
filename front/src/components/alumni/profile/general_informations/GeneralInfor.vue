<template>
    <card-components>
        <div class="flex justify-between bg-white ">
            <h1 class="font-bold text-2xl text-sky bg-white">General Informations</h1>
            <icon-action>
                <button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-blue-700 bg-white text-sky cursor-pointer">
                        <path class="cursor-pointer" d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                </button>
            </icon-action>
        </div >
        
        <div class="flex justify-between bg-white w-full">
            <div class="flex bg-white w-[50%]">
                <div class="font-bold bg-white w-[33%]">
                    <p class="text-[20px] bg-white mt-3">Gender</p>
                    <p class="text-[20px] bg-white mt-3">Major</p>
                </div>
                <div class="ml-auto bg-white w-[67%]">
                    <p class="text-[20px] bg-white mt-3">Female</p>
                    <p class="text-[20px] bg-white mt-3">WEB Developer</p>
                </div>
            </div>

            <div class="flex bg-white w-[50%]">
                <div class="font-bold bg-white w-[33%]">
                    <p class="text-[20px] bg-white mt-3">Birth Date</p>
                    <p class="text-[20px] bg-white mt-3">Address</p>
                </div>
                <div class="bg-white w-[67%]">
                    <p class="text-[20px] bg-white mt-3">11/08/2000</p>
                    <p class="text-[20px] bg-white mt-3">Toul Kork, Pursat</p>
                </div>
            </div>
        </div>
    </card-components>
</template>

<template>
    <div class="shadow-lg bg-white p-[10px] mt-5 rounded-md flex">
        <div class="w-[13%] flex justify-center">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-1"></slot>
            </span><br>
        </div>
        <div class="w-[43%]">
            <span class="text-lg font-meduim ">
                <slot name="title-2"></slot>
            </span><br>
            <span class="capitalize text-lg text-[#664c4c]">
                <slot name="text-3"></slot>
            </span>
        </div>
        <div class="w-[44%]">
            <span class="text-lg font-meduim ">
                <slot name="title-4"></slot>
            </span><br>
            <div>
                <span class=" capitalize text-lg text-[#664c4c] flex">
                    <slot name="text-5"></slot>
                    <slot name="text-6" class="ml-12"></slot>
                </span>
                <!-- <span class=" capitalize text-lg text-[#664c4c]">
                    <slot name="text-6"></slot>
                </span> -->
            </div>
        </div>
        <!-- <div class="w-[15%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-4"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-4"></slot>
            </span>
        </div> -->
        <!-- <div class="w-[15%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-5"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-5"></slot>
            </span>
        </div> -->
        
    </div>
</template>
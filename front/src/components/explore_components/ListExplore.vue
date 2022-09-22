<template>
    <div class="shadow-lg bg-white p-[10px] mt-5 rounded-md flex items-center">
        <div class="w-[7%] flex items-center">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-1"></slot>
            </span><br>
        </div>
        <div class="w-[16%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-2"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-2"></slot>
            </span>
        </div>
        <div class="w-[14%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-3"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-3"></slot>
            </span>
        </div>
        <div class="w-[14%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-4"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-4"></slot>
            </span>
        </div>
        <div class="w-[14%]">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-5"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-5"></slot>
            </span>
        </div>
        <div class="w-[35%] ">
            <span class="capitalize text-lg text-[#ccc]">
                <slot name="title-6"></slot>
            </span><br>
            <div class="flex">
                <span class="text-lg font-meduim ">
                    <slot name="text-6"></slot>
                </span>
                <span class="text-lg font-meduim ">
                    <slot name="text-7"></slot>
                </span>
            </div>
        </div>
    </div>
</template>
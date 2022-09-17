<template>
    <div class="mt-2 p-[20px] flex  bg-white">
        <div class="w-11/12 bg-white">
            <div class="flex bg-white">
                <slot name="slot1"></slot>
                <slot name="slot2"></slot>
            </div>
            <div class="bg-white flex">
                <slot name="slot3"></slot>
                <slot name="slot4"></slot>
            </div>
            <div class="bg-white flex">
                <slot name="slot5"></slot>
                <slot name="slot6"></slot>
            </div>
            <div class="bg-white flex">
                <slot name="slot7"></slot>
                <slot name="slot8"></slot>
            </div>
            <div class="flex bg-white ">
                <slot name="slot9"></slot>
                <slot name="slot10"></slot>
            </div>
        </div>
        <div class="w-1/12 flex justify-end bg-white">
            <icon-action @click="$emit('click-popup')">
                <button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-blue-700 text-sky cursor-pointer">
                        <path class="cursor-pointer" d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                </button>
            </icon-action>
        </div>
    </div>
</template>
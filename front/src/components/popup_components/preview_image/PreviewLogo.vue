<template>
    <div class="fixed top-0 left-0 z-50 w-full h-screen flex items-center justify-center bg-gray-500 bg-opacity-50">
        <card-components class="flex flex-col items-center bg-white w-fit">
            <div class="w-40 h-40 rounded-full">
                <slot></slot>
            </div>
            <div class="bg-white flex justify-end mt-4">
                <button-components @click="$emit('discard')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                    Discard
                </button-components>
                <button-components @click="$emit('confirm')" class="ml-3 bg-sky font-medium text-white hover:bg-sky-hover">
                    Confirm
                </button-components>
            </div>
        </card-components>
    </div>
</template>
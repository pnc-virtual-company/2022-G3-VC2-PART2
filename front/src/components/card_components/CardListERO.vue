<template>
    <div class="shadow shadow-gray-400 bg-white p-[10px] mt-5 rounded-[7px] flex justify-between items-center">
        <div class="w-[10%]">
            <slot name="title-1"></slot>
        </div>
        <div class="w-[25%]">
            <span class="capitalize text-lg text-[#ada5a5]">
                <slot name="title-2"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-2"></slot>
            </span>
        </div>
        <div class="w-[45%]">
            <span class="capitalize text-lg text-[#ada5a5]">
                <slot name="title-3"></slot>
            </span><br>
            <span class="text-lg font-meduim ">
                <slot name="text-3"></slot>
            </span>
        </div>
        <div class="w-[15%] text-center">
            <span class="text-center text-[#ada5a5]">Actions</span>
            <div class="flex justify-center items-center">
                <slot name="button-details"></slot>
                <button class="ml-2 hover: rounded-full p-2 flex justify-center items-center" @click="$emit('delete-item')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-sky cursor-pointer hover:text-sky-hover">
                        <path class="cursor-pointer" fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        methods:{
            deleteEro(){
                let deleteEro = {eros:this.eros}
                console.log(deleteEro)
            }
        }
    }
</script>

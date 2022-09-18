<template>
    <popup-component>
        <card-components class="w-[40%]">
            <div class="flex flex-col items-center">
                <p class="mt-0 text-2xl font-bold">Reset your password</p>
                <div class="w-full mt-3 bg-white">
                    <span class="bg-white font-medium">Current password:</span>
                    <input type="password" id="website-admin" class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" placeholder="Current password">
                </div>
                <div class="w-full mt-3 bg-white">
                    <span class="bg-white font-medium">New password:</span>
                    <input type="password" id="website-admin" class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" placeholder="New password">
                </div>
                <div class="w-full mt-3 bg-white">
                    <span class="bg-white font-medium">Confirm new password:</span>
                    <input type="password" id="website-admin" class="font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-md outline-sky" placeholder="Confirm new password">
                </div>
                <div class="flex justify-end w-full mt-5">
                    <button-components @click="$emit('click-reset')" class="mr-3 font-bold bg-[#a0a0a0] hover:bg-[#969696] text-white border-none">Cancel</button-components>
                    <button-components class="bg-sky font-bold hover:bg-sky-hover text-white border-none">Save</button-components>
                </div>
            </div>
        </card-components>
    </popup-component>
</template>
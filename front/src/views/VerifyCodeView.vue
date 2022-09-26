<template>
    <div class=" ">

        <div class="flex  w-[95%] m-auto   ">
            <div class=" w-[40%]">
                <img src="../assets/Logo-pn.png" class="w-[100%] h-[56%] mt-[20%]">
            </div>
            <div class="mt-[10%] w-[60%] ">
                <div class="form  w-[80%] mt-[3%] ml-[120px] bg-white opacity-[60%] p-[10px] rounded-[7px]">
                    <form class="p-[5px]">
                    <h1 class="text-[#2EA3F2] text-[2.5rem] text-center">Verify Code</h1>
                    <p class="text-[#2EA3F2] text-center text-[1.2rem] w-[60%] m-auto">Please enter the 6-digit verification code we sent via Gmail:</p>
                        <div class="relative z-0 mb-6 w-full group p-[5px] flex">
                            <div class=" mb-[-1.22px]  w-[90%] m-auto flex ">
                                    <input type="text"
                                        class=" w-full text-lg   border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                        placeholder="Verify Code">                               
                            </div>
                        </div>
                        
                        <div class="z-0 mb-6 w-full group p-[5px] flex" >
                            <button type="submit"
                                class="w-[90%] text-center ml-auto m-auto text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style>

</style>
<template>
    <div>
        <div class="flex  w-[95%] m-auto mt-0  ">
            <div class=" w-[40%] mt-[15%] flex justify-center align-items-md-center">
                <img src="../../assets/Logo-pn.png" class="w-[100%] h-[82%]">
            </div>
            <div class="mt-[10%] w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Regester Account </p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[20px] rounded-[7px]">
                    <form class="p-[5px]">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name" class="focus:border-blue-600 outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="First name" >
                            </div>
                            <div>
                                <input type="text" id="last_name" class="focus:border-blue-600 outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last name" >
                            </div>
                        </div>
                        <div class="w-[90%] m-auto">
                            <button type="submit"
                                class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regester</button>
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



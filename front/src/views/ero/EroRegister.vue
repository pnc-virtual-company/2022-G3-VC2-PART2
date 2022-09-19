<template>
    <div>
        <div class="flex  w-[95%] m-auto mt-[5%]">
            <div class=" w-[40%] mt-[2%]   flex justify-center  align-items-md-center">
                <img src="../../assets/Logo-pn.png" class="w-[100%] h-[60%] mt-[20%]">
            </div>
            <div class="mt-[6%] w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Register Account </p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[15px] rounded-[7px]">
                    <form class="p-[5px]">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name"
                                    class="block py-2.5 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="First name">
                            </div>
                            <div>
                                <input type="text" id="last_name"
                                    class="block py-2.5 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="w-[90%] m-auto">
                            <button type="submit"
                                class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
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



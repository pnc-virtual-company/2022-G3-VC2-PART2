<template>
    <div>
        <div class="flex items-center w-[95%] m-auto ">
            <div class=" w-[40%]  flex justify-center align-items-md-center ">
                <img src="../../assets/Logo-pn.png" class="w-[100%] h-[56%] ">
            </div>
            <div class=" w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[#2EA3F2]">Register Account </p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[65%] p-[15px] rounded-[7px]">
                    <form class="p-[2px]">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="First name">
                            </div>
                            <div>
                                <input type="text" id="last_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Batch">
                            </div>
                            <div>
                                <input type="text" id="last_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="Major">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto ">
                            <div>
                                <input type="text" id="first_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Phone">
                            </div>
                            <div>
                                <input type="text" id="last_name"
                                    class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer "
                                    placeholder="Telegram">
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="text" name="date_birth" id="date_birth"
                                class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Date of Birth: e.g: 2022-08-27 " required="">
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="text" name="text" id="text"
                                class="block py-1 px-0 w-full text-lg text-black-500  bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" Address" required="">
                        </div>
                        <div class="grid gap-3 mb-2 md:grid-cols-1 w-[90%] m-auto">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center">
                                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300  ">
                                    <label for="default-radio-1"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300 outline-none border-none">Male</label>
                                </div>
                                <div class="flex items-center ml-4">
                                    <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 ">
                                    <label for="default-radio-2"
                                        class="ml-1 text-lg font-medium text-black-500  dark:text-gray-300">Femail</label>
                                </div>
                            </div>
                        </div>

                        <div class="w-[90%] m-auto pb-3">
                            <button type="submit"
                                class=" text-white w-full bg-[#2EA3F2] hover:bg-blue-00 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem]  px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
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



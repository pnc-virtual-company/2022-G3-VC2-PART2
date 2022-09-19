<template>
        <div >
            <div class="flex items-center w-[95%] m-auto ">
                    <div class=" w-[40%] flex justify-center align-items-md-center">
                        <img src="../../assets/Logo-pn.png" class="w-[100%] h-[50%] mt-3">
                    </div>
                    <div class=" w-[60%]">
                        <header class="text-center text-[3rem] ml-[90px]">
                            <p class="text-[#2EA3F2]">Regester Account </p>
                        </header>
                    <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[20px] rounded-[7px]">
                    <form class="p-[2px]">
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name" class="focus:border-blue-600 peer outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="First name" >
                            </div>
                            <div>
                                <input type="text" id="last_name" class="focus:border-blue-600 peer outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last name" >
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                            <div>
                                <input type="text" id="first_name" class="focus:border-blue-600 peer outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="Batch" >
                            </div>
                            <div>
                                <input type="text" id="last_name" class="focus:border-blue-600 peeroutline-none outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Major" >
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto ">
                            <div>
                                <input type="text" id="first_name" class="focus:border-blue-600 peer outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="Phone" >
                            </div>
                            <div>
                                <input type="text" id="last_name" class="focus:border-blue-600 peer outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Telegram" >
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full  text-gray-900 text-sm bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder="Date of Birth " required=""
                            >
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-1 w-[90%] m-auto">
                            <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-gray-900 text-sm bg-transparent border-0 border-b-2 border-gray-300 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" Address" required=""
                            >
                        </div>
                        <div class="grid gap-3 mb-2 md:grid-cols-1 w-[90%] m-auto">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center">
                                    <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300  ">
                                    <label for="default-radio-1" class="ml-1 text-sm font-medium text-gray-900 dark:text-gray-300 outline-none border-none">Male</label>
                                </div>
                                <div class="flex items-center ml-4">
                                    <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 ">
                                    <label for="default-radio-2" class="ml-1 text-sm font-medium text-gray-900 dark:text-gray-300">Femail</label>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="w-[90%] m-auto">
                            <button type="submit"
                            class=" text-white w-full bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem]  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regester</button>
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



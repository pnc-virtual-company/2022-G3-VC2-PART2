<template>
    <div class="bg-cover bg-center h-screen bg-gradient-to-tl from-[#ADD8E6] to-[#ADD8E6]  relative ">
        <img src="../assets/background-1.png"
            class="w-full h-[100vh] object-cover absolute mix-blend-overlay opacity-[60%]">
        <div class="flex  w-[95%] m-auto   ">
            <div class=" w-[40%] mt-[15%] flex justify-center align-items-md-center">
                <img src="../assets/Logo-pn.png" class="w-[95%] h-[80%]">
            </div>
            <div class="mt-[10%] w-[60%] ">
                <header class="text-center text-[3rem] ml-[90px]">
                    <p class="text-[rgb(44,98,247)]">WELCOME BACK</p>
                </header>
                <div class="form  w-[80%] ml-[120px] bg-white opacity-[60%] p-[20px] rounded-[7px]">
                    <form>
                        <div class="relative z-0 mb-6 w-full group ">
                            <input type="email" name="floating_email" id="floating_email"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required="">
                            <label for="floating_email"
                                class="peer-focus:font-large absolute text-lg text-black-500 dark:text-black-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[rgb(44,98,247)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                address</label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="password" name="floating_password" id="floating_password"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required="">
                            <label for="floating_password"
                                class="peer-focus:font-large absolute text-lg text-black-500 dark:text-black-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[rgb(44,98,247)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        </div>
                        <div class="text-center text-[1.1rem] text-bold  text-[rgb(44,98,247)] pb-2 underline ">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class="">
                            <button type="submit"
                                class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
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
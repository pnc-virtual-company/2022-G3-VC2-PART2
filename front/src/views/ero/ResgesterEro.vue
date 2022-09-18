<template>
    <div>
        <div class=" w-full m-auto ">
            <div class="mt-20">
                <div class="flex">
                    <div class="w-[50%] mt-28 ml-36 " >
                        <img class="bg-[#c2deeb] h-36 rounded-lg" src="../../assets/regester.png" alt="">
                    </div>
                    <div class="w-[50%] mt-16">
                        <h1 class="text-black text-4xl text-center">Regester Account</h1>
                        <form class="w-[90%] bg-[#c2deeb] p-3 rounded-lg mt-2">
                            <div class="grid gap-6 mb-6 md:grid-cols-2 w-[90%] m-auto">
                                <div>
                                    <input type="text" id="first_name" class=" outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="First name" >
                                </div>
                                <div>
                                    <input type="text" id="last_name" class="outline-none bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last name" >
                                </div>
                            </div>
                           
                            <div class="w-[50%] m-auto">
                                <button type="submit" class="text-white bg-sky hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-[1.1rem] w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regester</button>
                            </div>
                        </form>
                </div>
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
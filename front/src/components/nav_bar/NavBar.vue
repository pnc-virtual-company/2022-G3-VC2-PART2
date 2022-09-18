<template>
    <nav class="w-full bg-white sticky top-0 z-50 shadow">
        <div class="w-full flex justify-between items-center py-[0.13rem] px-6">
            <div>
                <img class="w-14" src="../../assets/PNCaa.jpg">
            </div>
            <div class="flex items-center">
                <router-link class="mr-6 py-1 rounded-lg px-4 flex items-center"  to="/admin-management">
                    <img class="w-11" src="../../assets/manage.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Manage</p>
                </router-link>
                <router-link :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'profile' }" class="mr-6 py-1 rounded-lg px-4 flex items-center" to="/profile">
                    <img class="w-11" src="../../assets/avata.png" alt="">
                    <p class="ml-3 text-[22px] font-medium">Koev Song</p>
                </router-link>
                <router-link :class="{ 'hover:bg-gray-200 hover:text-black': this.$route.name != 'logout' }" class="flex py-2 px-4 rounded-lg items-center" to="/logout">
                    <img class="w-[2rem]" src="../../assets/logout.png" >
                    <p class="ml-3 text-[18px] font-medium">Log out</p>
                </router-link>
            </div>
        </div>
    </nav>
</template>

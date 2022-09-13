<template>
    <popup-component>
        <card-components>
            <form class="bg-white">
                <h1 class="text-center font-bold text-2xl bg-white" >Update General Informations</h1>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">First Name:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg class="w-[28px] h-[28px] text-white bg-sky rounded-full p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            </span>
                            <input type="text" v-model="firstName" class=" rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="First Name">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Last Name:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg class="w-[28px] h-[28px] text-white bg-sky rounded-full p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            </span>
                            <input type="text" v-model="lastName" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Email:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                            </span>
                            <input v-model="email" type="text" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="Email">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Batch:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                                    <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                                </svg>
                            </span>
                            <input type="text" v-model="batch" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="Batch">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Phone:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm   rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                            </svg>
                            </span>
                            <input type="text" v-model="phone" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full border-gray-300 border-2 p-2 rounded-r-md" placeholder="Phone">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Telegram:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[26px] h-[26px]"  src="../../../assets/telegram.jpg" alt="">
                            </span>
                            <input type="text" v-model="telegram" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-r-md" placeholder="Telegram">
                        </div>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Major:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                    <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                    <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                                </svg>
                            </span>
                            <input v-model="major" type="text" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-r-md" placeholder="Major">
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Address:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input v-model="address" type="text" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-r-md" placeholder="Address">
                        </div>
                    </div>
                </div>
                <div class="flex bg-white mt-4">
                    <div class="w-2/4 bg-white font-medium mr-2">
                        <span class="bg-white">Gender:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <img class="w-[26px] h-[26px]"  src="../../../assets/gender.jpg" alt="">
                            </span>
                            <select v-model="gender" id="" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-r-md">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-2/4 bg-white font-medium ml-2">
                        <span class="bg-white">Birth date:</span>
                        <div class="flex bg-white mt-1">
                            <span class="bg-white inline-flex items-center p-2 text-sm rounded-l-md border-2 border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[26px] h-[26px] text-white bg-sky rounded-full p-1">
                                    <path d="M15 1.784l-.796.796a1.125 1.125 0 101.591 0L15 1.784zM12 1.784l-.796.796a1.125 1.125 0 101.591 0L12 1.784zM9 1.784l-.796.796a1.125 1.125 0 101.591 0L9 1.784zM9.75 7.547c.498-.02.998-.035 1.5-.042V6.75a.75.75 0 011.5 0v.755c.502.007 1.002.021 1.5.042V6.75a.75.75 0 011.5 0v.88l.307.022c1.55.117 2.693 1.427 2.693 2.946v1.018a62.182 62.182 0 00-13.5 0v-1.018c0-1.519 1.143-2.829 2.693-2.946l.307-.022v-.88a.75.75 0 011.5 0v.797zM12 12.75c-2.472 0-4.9.184-7.274.54-1.454.217-2.476 1.482-2.476 2.916v.384a4.104 4.104 0 012.585.364 2.605 2.605 0 002.33 0 4.104 4.104 0 013.67 0 2.605 2.605 0 002.33 0 4.104 4.104 0 013.67 0 2.605 2.605 0 002.33 0 4.104 4.104 0 012.585-.364v-.384c0-1.434-1.022-2.7-2.476-2.917A49.138 49.138 0 0012 12.75zM21.75 18.131a2.604 2.604 0 00-1.915.165 4.104 4.104 0 01-3.67 0 2.604 2.604 0 00-2.33 0 4.104 4.104 0 01-3.67 0 2.604 2.604 0 00-2.33 0 4.104 4.104 0 01-3.67 0 2.604 2.604 0 00-1.915-.165v2.494c0 1.036.84 1.875 1.875 1.875h15.75c1.035 0 1.875-.84 1.875-1.875v-2.494z" />
                                </svg>
                            </span>
                            <input type="date" v-model="birthDate" class="rounded-none outline-sky bg-white font-normal text-base  block flex-1 min-w-0 w-full  border-gray-300 border-2 p-2 rounded-r-md">
                        </div>
                    </div>
                </div>
                <div class="bg-white flex justify-end mt-6">
                    <button-components @click="$emit('click-popup')" class="bg-[#a0a0a0] text-white font-medium border-none hover:bg-[#969696]">
                        Cancel
                    </button-components>
                    <button-components @click="updateGeneralInfor()" class="ml-3 bg-sky font-medium text-white  hover:bg-sky-hover">
                        Save
                    </button-components>
                </div>
            </form>
        </card-components>
    </popup-component>
</template>
<script>
    import {userInformations} from "../../../store/userStore"
    export default {
      setup(){
          const userInfor = userInformations();
          return {
              userInfor
          }
      },
      data(){
        return {
            userGeneralInfor: this.userInfor.userData,
            firstName: "",
            lastname: "",
            email: "",
            gender: "",
            major: "",
            batch: "",
            birthDate: "",
            addresh: "",
            phone: "",
            telegram: "",
        }
      },
      methods:{
        updateGeneralInfor(){
            let dataUpdate = {
                first_name: this.firstName, 
                last_name: this.lastName, 
                email: this.email, 
                gender: this.gender, 
                major: this.major, 
                batch: this.batch, 
                birth_date: this.birthDate, 
                phone: this.phone, 
                telegram: this.telegram,
                address: this.address,
            }
            this.$emit('update-data', dataUpdate)
            this.$emit('click-popup')
        },
        setData(){
            this.firstName = this.userGeneralInfor.first_name;
            this.lastName = this.userGeneralInfor.last_name;
            this.gender = this.userGeneralInfor.alumni.gender;
            this.email = this.userGeneralInfor.email;
            this.batch = this.userGeneralInfor.alumni.batch;
            this.birthDate = this.userGeneralInfor.alumni.birth_date;
            this.address = this.userGeneralInfor.alumni.address;
            this.major = this.userGeneralInfor.alumni.major;
            this.phone = this.userGeneralInfor.alumni.phone;
            this.telegram = this.userGeneralInfor.alumni.telegram;
        }
      },
      mounted(){
        this.setData()
      }
    }
</script>
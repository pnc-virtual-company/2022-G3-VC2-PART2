<template>  
<div class="container ">
    <div class="ml-[7rem] mt-[-1rem]">
      <div class="flex justify-end">  
          <div  class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
            <slot></slot>
        </div>
      </div>
    </div>
    <div class="fixed top-0 z-50 w-full h-screen flex items-center justify-center bg-gray-700 bg-opacity-50">
        <slot></slot>
    </div>
  </div>  
</template> 
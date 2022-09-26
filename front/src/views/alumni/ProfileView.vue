<template>
        <div class="mb-[20px]">
                <div class="mt-[20px]">
                        <general-information-container @alert-success="(message) => { $emit('alert-success', message); }"></general-information-container>
                </div>
                <div class="mt-[20px]">
                        <work-experience-container></work-experience-container>             
                </div>
                <div class="mt-[20px]">
                        <education-background-container></education-background-container>             
                </div>
        </div>
</template>

<script>

</script>
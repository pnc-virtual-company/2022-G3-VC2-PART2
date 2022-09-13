
<template>
    <card-components>
        <div class="">
            <div class="border-b-[1px] border-b-gray-300 pb-4">
                <profile-images-component></profile-images-component>
            </div>
            <general-information-component @click-popup="$emit('click-popup')">
                <template #slot1>
                    <the-email>key@gmail.com</the-email>
                </template>
                <template #slot2>
                    <the-batch>2022</the-batch>
                </template>
                <template #slot3>
                    <the-phone>097099009</the-phone>
                </template>
                <template #slot4>
                    <the-telegram>097877654</the-telegram>
                </template>
                <template #slot5>
                    <the-major>WEB</the-major>
                </template>
                <template #slot6>
                    <the-address>Toul kork, Battambang</the-address>
                </template>
                <template #slot7>
                    <the-gender>Male</the-gender>
                </template>
                <template #slot8>
                    <the-birthdate>2022-09-12</the-birthdate>
                </template>
            </general-information-component>
        </div>
    </card-components>
</template>

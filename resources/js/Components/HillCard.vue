<script setup>
import { getHeightInMeters } from '@/functions';

defineProps({
    hill: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <!-- Hill Card - Grid [Image|Text]  -->
    <div
        name="hill-card"
        data-test="hill-card"
        class="rounded-l-full grid grid-cols-2 transition duration-500 ease-in-out rounded bg-white hover:bg-gray-100 transform hover:-translate-y-1 hover:scale-105 w-full hover:no-underline shadow"
    >
        <div>
            <img class="rounded-full object-cover h-48 w-96" src="images/hill-card.jpg" />
        </div>
        <div class="flex flex-col justify-between text-center m-5">
            <div>
                <div
                    name="hill-card-name"
                    data-test="hill-card-name"
                    class="text-gray-900 font-bold text-l mb-2"
                >
                    {{ hill.name }}
                </div>
                <div data-test="hill-card-height" class="text-gray-700">
                    {{ `${hill.height}ft / ${getHeightInMeters(hill.height)}m` }}
                </div>
                <div data-test="hill-card-grid-ref" class="text-gray-700">
                    {{ `${hill.grid_ref}` }}
                </div>
            </div>
            <div class="flex flex-row-reverse">
                <span
                    data-test="hill-card-type-badge"
                    class="bg-munro-100 text-black-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-munro-dark-300 dark:text-black-300"
                >
                    {{ `${hill.type}` }}
                </span>
            </div>
        </div>
    </div>
</template>

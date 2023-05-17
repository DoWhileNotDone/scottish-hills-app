<script setup>
defineProps({
    hill: {
        type: Object,
        required: true,
    },
});

const getHeightInMeters = heightFt => Math.round(heightFt / 3.281);
</script>

<template>
    <!-- Hill Card - Grid [Image|Text]  -->
    <div
        class="rounded-l-full grid grid-cols-2 transition duration-500 ease-in-out rounded bg-white hover:bg-gray-100 transform hover:-translate-y-1 hover:scale-105 w-full hover:no-underline shadow"
    >
        <div>
            <img
                class="rounded-full object-cover h-48 w-96"
                src="https://images.unsplash.com/photo-1554629947-334ff61d85dc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1024&amp;h=1280&amp;q=80"
            />
        </div>
        <div class="flex flex-col justify-between text-center m-5">
            <div>
                <div class="text-gray-900 font-bold text-l mb-2">{{ hill.name }}</div>
                <div class="text-gray-700">
                    {{ `${hill.height}ft / ${getHeightInMeters(hill.height)}m` }}
                </div>
                <div class="text-gray-700">{{ `${hill.grid_ref}` }}</div>
            </div>
            <div class="flex flex-row-reverse">
                <span
                    class="bg-munro-100 text-black-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-munro-dark-300 dark:text-black-300"
                >
                    {{ `${hill.type}` }}
                </span>
            </div>
        </div>
    </div>
</template>

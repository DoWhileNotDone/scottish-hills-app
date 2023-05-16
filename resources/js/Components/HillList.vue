<script setup>
import HillCard from '@/Components/HillCard.vue';

import { storeToRefs } from 'pinia';
import { useHillsStore } from '@/stores/hills';

const { filteredHills } = storeToRefs(useHillsStore());
</script>

<template>
    <section>
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">
                Hill List
            </h1>
            <!-- Hills - Grid 1 or 2 cols -->
            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                <template v-for="hill in filteredHills" :key="hill.id">
                    <transition name="hills" appear>
                        <HillCard :hill="hill"></HillCard>
                    </transition>
                </template>
            </div>
        </div>
    </section>
</template>

<style>
.hills-enter-active,
.hills-leave-active {
    transition: all 0.5s ease-in-out;
}

.hills-enter-from {
    opacity: 0;
    transform: translateX(300px);
}

.hills-leave-to {
    opacity: 0;
    transform: translateX(-300px);
}
</style>

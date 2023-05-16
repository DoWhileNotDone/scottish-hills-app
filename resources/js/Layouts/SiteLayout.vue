<script setup>
import SiteHeader from '@/Headers/SiteHeader.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <site-header />

        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>

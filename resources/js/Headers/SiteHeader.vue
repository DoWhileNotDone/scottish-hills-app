<script setup>
import AuthenticatedHeader from '@/Headers/AuthenticatedHeader.vue';
import GuestHeader from '@/Headers/GuestHeader.vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <component :is="page.props.auth.user ? AuthenticatedHeader : GuestHeader" />
</template>

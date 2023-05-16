<script setup>
import AuthenticatedHeader from '@/Headers/AuthenticatedHeader.vue';
import GuestHeader from '@/Headers/GuestHeader.vue';
</script>

<template>
    <component :is="$page.props.auth.user ? AuthenticatedHeader : GuestHeader" />
</template>

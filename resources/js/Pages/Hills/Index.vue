<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/SiteLayout.vue';
import HillList from '@/Components/HillList.vue';
import HillSearch from '@/Components/HillSearch.vue';

import { useHillsStore } from '@/stores/hills';

const { setHills } = useHillsStore();

const props = defineProps({
    hills: {
        type: Array,
        required: true,
    },
});

setHills(props.hills);
</script>

<template>
    <Head title="Hill List" />
    <Layout>
        <hill-search />
        <hill-list />
    </Layout>
</template>

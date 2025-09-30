<script setup lang="ts">

import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import { BreadcrumbItem } from '@/types';

const props = defineProps<{
    notes: any;
}>();

const breadcrumbs = computed<BreadcrumbItem[]>(() => [
    { title: 'note', href: route('notes.index') },
    { title: 'list of notes', href: route('notes.show'), isCurrent: true },
])
</script>

<template>
    <Head title="Notes" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <pre>{{ props.notes }}</pre>
    </AppLayout>
</template>

<style scoped>

</style>

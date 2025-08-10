<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Notes',
        href: '/notes',
    },
];
</script>

<template>
    <Head title="Notes" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <h1>Manage your notes smartly</h1>

        <section>
            <h2>create a note</h2>
        </section>
        <section>
            <h2>review your notes</h2>
        </section>
        <section>
            <h2>delete a note</h2>
        </section>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

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
        <div class="relative h-screen">
            <!-- Background Pattern -->
            <div class="absolute inset-0">
                <div class="absolute h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]"></div>
            </div>
            <!-- Hero Content -->
            <div class="relative z-10 flex h-full flex-col items-center justify-center px-4">
                <div class="max-w-3xl text-center">
                    <h1 class="mb-8 text-4xl font-bold tracking-tight text-slate-900 sm:text-6xl lg:text-7xl">
                        Start managing your
                        <span class="text-sky-900">Notes</span>
                    </h1>
                    <p class="mx-auto mb-8 max-w-2xl text-lg text-slate-700">
                        Note taking has never been so easily token care of! From creating, editing, reviewing to deleting, SmartNote has your back.
                    </p>
                    <div class="flex flex-wrap justify-center  flex-col gap-y-4 sm:flex-row sm:gap-4">
                        <Link :href="route('notes')" class="rounded-lg bg-sky-900 px-6 py-3 font-medium text-white hover:bg-sky-800">
                            Create
                        </Link>
                        <Link
                            :href="route('notes')"
                            class="rounded-lg border border-slate-200 bg-white px-6 py-3 font-medium text-slate-900 hover:bg-slate-50"
                        >
                            View
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

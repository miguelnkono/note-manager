<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { BookmarkIcon, Circle, ClipboardListIcon, FileText, LightbulbIcon, LoaderCircle, PencilIcon, PlusIcon } from 'lucide-vue-next';
import { computed } from 'vue';

const breadcrumbs = computed<BreadcrumbItem[]>(() => [
    { title: 'note', href: route('notes.index') },
    { title: 'Notes a new note', href: route('notes.create'), isCurrent: true },
]);

// form object to submit the form information.
const form = useForm({
    title: '',
    description: '',
    content: '',
});

// function to be executed when we submit the form.
const submit = () => {
    form.post(route('notes.store'), {
        onFinish: () => form.reset('description'),
    });
};
</script>

<template>
    <Head title="Create a new note" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 transition-colors duration-300 dark:from-gray-900 dark:to-blue-900/20">
            <!-- Animated Background -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="animate-pulse-slow absolute h-full w-full bg-white bg-[radial-gradient(theme(colors.blue.400)_0.5px,transparent_0.5px)] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_50%,black_40%,transparent_100%)] [background-size:16px_16px] dark:bg-gray-900 dark:bg-[radial-gradient(theme(colors.blue.700)_0.5px,transparent_0.5px)]"
                ></div>
                <div
                    class="animate-gradient-x absolute inset-0 bg-gradient-to-br from-transparent via-blue-50/50 to-transparent dark:via-blue-900/10"
                ></div>
            </div>

            <!-- Form Container -->
            <div class="relative z-10 px-4 py-8 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <!-- Header -->
                    <div class="mb-8 text-center">
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Create New Note</h1>
                        <p class="text-gray-600 dark:text-gray-300">Organize your thoughts and ideas</p>
                    </div>

                    <!-- Form Card -->
                    <div
                        class="rounded-2xl border border-blue-200/50 bg-white/80 p-6 shadow-xl backdrop-blur-sm transition-all duration-300 hover:border-blue-300/70 hover:shadow-2xl sm:p-8 dark:border-blue-700/30 dark:bg-gray-800/80 dark:hover:border-blue-600/40"
                    >
                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Title Field -->
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <Label for="title" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <BookmarkIcon class="h-4 w-4" />
                                        Note Title
                                    </Label>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Required</span>
                                </div>
                                <div class="relative">
                                    <Input
                                        id="title"
                                        type="text"
                                        required
                                        autofocus
                                        :tabindex="1"
                                        v-model="form.title"
                                        placeholder="Enter a meaningful title..."
                                        class="w-full border-blue-200/50 bg-white/50 pl-10 transition-colors duration-200 focus:border-blue-400 dark:border-gray-600 dark:bg-gray-700/50 dark:focus:border-blue-500"
                                    />
                                    <PencilIcon class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 transform text-gray-400 dark:text-gray-500" />
                                </div>
                                <InputError :message="form.errors.title" />
                            </div>

                            <!-- Description Field -->
                            <div class="space-y-2">
                                <Label for="description" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <ClipboardListIcon class="h-4 w-4" />
                                    Description
                                </Label>
                                <div class="relative">
                                    <Textarea
                                        id="description"
                                        v-model="form.description"
                                        required
                                        placeholder="Brief description of your note..."
                                        rows="3"
                                        class="w-full resize-none border-blue-200/50 bg-white/50 transition-colors duration-200 focus:border-blue-400 dark:border-gray-600 dark:bg-gray-700/50 dark:focus:border-blue-500"
                                    />
                                </div>
                                <InputError :message="form.errors.description" />
                                <p class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                    <Circle class="h-3 w-3" />
                                    This will serve as the note description for quick reference.
                                </p>
                            </div>

                            <!-- Content Field -->
                            <div class="space-y-2">
                                <Label for="content" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <FileText class="h-4 w-4" />
                                    Note Content
                                </Label>
                                <div class="relative">
                                    <Textarea
                                        id="content"
                                        v-model="form.content"
                                        required
                                        placeholder="Write your thoughts here..."
                                        rows="8"
                                        class="resize-vertical w-full border-blue-200/50 bg-white/50 font-mono text-sm transition-colors duration-200 focus:border-blue-400 dark:border-gray-600 dark:bg-gray-700/50 dark:focus:border-blue-500"
                                    />
                                </div>
                                <InputError :message="form.errors.content" />
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <Button
                                    type="submit"
                                    :tabindex="4"
                                    :disabled="form.processing"
                                    class="w-full transform rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-3 font-medium text-white shadow-lg transition-all duration-300 hover:scale-[1.02] hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl active:scale-[0.98] disabled:transform-none disabled:cursor-not-allowed disabled:opacity-50 dark:from-blue-700 dark:to-indigo-700 dark:hover:from-blue-600 dark:hover:to-indigo-600"
                                >
                                    <div class="flex items-center justify-center gap-2">
                                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                                        <PlusIcon v-else class="h-4 w-4" />
                                        {{ form.processing ? 'Creating...' : 'Create Note' }}
                                    </div>
                                </Button>
                            </div>
                        </form>
                    </div>

                    <!-- Quick Tips -->
                    <div class="mt-6 text-center">
                        <p class="flex items-center justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                            <LightbulbIcon class="h-3 w-3" />
                            Pro tip: Use clear titles and descriptive content for better organization
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
@keyframes gradient-x {
    0%,
    100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

@keyframes pulse-slow {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}

.animate-gradient-x {
    animation: gradient-x 15s ease infinite;
    background-size: 200% 200%;
}

.animate-pulse-slow {
    animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>

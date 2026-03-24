<script setup>
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Hero"></Head>
    <div class="relative bg-gray-200 py-20">
        <div class="mx-auto mb-8 max-w-3xl text-center">
            <h1 class="text-4xl font-bold text-gray-900">
                Welcome to Our Platform
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                Discover endless possibilities with us.
            </p>
            <a
                href="#"
                class="mt-6 inline-block rounded bg-purple-600 px-4 py-2 text-white"
                >Free website templates</a
            >
        </div>
        <div class="absolute inset-x-0 bottom-0 translate-y-1/2 transform">
            <img
                src="https://images.unsplash.com/photo-1716691731823-5f382e879e82?q=80&w=1936&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Overlapping Image"
                class="mx-auto h-48 w-48 rounded-full"
            />
        </div>
    </div>
</template>

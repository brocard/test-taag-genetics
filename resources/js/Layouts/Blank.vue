<script setup>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <Link href="/books" class="text-blue-500 animate-bounce font-semibold focus:outline-none hover:text-blue-600">
            Ir al listado de libros
        </Link>
    </div>

    <div class="w-full sm:max-w-4xl mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-sm">
        <slot />
    </div>
  </div>
</template>

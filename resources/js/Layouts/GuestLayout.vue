<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import Header from "@/Components/Header.vue";
import CustomCursor from "@/Components/CustomCursor.vue";
</script>

<template>
    <!-- Header -->
    <Header />

    <!-- Custom Cursor -->
    <CustomCursor />

    <!-- Main content -->
    <div class="min-h-screen">
        <!-- Application Logo -->
        <div></div>

        <!-- Main content box -->
        <div class="">
            <slot />
        </div>
    </div>
</template>

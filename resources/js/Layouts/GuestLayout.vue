<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";
import CustomCursor from "@/Components/CustomCursor.vue";
</script>

<template>
    <!-- Header -->
    <Header />

    <!-- Custom Cursor -->
    <CustomCursor />

    <!-- Main content -->
    <div class="container min-h-screen p-0">
        <slot />
    </div>


</template>

<style scope>
.container {
    max-width: unset;
}
</style>

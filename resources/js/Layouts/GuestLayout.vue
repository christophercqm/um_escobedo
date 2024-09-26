<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";
import CustomCursor from "@/Components/CustomCursor.vue";
</script>

<template>
    <!-- HEADER  -->
    <Header />

    <!-- Custom Cursor -->
    <CustomCursor />

    <!-- Main content -->
    <div class="container min-h-screen p-0">
        <slot />
    </div>

    <Footer />
    <!-- FOOTER -->
</template>

<style>
.container {
    max-width: unset;
}

a {
    text-decoration: none !important;
    color: var(--white) !important;
}

p {
    color: var(--text-color);
}

.btn-escobedo {
    background-color: var(--red) !important;
}

.contain-btn {
    padding: 16px;
}

/* MEDIA QUERYS */
@media (max-width: 768px) {
    p {
        font-size: 15px;
    }

    
}


h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: var(--barlow) !important;
    margin: 0 !important;
    margin: 10px 0 !important;
}

body {
    font-family: var(--roboto) !important;
    color: var(--gray);
}


* {
    transition: all 0.3s ease;
}


</style>

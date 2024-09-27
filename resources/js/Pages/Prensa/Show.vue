<template>
    <GuestLayout>
        <div class="container mt-4">
            <h1>{{ prensa.titulo }}</h1>
            <img :src="`/storage/${prensa.imagen}`" :alt="prensa.titulo" class="img-fluid" />
            <p class="mt-3">
                <small class="text-muted">
                    <i class="fa fa-calendar me-1"></i>
                    {{ new Date(prensa.created_at).toLocaleDateString("es-ES") }}
                </small>
            </p>
            <div class="content">
                <p>{{ prensa.descripcion_breve }}</p>
                <div v-html="prensa.descripcion"></div> <!-- Suponiendo que tienes contenido HTML -->
            </div>
            <NavLink href="/prensa" class="btn btn-primary mt-4">Volver a Noticias</NavLink>
        </div>
    </GuestLayout>
</template>

<script setup>
import { defineProps } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import NavLink from '@/Components/NavLink.vue';

const props = defineProps({
    prensa: Object,
});
</script>

<style scoped>
/* Estilos personalizados para la vista de detalle pública */
</style>

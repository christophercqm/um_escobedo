<template>
    <GuestLayout>
        <div class="prensa-show">
            <div class="container max-width">
                <div class="row">
                    <div class="col-9">
                        <div class="container mt-4">
                            <h1>{{ prensa.titulo }}</h1>
                            <img
                                :src="`/storage/${prensa.imagen}`"
                                :alt="prensa.titulo"
                                class="img-fluid"
                            />
                            <p class="mt-3">
                                <small class="text-muted">
                                    <i class="fa fa-calendar me-1"></i>
                                    {{
                                        new Date(
                                            prensa.created_at
                                        ).toLocaleDateString("es-ES")
                                    }}
                                </small>
                            </p>
                            <div class="content">
                                <p>{{ prensa.descripcion_breve }}</p>
                                <div v-html="prensa.descripcion"></div>
                                <!-- Suponiendo que tienes contenido HTML -->
                            </div>
                            <NavLink href="/prensa" class="btn-public"
                                >Volver a Noticias</NavLink
                            >
                        </div>
                    </div>
                    
                    <!-- SIDEBAR-->
                    <div class="col-3">
                        <Sidebar :prensa="allPrensa" /> 
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>


<script setup>
import { defineProps } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";

import Sidebar from "@/Components/Sidebar/Sidebar.vue";

const props = defineProps({
    prensa: Object,
    allPrensa: Array,
});
</script>

<style scoped>
    .sidebar-info-escobedo {
        font-size: 14px;
    }

    .sidebar-service {
        position: relative;
        max-height: 400px;
        height: 400px;
        background-color: var(--black);
    }

    .sidebar-service .card-img-top {
        max-width: unset;
    }

    .sidebar-service .card-body {
        position: absolute !important;
        z-index: 2;
        bottom: 0;
    }

    .sidebar-service .card-body {
        display: flex;
        flex-direction: column;
        align-items: start;
    }

    .sidebar-service .card-text {
        font-size: 13px;
    }

    .card-meta .card-meta span {
        font-size: 14px;
    }

    .contain-card-notice img {
        min-height: 220px;
        max-height: 220px;
    }

    .contain-card-notice .card-text {
        font-size: 15px;
    }

    .prensa-show {
        padding-top: 50px;
        padding-bottom: 50px;
    }
</style>

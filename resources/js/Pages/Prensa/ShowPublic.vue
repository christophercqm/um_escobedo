<template>
    <GuestLayout>
        <div class="prensa-show padding-container">
            <div class="container max-width p-0">
                <div class="row row-detail-notice d-flex justify-content-md-between">
                    <div class="col-12 col-md-8 fade-in">
                        <div class="container">
                            <h1 class="mb-4 mt-0">{{ prensa.titulo }}</h1>
                            <img :src="`/storage/${prensa.imagen}`" :alt="prensa.titulo"
                                class="img-fluid img-articulo-public" />
                            <div class="my-3 d-flex gap-3 container-notice-details">
                                <div class="read d-flex align-items-center gap-2">
                                    <i class="bi bi-book"></i>
                                    <span>{{
                                        formatCategoria(prensa.categoria)
                                        }}</span>
                                </div>
                                <div class="date">
                                    <span>
                                        <i class="bi bi-calendar me-1"></i>
                                        {{
                                            new Date(
                                                prensa.created_at
                                            ).toLocaleDateString("es-ES")
                                        }}
                                    </span>
                                </div>
                            </div>

                            <div class="content">
                                <!-- Mostrar la descripción con formato de párrafos -->
                                <div v-html="formattedDescription"></div>
                            </div>
                            <NavLink href="/prensa" class="btn-public">Volver a Noticias</NavLink>
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
import { defineProps, computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";

const props = defineProps({
    prensa: Object,
    allPrensa: Array,
});

// Computed para formatear la descripción
const formattedDescription = computed(() => {
    // Divide la descripción en párrafos utilizando doble salto de línea como delimitador
    const paragraphs = props.prensa.descripcion.split(/\n\s*\n/);
    // Envolver cada párrafo en un <p> y unirlos
    return paragraphs.map((paragraph) => `<p>${paragraph.trim()}</p>`).join("");
});

const formatCategoria = (categoria) => {
    return categoria === "cronicas"
        ? "Crónicas"
        : categoria.charAt(0).toUpperCase() + categoria.slice(1);
};
</script>

<style scoped>
.img-articulo-public {
    height: 400px;
    border-radius: var(--border);
}

.container-notice-details span {
    font-size: 14px;
}

.container-notice-details span,
i {
    color: var(--grayv2);
}

.container-notice-details i {
    height: 20px;
}

@media (max-width: 768px) {

    .sidebar {
        display: none;
    }
}
</style>

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
                                class="img-fluid img-articulo-public"
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
                                <!-- Mostrar la descripción con formato de párrafos -->
                                <div v-html="formattedDescription"></div>
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
</script>

<style scoped>
.img-articulo-public {
    height: 400px;
}
</style>

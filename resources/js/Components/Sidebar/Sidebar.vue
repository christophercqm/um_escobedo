<template>
    <!-- Menú Lateral -->
    <div class="sidebar">
        <h5 class="sidebar-title">U.M. ESCOBEDO</h5>
        <hr class="separator" />
        <p class="sidebar-info-escobedo">
            Página oficial de la Unión Montañesa Escobedo, club fundado en 1917
            y que actualmente milita en Segunda RFEF.
        </p>

        <br />
        <h5 class="sidebar-title">Enlaces de interés</h5>
        <hr class="separator" />
        <ul class="list-group">
            <li class="list-group-item">
                <a href="#inicio" class="sidebar-link">Inicio</a>
            </li>
            <li class="list-group-item">
                <a href="#noticias" class="sidebar-link">Noticias</a>
            </li>
            <li class="list-group-item">
                <a href="#cronicas" class="sidebar-link">Crónicas</a>
            </li>
            <li class="list-group-item">
                <a href="#contacto" class="sidebar-link">Contacto</a>
            </li>
        </ul>

        <br />
        <h5 class="sidebar-title">Últimas noticias</h5>
        <hr class="separator" />
        <div class="last-news">
            <div class="list-group">
                <!-- Asegurarse de que 'prensa' está definido y es un arreglo -->
                <template v-if="prensa && prensa.length">
                    <NavLink
                        v-for="noticia in prensa.slice(0, 3)"
                        :key="noticia.id"
                        :href="`/prensa/${noticia.id}`"
                        class="list-group-item list-group-item-action"
                    >
                        <div class="d-flex">
                            <!-- Imagen de la noticia -->
                            <img
                                :src="`/storage/${noticia.imagen}`"
                                :alt="noticia.titulo"
                                class="me-3"
                                style="
                                    width: 50px;
                                    height: 50px;
                                    object-fit: cover;
                                    border-radius: 5px;
                                "
                            />
                            <div>
                                <!-- Título de la noticia -->
                                <h6 class="mb-1 title">{{ noticia.titulo }}</h6>
                                <!-- Fecha de la noticia -->
                                <small style="color: gray; font-size: 12px">
                                    <i class="fa fa-calendar me-1"></i>
                                    {{
                                        new Date(noticia.created_at).toLocaleDateString("es-ES", {
                                            day: "2-digit",
                                            month: "long",
                                            year: "numeric",
                                        })
                                    }}
                                </small>
                            </div>
                        </div>
                    </NavLink>
                </template>

                <!-- Mensaje si no hay noticias disponibles -->
                <template v-else>
                    <div class="list-group-item text-center">No hay noticias disponibles.</div>
                </template>
            </div>
        </div>

        <br />
        <div class="sidebar-service card shadow-sm mb-4 position-relative">
            <img
                :src="sidebar_bg"
                class="card-img-top"
                alt="U.M. Escobedo"
                style="
                    opacity: 0.5;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                "
            />
            <div class="overlay"></div>
            <!-- Dark overlay -->
            <div class="card-body text-center position-relative">
                <h5 class="card-title text-left text-white">U.M. Escobedo</h5>
                <p class="card-text text-left text-white">
                    Página oficial de la Unión Montañesa Escobedo, club fundado
                    en 1917 y que actualmente milita en Segunda RFEF.
                </p>
                <NavLink href="/contacto" class="btn btn-escobedo">Contáctanos</NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import sidebar_bg from "@images/sidebar-bg.jpeg";
import NavLink from "@/Components/NavLink.vue";

// Recibiendo las props de prensa

const props = defineProps({
    prensa: Object,
});
</script>

<style scoped>
.sidebar {
    max-width: 330px;
}
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

/* Estilo de los enlaces del menú */
.sidebar-link {
    text-decoration: none;
    color: #333 !important;
    display: block;
    padding: 10px;
    border-radius: var(--border);
}

/* Hover para enlaces del menú */
.sidebar-link:hover {
    color: var(--red) !important;
}

.list-group .sidebar-link {
    font-size: 14px;
}


</style>

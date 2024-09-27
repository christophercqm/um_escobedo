<template>
    <GuestLayout>
        <div class="content container-prensa w-100">
            <div class="container px-0">
                <!-- Primera fila con título -->
                <div class="row row-1">
                    <div class="col col-bg-info">
                        <h1>Últimas noticias</h1>
                    </div>
                </div>

                <!-- Segunda fila con botones -->
                <div class="row row-2 my-4">
                    <div class="col d-flex justify-content-start gap-3">
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'todos',
                            }"
                            @click="showSection('todos')"
                        >
                            Todos
                        </button>
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'actualidad',
                            }"
                            @click="showSection('actualidad')"
                        >
                            Actualidad
                        </button>
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'cronicas',
                            }"
                            @click="showSection('cronicas')"
                        >
                            Crónicas
                        </button>
                    </div>
                </div>

                <!-- Tercera fila con las cards -->
                <div class="row row-3">
                    <div class="col-9">
                        <div
                            v-if="filteredPrensa.length > 0"
                            class="my-4 d-flex flex-wrap gap-4 contain-card-notice"
                        >
                            <div
                                v-for="item in filteredPrensa"
                                :key="item.id"
                                class="card mb-4"
                                :data-tipo="item.categoria"
                            >
                                <img
                                    :src="`/storage/${item.imagen}`"
                                    :alt="item.titulo"
                                    class="card-img-top"
                                />
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ item.titulo }}
                                    </h3>
                                    <div class="card-meta mb-2">
                                        <small class="text-muted me-3">
                                            <i class="fa fa-calendar me-1"></i>
                                            {{
                                                new Date(
                                                    item.created_at
                                                ).toLocaleDateString("es-ES")
                                            }}
                                        </small>
                                    </div>
                                    <p class="card-text">
                                        {{
                                            truncateText(
                                                100,
                                                item.descripcion_breve
                                            )
                                        }}
                                    </p>
                                </div>
                                <div class="text-center contain-btn">
                                    <NavLink
                                    :href="`/prensa/${item.id}`"
                                    class="btn btn-escobedo w-100"
                                        >Saber más</NavLink
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Si no hay noticias en la categoría seleccionada -->
                        <div v-else class="alert alert-info">
                            No hay noticias disponibles en esta categoría.
                        </div>
                    </div>

                    <!-- Menú Lateral -->
                    <div class="col-3 col-sidebar p-0">
                        <!-- Menú Lateral -->
                        <div class="sidebar">
                            <h5 class="sidebar-title">U.M. ESCOBEDO</h5>
                            <hr class="separator" />
                            <p class="sidebar-info-escobedo">
                                Página oficial de la Unión Montañesa Escobedo,
                                club fundado en 1917 y que actualmente milita en
                                Segunda RFEF.
                            </p>

                            <br />
                            <h5 class="sidebar-title">Enlaces de interés</h5>
                            <hr class="separator" />
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#inicio" class="sidebar-link"
                                        >Inicio</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#noticias" class="sidebar-link"
                                        >Noticias</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#cronicas" class="sidebar-link"
                                        >Crónicas</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#contacto" class="sidebar-link"
                                        >Contacto</a
                                    >
                                </li>
                            </ul>

                            <br />
                            <h5 class="sidebar-title">Últimas noticias</h5>
                            <hr class="separator" />

                            <div class="last-news">
                                <div class="list-group">
                                    <!-- Recorrer las tres últimas noticias -->
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
                                                <h6 class="mb-1 title">
                                                    {{ noticia.titulo }}
                                                </h6>
                                                <!-- Fecha de la noticia -->
                                                <small style="color: gray; font-size: 12px;">
                                                    <i
                                                        class="fa fa-calendar me-1"
                                                    ></i>
                                                    {{
                                                        new Date(
                                                            noticia.created_at
                                                        ).toLocaleDateString(
                                                            "es-ES",
                                                            {
                                                                day: "2-digit",
                                                                month: "long",
                                                                year: "numeric",
                                                            }
                                                        )
                                                    }}
                                                </small>
                                            </div>
                                        </div>
                                    </NavLink>
                                </div>
                            </div>

                            <br />
                            <div
                                class="sidebar-service card shadow-sm mb-4 position-relative"
                            >
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
                                <div
                                    class="card-body text-center position-relative"
                                >
                                    <h5 class="card-title text-left text-white">
                                        U.M. Escobedo
                                    </h5>
                                    <p class="card-text text-left text-white">
                                        Página oficial de la Unión Montañesa
                                        Escobedo, club fundado en 1917 y que
                                        actualmente milita en Segunda RFEF.
                                    </p>
                                    <NavLink
                                        href="/contacto"
                                        class="btn btn-escobedo"
                                        >Contáctanos
                                    </NavLink>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import sidebar_bg from "@images/sidebar-bg.jpeg";
import NavLink from "@/Components/NavLink.vue";

// Estado reactivo para controlar la sección visible
const currentSection = ref("todos"); // Inicialmente se muestran todas las noticias

// Recibiendo las props de prensa
const props = defineProps({
    prensa: Array,
});

// Función para cambiar la sección activa
const showSection = (section) => {
    currentSection.value = section;
};

// Función para truncar el texto
const truncateText = (number, text) => {
    if (text.length <= number) {
        return text;
    }
    return text.slice(0, number) + "...";
};

// Función computada para filtrar las noticias según la sección seleccionada
const filteredPrensa = computed(() => {
    if (currentSection.value === "todos") {
        return props.prensa; // Muestra todas las noticias si la sección es "todos"
    } else {
        // Filtra las noticias por la categoría (actualidad o cronicas)
        return props.prensa.filter(
            (item) => item.categoria === currentSection.value
        );
    }
});
</script>

<style scoped>
.container-prensa .container {
    max-width: 1250px;
    padding: 50px 0;
}

.btn {
    padding: 10px 20px;
    font-weight: bold;
    transition: background-color 0.5s ease, color 0.5s ease;
}

/* Color del botón activo */
.btn-active {
    background-color: var(--red);
    color: var(--white);
}

/* Estilo de los botones inactivos */
.btn:not(.btn-active) {
    background-color: transparent;
    color: var(--red);
    background-color: white;
    border-color: red;
}

/* Hover para botones inactivos */
.btn:not(.btn-active):hover {
    background-color: var(--red);
    color: var(--white);
}

.card {
    transition: transform 0.5s ease-in-out;
    flex: 1;
    min-width: 300px;
    max-width: 400px;
}

/* Efecto hover en las cards */
.row-3 .card:hover {
    transform: scale(1.05);
}

/* Estilo del menú lateral */
.sidebar {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 0.5rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sidebar-title {
    font-weight: bold;
    margin-bottom: 15px;
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

.separator {
    color: var(--red);
}

.sidebar .title {
    color: var(--black);
}

.sidebar img {
    width: 97px;
    max-width: 97px;
    height: 67px;
    border: 8px;
    object-fit: cover;
}

.last-news .list-group-item {
    border: unset;
    padding: 0;
}

.last-news .list-group {
    display: flex;
    gap: 1.2rem;
}

.list-group img {
    border-radius: var(--border);
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

.contain-card-notice .card-text{
    font-size: 15px;
}

</style>

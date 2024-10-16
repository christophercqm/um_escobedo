<template>
    <GuestLayout>
        <div class="content container-prensa w-100">
            <div class="container px-0 bg-white">
                <!-- Primera fila con título -->
                <div class="row row-1">
                    <div class="col col-bg-info bg-white">
                        <h1>Últimas noticias</h1>
                    </div>
                </div>

                <!-- Segunda fila con botones -->
                <div class="row row-2 my-4">
                    <div class="col d-flex justify-content-start gap-3 bg-white">
                        <button class="btn" :class="{
                            'btn-active': currentSection === 'todos',
                        }" @click="showSection('todos')">
                            Todos
                        </button>
                        <button class="btn" :class="{
                            'btn-active': currentSection === 'actualidad',
                        }" @click="showSection('actualidad')">
                            Actualidad
                        </button>
                        <button class="btn" :class="{
                            'btn-active': currentSection === 'cronicas',
                        }" @click="showSection('cronicas')">
                            Crónicas
                        </button>
                    </div>
                </div>

                <!-- Tercera fila con las cards -->
                <div class="row row-3 bg-white">
                    <div class="col-12 col-md-9 bg-white">
                        <div v-if="filteredPrensa.length > 0" class="my-4 d-flex flex-wrap gap-4 contain-card-notice bg-white">
                            <!-- Mostrar solo hasta la cantidad de noticias permitidas -->
                            <div v-for="item in filteredPrensa.slice(
                                0,
                                visibleCards
                            )" :key="item.id" class="card mb-4 fade-in" :data-tipo="item.categoria">
                                <img :src="`/storage/${item.imagen}`" :alt="item.titulo" class="card-img-top" />
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
                                    <NavLink :href="`/prensa-public/${item.id}`"
                                        class="btn-public w-100 m-0 d-block text-center">
                                        Saber más
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        <!-- Botón Ver más -->
                        <div v-if="filteredPrensa.length > visibleCards" class="text-center mt-4">
                            <button @click="loadMore" class="btn-ver-mas">
                                Ver más
                            </button>
                        </div>
                    </div>

                    <!-- SIDEBAR -->
                    <div class="col-3 col-sidebar p-0">
                        <Sidebar :prensa="latestPrensa" />
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";

// Estado reactivo para controlar la sección visible
const currentSection = ref("todos"); // Inicialmente se muestran todas las noticias
const visibleCards = ref(4); // Mostrar solo 4 tarjetas inicialmente

// Recibiendo las props de prensa
const props = defineProps({
    prensa: Array,
});

// Función para cambiar la sección activa
const showSection = (section) => {
    currentSection.value = section;
    visibleCards.value = 4; // Resetear a 4 tarjetas cuando se cambia de sección
};

// Función para cargar más tarjetas
const loadMore = () => {
    visibleCards.value += 4; // Mostrar 4 tarjetas más al hacer clic en "Ver más"
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
    // Filtra todas las noticias activas (estado === 1) según la sección seleccionada
    if (currentSection.value === "todos") {
        return props.prensa.filter((item) => item.estado === 1);
    } else {
        return props.prensa.filter(
            (item) =>
                item.categoria === currentSection.value && item.estado === 1
        );
    }
});

// Propiedad computada para obtener las últimas noticias activas para el sidebar
const latestPrensa = computed(() => {
    return props.prensa.filter((item) => item.estado === 1).slice(0, 3);
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

.separator {
    color: var(--red);
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

.btn-ver-mas {
    color: var(--red);
    text-decoration: underline;
}

@media (max-width: 768px) {
    .container-prensa {
        padding: 0 12px;
    }

    .contain-card-notice {
        justify-content: center;
    }

    .sidebar {
        display: none;
    }
}
</style>

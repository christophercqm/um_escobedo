<template>
    <GuestLayout>
        <div class="content container-primer-equipo w-100">
            <div class="container px-0 max-width padding-container">
                <div class="row row-1 row-jugadores justify-content-md-between">
                    <!-- CONTENIDO JUGADORES -->
                    <div class="col-12 col-md-8">
                        <h2>Jugadores</h2>
                        <!-- Sección de filtrado -->
                        <div class="row row-2 my-4">
                            <div class="col d-flex justify-content-start gap-3">
                                <button
                                    class="btn"
                                    :class="{'btn-active': currentSection === 'todos'}"
                                    @click="showSection('todos')"
                                >
                                    Todos
                                </button>
                                <button
                                    class="btn"
                                    :class="{'btn-active': currentSection === 'portero'}"
                                    @click="showSection('portero')"
                                >
                                    Portero
                                </button>
                                <button
                                    class="btn"
                                    :class="{'btn-active': currentSection === 'defensa'}"
                                    @click="showSection('defensa')"
                                >
                                    Defensa
                                </button>
                                <button
                                    class="btn"
                                    :class="{'btn-active': currentSection === 'centrocampista'}"
                                    @click="showSection('centrocampista')"
                                >
                                    Centrocampista
                                </button>
                                <button
                                    class="btn"
                                    :class="{'btn-active': currentSection === 'delantero'}"
                                    @click="showSection('delantero')"
                                >
                                    Delantero
                                </button>
                            </div>
                        </div>
                        <!-- Lista de jugadores filtrados -->
                        <div class="container-jugadores row">
                            <div
                                v-for="jugador in displayedJugadores"
                                :key="jugador.id"
                                class="jugador-card col-md-6 mb-4"
                            >
                                <div class="card text-center">
                                    <div class="img-player">
                                        <img
                                            :src="`/storage/${jugador.foto_url}`"
                                            alt="Foto de {{ jugador.nombre }}"
                                            class="card-img-top card-img-jugador"
                                        />
                                    </div>
                                    <div class="card-body">
                                        <h2 class="number text-white">
                                            {{ jugador.numero_camiseta }}
                                        </h2>
                                        <h5 class="card-title">
                                            {{ jugador.nombre }} {{ jugador.apellido }}
                                        </h5>
                                        <p class="card-text jugador-posicion">
                                            {{ jugador.posicion }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón "Ver más" -->
                        <div
                            v-if="filteredJugadores.length > displayedJugadores.length"
                            class="text-center my-4"
                        >
                            <button class="btn-ver-mas" @click="showMore">
                                Ver más
                            </button>
                        </div>
                    </div>

                    <!-- SIDEBAR -->
                    <Sidebar class="col-3"></Sidebar>
                </div>

                <div class="row row-2 row-cuerpo-tecnico justify-content-md-between">
                    <!-- CUERPO TÉCNICO -->
                    <div class="col-12 col-md-8">
                        <h2>Cuerpo Técnico</h2>
                        <div class="row">
                            <div
                                v-for="miembro in displayedCuerpoTecnico"
                                :key="miembro.id"
                                class="cuerpo-tecnico-card col-md-6 mb-4"
                            >
                                <div class="card text-center">
                                    <div class="img-tecnico">
                                        <img
                                            :src="`/storage/${miembro.foto}`"
                                            alt="Foto de {{ miembro.nombres }} {{ miembro.apellidos }}"
                                            class="card-img-top card-img-tecnico"
                                        />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ miembro.nombres }} {{ miembro.apellidos }}
                                        </h5>
                                        <p class="card-text jugador-rol red">
                                            {{ miembro.rol }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón "Ver más" para el cuerpo técnico -->
                        <div
                            v-if="cuerpoTecnico.length > displayedCuerpoTecnico.length"
                            class="text-center my-4"
                        >
                            <button class="btn-ver-mas" @click="showMoreCuerpoTecnico">
                                Ver más
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { defineProps, computed, ref } from "vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";

const props = defineProps({
    jugadores: Array,
    cuerpoTecnico: Array // Recepción de datos del cuerpo técnico
});

// Estado para manejar la sección actual
const currentSection = ref("todos");
const itemsToShowJugadores = ref(6); // Número inicial de jugadores a mostrar
const itemsToShowCuerpoTecnico = ref(4); // Número inicial de miembros del cuerpo técnico a mostrar

// Computed property para filtrar jugadores
const filteredJugadores = computed(() => {
    if (currentSection.value === "todos") {
        return props.jugadores; // Mostrar todos los jugadores
    }
    return props.jugadores.filter(
        (jugador) => jugador.posicion.toLowerCase() === currentSection.value
    );
});

// Computed property para mostrar jugadores filtrados
const displayedJugadores = computed(() => {
    return filteredJugadores.value.slice(0, itemsToShowJugadores.value);
});

// Computed property para mostrar el cuerpo técnico filtrado
const displayedCuerpoTecnico = computed(() => {
    return props.cuerpoTecnico.slice(0, itemsToShowCuerpoTecnico.value);
});

// Función para cambiar la sección
const showSection = (section) => {
    currentSection.value = section; // Cambia la sección actual
    itemsToShowJugadores.value = 6; // Reinicia el número de jugadores a mostrar
};

// Función para mostrar más jugadores
const showMore = () => {
    itemsToShowJugadores.value += 6; // Aumenta el número de jugadores a mostrar
};

// Función para mostrar más del cuerpo técnico
const showMoreCuerpoTecnico = () => {
    itemsToShowCuerpoTecnico.value += 4; // Aumenta el número de miembros del cuerpo técnico a mostrar
};
</script>

<style scoped>
.container-jugadores {
    display: flex;
    flex-wrap: wrap;
}

.card {
    background-color: var(--black);
    color: var(--white);
}

div.img-player {
    max-height: 220px;
    height: 220px;
}
img.card-img-jugador {
    object-fit: contain;
    margin: 0 auto;
}

.number {
    font-size: 2rem;
    font-weight: bold;
    margin: 10px 0;
}

.card-text {
    margin-top: 0;
}

.jugador-posicion {
    color: var(--red);
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

.btn-ver-mas {
    color: var(--red);
    text-decoration: underline;
}
</style>

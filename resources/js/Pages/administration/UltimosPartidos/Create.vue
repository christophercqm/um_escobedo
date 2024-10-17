<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6">Crear Último Partido</h2>

                <form @submit.prevent="crearUltimoPartido">
                    <!-- Dropdown para Seleccionar Partido Existente -->
                    <div class="mb-4">
                        <div class="dropdown">
                            <button
                                class="btn btn-secondary dropdown-toggle w-100 d-flex align-items-center"
                                type="button"
                                id="dropdownPartido"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span>
                                    {{ selectedPartido ? `${selectedPartido.equipo_local.nombre} vs ${selectedPartido.equipo_visitante.nombre}` : "Seleccione un partido" }}
                                </span>
                            </button>

                            <ul
                                class="dropdown-menu w-100"
                                aria-labelledby="dropdownPartido"
                                style="max-height: 300px; overflow-y: auto; border: 1px solid #ee1d36;"
                            >
                                <li v-for="partido in props.partidos" :key="partido.id">
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                        @click.prevent="selectPartido(partido)"
                                    >
                                        <img :src="`/storage/${partido.equipo_local.logo}`" alt="Logo Local" class="team-logo" />
                                        <span class="name-partido">{{ partido.equipo_local.nombre }}</span>
                                        <span>vs</span>
                                        <img :src="`/storage/${partido.equipo_visitante.logo}`" alt="Logo Visitante" class="team-logo" />
                                        <span class="name-partido">{{ partido.equipo_visitante.nombre }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Campo de Fecha -->
                    <div class="mb-4">
                        <input
                            type="date"
                            v-model="partido.fecha"
                            placeholder="Fecha"
                            required
                            class="form-control"
                        />
                    </div>

                    <!-- Campos de Puntuación -->
                    <div class="puntuacion d-flex gap-3 mb-4">
                        <input
                            type="text"
                            v-model="partido.puntuacion_local"
                            placeholder="Puntuación Local"
                            required
                            class="form-control flex-1"
                        />
                        <input
                            type="text"
                            v-model="partido.puntuacion_visitante"
                            placeholder="Puntuación Visitante"
                            required
                            class="form-control flex-1"
                        />
                    </div>

                    <!-- Campo de Estadio -->
                    <div class="mb-4">
                        <input
                            type="text"
                            v-model="partido.estadio"
                            placeholder="Estadio"
                            required
                            class="form-control"
                        />
                    </div>

                    <!-- Campo de Estado del Partido -->
                    <div class="mb-4">
                        <input
                            type="text"
                            v-model="partido.estado_partido"
                            placeholder="Estado del Partido (Ej: Terminado, Inactivo)"
                            required
                            class="form-control"
                        />
                    </div>

                    <!-- Dropdowns para Equipos -->
                    <div class="container-equipos-dropdown d-flex gap-3 mb-4">
                        <!-- Dropdown para Equipo Local -->
                        <div class="flex-1">
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle w-100 d-flex align-items-center"
                                    type="button"
                                    id="dropdownLocalClub"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <span>{{ selectedLocalClub ? selectedLocalClub.nombre : "Seleccione el club local" }}</span>
                                </button>

                                <ul
                                    class="dropdown-menu w-100"
                                    aria-labelledby="dropdownLocalClub"
                                    style="max-height: 300px; overflow-y: auto; border: 1px solid #ee1d36;"
                                >
                                    <li v-for="equipo in props.equipos" :key="equipo.id">
                                        <a
                                            class="dropdown-item d-flex align-items-center"
                                            href="#"
                                            @click.prevent="selectLocalClub(equipo)"
                                        >
                                            <img :src="`/storage/${equipo.logo}`" alt="Logo Local" class="team-logo" />
                                            <span class="name-club">{{ equipo.nombre }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Dropdown para Equipo Visitante -->
                        <div class="flex-1">
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle w-100 d-flex align-items-center"
                                    type="button"
                                    id="dropdownVisitanteClub"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <span>{{ selectedVisitanteClub ? selectedVisitanteClub.nombre : "Seleccione el club visitante" }}</span>
                                </button>

                                <ul
                                    class="dropdown-menu w-100"
                                    aria-labelledby="dropdownVisitanteClub"
                                    style="max-height: 300px; overflow-y: auto; border: 1px solid #ee1d36;"
                                >
                                    <li v-for="equipo in props.equipos" :key="equipo.id">
                                        <a
                                            class="dropdown-item d-flex align-items-center"
                                            href="#"
                                            @click.prevent="selectVisitanteClub(equipo)"
                                        >
                                            <img :src="`/storage/${equipo.logo}`" alt="Logo Visitante" class="team-logo" />
                                            <span class="name-club">{{ equipo.nombre }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Envío -->
                    <button type="submit" class="mt-4 btn-admin">
                        Crear Último Partido
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    equipos: Array,
    partidos: Array,
});

// Definición de los estados
const partido = ref({
    fecha: "",
    puntuacion_local: "",
    puntuacion_visitante: "",
    estadio: "",
    estado_partido: "",
    equipo_local_id: "",
    equipo_visitante_id: "",
});

const selectedPartido = ref(null);
const selectedLocalClub = ref(null);
const selectedVisitanteClub = ref(null);

// Método para seleccionar un partido existente
const selectPartido = (partidoSeleccionado) => {
    selectedPartido.value = partidoSeleccionado;
    // Llenar los campos del formulario con los datos del partido seleccionado
    partido.value.fecha = partidoSeleccionado.fecha_hora.split(" ")[0]; // Solo la fecha
    partido.value.puntuacion_local = partidoSeleccionado.resultado_local; // Asumir que el resultado se guarda
    partido.value.puntuacion_visitante = partidoSeleccionado.resultado_visitante; // Asumir que el resultado se guarda
    partido.value.estadio = partidoSeleccionado.estadio || ''; // Suponiendo que este campo está presente
    partido.value.estado_partido = partidoSeleccionado.estado || ''; // Suponiendo que este campo está presente
    partido.value.equipo_local_id = partidoSeleccionado.equipo_local_id; // ID del equipo local
    partido.value.equipo_visitante_id = partidoSeleccionado.equipo_visitante_id; // ID del equipo visitante
};

// Método para seleccionar el club local
const selectLocalClub = (equipo) => {
    selectedLocalClub.value = equipo;
    partido.value.equipo_local_id = equipo.id; // Guardar ID del equipo local
};

// Método para seleccionar el club visitante
const selectVisitanteClub = (equipo) => {
    selectedVisitanteClub.value = equipo;
    partido.value.equipo_visitante_id = equipo.id; // Guardar ID del equipo visitante
};


</script>

<style scoped>
.dropdown-menu {
    z-index: 1000;
}
.team-logo {
    width: 30px; /* Ajusta el tamaño del logo según sea necesario */
    height: auto;
    margin-right: 8px; /* Espaciado entre el logo y el nombre */
}
</style>

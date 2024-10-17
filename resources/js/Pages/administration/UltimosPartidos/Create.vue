<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6">Crear Último Partido</h2>

                <form @submit.prevent="crearUltimoPartido">
                    <div class="mb-4">
                        <div class="dropdown">
                            <button
                                class="btn btn-secondary dropdown-toggle w-100 d-flex align-items-center"
                                type="button"
                                id="dropdownPartido"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span v-if="selectedPartido">
                                    {{ selectedPartido.equipo_local.nombre }}
                                    {{
                                        selectedPartido.equipo_visitante.nombre
                                    }}
                                </span>
                                <span v-else>Seleccione un partido</span>
                            </button>

                            <ul
                                class="dropdown-menu w-100"
                                aria-labelledby="dropdownPartido"
                                style="
                                    max-height: 300px;
                                    overflow-y: auto;
                                    border: 1px solid #ee1d36;
                                "
                            >
                                <li
                                    v-for="partido in props.partidos"
                                    :key="partido.id"
                                >
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                        @click.prevent="selectPartido(partido)"
                                    >
                                        <span class="nombre-uno d-flex align-items-center"  style="min-width: 200px;">
                                            <img
                                                :src="`/storage/${partido.equipo_local.logo}`"
                                                alt="Logo Local"
                                                class="team-logo"
                                            />
                                            <span class="name-partido">{{
                                                partido.equipo_local.nombre
                                            }}</span>
                                        </span>

                                        <span class="vs mx-5">vs</span>

                                        <span class="nombre-dos d-flex align-items-center" style="min-width: 200px;">
                                            <img
                                                :src="`/storage/${partido.equipo_visitante.logo}`"
                                                alt="Logo Local"
                                                class="team-logo"
                                            />
                                            <span class="name-partido">{{
                                                partido.equipo_visitante.nombre
                                            }}</span>
                                            
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-4">
                        <input
                            type="date"
                            v-model="partido.fecha"
                            required
                            class="form-control"
                        />
                    </div>

                    <div class="puntuacion d-flex gap-3 mb-4">
                        <input
                            type="number"
                            v-model.number="partido.puntuacion_local"
                            placeholder="Puntuación Local"
                            class="form-control flex-1"
                        />
                        <input
                            type="number"
                            v-model.number="partido.puntuacion_visitante"
                            placeholder="Puntuación Visitante"
                            class="form-control flex-1"
                        />
                    </div>

                    <div class="mb-4">
                        <input
                            type="text"
                            v-model="partido.estadio"
                            placeholder="Estadio"
                            class="form-control"
                        />
                    </div>

                    <div class="mb-4">
                        <input
                            type="text"
                            v-model="partido.estado_partido"
                            placeholder="Estado del Partido (Ej: Terminado, Inactivo)"
                            class="form-control"
                        />
                    </div>

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
import Swal from "sweetalert2"; // Importar SweetAlert
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

// Definición de las props que recibe el componente
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
    partido_id: null,
    equipo_local_id: "",
    equipo_visitante_id: "",
});

const selectedPartido = ref(null);

// Método para seleccionar un partido existente
const selectPartido = (partidoSeleccionado) => {
    selectedPartido.value = partidoSeleccionado;

    // Llenar los campos del formulario con los datos del partido seleccionado
    partido.value.fecha = partidoSeleccionado.fecha_hora.split(" ")[0]; // Solo la fecha
    partido.value.puntuacion_local = partidoSeleccionado.resultado_local;
    partido.value.puntuacion_visitante =
        partidoSeleccionado.resultado_visitante;
    partido.value.estadio = partidoSeleccionado.estadio || ""; // Asegúrate de que este valor exista
    partido.value.estado_partido = partidoSeleccionado.estado || "";
    partido.value.partido_id = partidoSeleccionado.id; // Guardar el ID del partido seleccionado
    partido.value.equipo_local_id = partidoSeleccionado.equipo_local_id; // ID del equipo local
    partido.value.equipo_visitante_id = partidoSeleccionado.equipo_visitante_id; // ID del equipo visitante

    // Imprimir las propiedades del partido seleccionado en la consola
    console.log("Partido seleccionado:", partidoSeleccionado);
};

// Método para crear el último partido
const crearUltimoPartido = () => {
    // Asegúrate de que el partido_id y los equipos estén bien configurados
    if (
        !partido.value.partido_id ||
        !partido.value.equipo_local_id ||
        !partido.value.equipo_visitante_id
    ) {
        Swal.fire({
            title: "Advertencia!",
            text: "Por favor, seleccione un partido y ambos equipos.",
            icon: "warning",
            confirmButtonText: "OK",
        });
        return;
    }

    // Log para ver los datos antes de enviarlos
    console.log("Enviando datos:", partido.value);

    // Enviar los datos usando Inertia
    Inertia.post("/ultimos-partidos/admin", partido.value, {
        onSuccess: () => {
            // Mostrar mensaje de éxito
            Swal.fire({
                title: "Éxito!",
                text: "El último partido ha sido creado.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                // Redirigir al index después de crear el partido
                Inertia.visit("/ultimos-partidos/admin"); // Cambiar la URL según tu ruta de index
            });
        },
        onError: (errors) => {
            // Mostrar mensaje de error
            Swal.fire({
                title: "Error!",
                text: "No se pudo crear el partido.",
                icon: "error",
                confirmButtonText: "OK",
            });
            console.error("Error al crear el partido:", errors);
        },
    });
};
</script>

<style scoped>
/* Estilos personalizados */
.team-logo {
    width: 30px;
    height: 30px;
    margin-right: 8px;
}
</style>

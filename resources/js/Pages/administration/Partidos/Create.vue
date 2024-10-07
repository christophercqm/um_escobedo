<template>
    <AuthenticatedLayout>
        <Head title="Crear Partido" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Partido
            </h2>
        </template>

        <div class="container mt-5 max-width">
            <form @submit.prevent="submit">
                <div class="container-vs d-flex justify-between">
                    <!-- Campo Equipo Local -->
                    <div class="mb-3">
                        <InputLabel for="equipo_local_id" value="Equipo Local *" />
                        <div class="dropdown">
                            <button
                                class="btn-public dropdown-toggle d-flex align-items-center"
                                type="button"
                                id="dropdownLocal"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <img v-if="selectedLocal.logo" :src="`/storage/${selectedLocal.logo}`" alt="Logo" class="w-5 h-5 me-2" />
                                {{ selectedLocal.nombre ? selectedLocal.nombre : 'Selecciona un equipo local' }}
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownLocal" style="max-height: 200px; overflow-y: auto; border: 1px solid #ee1d36;">
                                <li v-for="equipo in sortedEquipos" :key="equipo.id">
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                        @click.prevent="selectLocal(equipo)"
                                    >
                                        <img :src="`/storage/${equipo.logo}`" alt="Logo" class="w-5 h-5 me-2" />
                                        {{ equipo.nombre }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <InputError :message="form.errors.equipo_local_id" class="text-danger" />
                    </div>

                    <!-- Campo Equipo Visitante -->
                    <div class="mb-3">
                        <InputLabel for="equipo_visitante_id" value="Equipo Visitante *" />
                        <div class="dropdown">
                            <button
                                class="btn-public dropdown-toggle d-flex align-items-center"
                                type="button"
                                id="dropdownVisitante"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <img v-if="selectedVisitante.logo" :src="`/storage/${selectedVisitante.logo}`" alt="Logo" class="w-5 h-5 me-2" />
                                {{ selectedVisitante.nombre ? selectedVisitante.nombre : 'Selecciona un equipo visitante' }}
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownVisitante" style="max-height: 200px; overflow-y: auto; border: 1px solid #ee1d36;">
                                <li v-for="equipo in sortedEquipos" :key="equipo.id">
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                        @click.prevent="selectVisitante(equipo)"
                                    >
                                        <img :src="`/storage/${equipo.logo}`" alt="Logo" class="w-5 h-5 me-2" />
                                        {{ equipo.nombre }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <InputError :message="form.errors.equipo_visitante_id" class="text-danger" />
                    </div>
                </div>

                <!-- Campo Fecha y Hora -->
                <div class="mb-3">
                    <InputLabel for="fecha_hora" value="Fecha y Hora *" />
                    <input
                        type="datetime-local"
                        id="fecha_hora"
                        v-model="form.fecha_hora"
                        class="form-control"
                        required
                    />
                    <InputError :message="form.errors.fecha_hora" class="text-danger" />
                </div>

                <!-- Campo Resultado Local -->
                <div class="mb-3">
                    <InputLabel for="resultado_local" value="Resultado Local (opcional)" />
                    <input
                        type="number"
                        id="resultado_local"
                        v-model="form.resultado_local"
                        class="form-control"
                    />
                    <InputError :message="form.errors.resultado_local" class="text-danger" />
                </div>

                <!-- Campo Resultado Visitante -->
                <div class="mb-3">
                    <InputLabel for="resultado_visitante" value="Resultado Visitante (opcional)" />
                    <input
                        type="number"
                        id="resultado_visitante"
                        v-model="form.resultado_visitante"
                        class="form-control"
                    />
                    <InputError :message="form.errors.resultado_visitante" class="text-danger" />
                </div>

                <!-- Campo Estado -->
                <div class="mb-3">
                    <InputLabel for="estado" value="Estado *" />
                    <select
                        id="estado"
                        v-model="form.estado"
                        class="form-control"
                        required
                    >
                        <option value="" disabled>Selecciona un estado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                    <InputError :message="form.errors.estado" class="text-danger" />
                </div>

                <!-- Botón de Envío -->
                <button
                    type="submit"
                    class="btn-admin"
                    :disabled="form.processing"
                >
                    Crear Partido
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Swal from 'sweetalert2';

// Obtener los equipos desde las props
const props = defineProps({
    equipos: Array,
});

// Inicializar el formulario
const form = useForm({
    equipo_local_id: '',
    equipo_visitante_id: '',
    fecha_hora: '',
    resultado_local: null,
    resultado_visitante: null,
    estado: '',
});

// Variables para almacenar los equipos seleccionados
const selectedLocal = ref({});
const selectedVisitante = ref({});

// Computed para obtener los equipos ordenados alfabéticamente
const sortedEquipos = computed(() => {
    return [...props.equipos].sort((a, b) => {
        return a.nombre.localeCompare(b.nombre);
    });
});

// Función para seleccionar el equipo local
function selectLocal(equipo) {
    form.equipo_local_id = equipo.id;
    selectedLocal.value = equipo;
}

// Función para seleccionar el equipo visitante
function selectVisitante(equipo) {
    form.equipo_visitante_id = equipo.id;
    selectedVisitante.value = equipo;
}

// Función para enviar el formulario
function submit() {
    // Verificar que ambos equipos estén seleccionados
    if (!form.equipo_local_id || !form.equipo_visitante_id) {
        Swal.fire({
            title: 'Error',
            text: 'Debes seleccionar tanto el equipo local como el visitante.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
        return; // No enviar el formulario
    }

    form.post(route('partidos.store'), {
        onSuccess: () => {
            Swal.fire({
                title: '¡Éxito!',
                text: 'Partido creado con éxito.',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        },
        onError: () => {
            const errorMessages = Object.values(form.errors)
                .flat()
                .join(', ');
            Swal.fire({
                title: 'Error',
                text: errorMessages || 'Ocurrió un error inesperado.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        },
    });
}
</script>

<style scoped>
.container {
    max-width: 800px;
}

.container-vs {
    width: 50%;
    margin: 0 auto;
}

/* Estilo del dropdown */
.dropdown-menu {
    max-height: 300px !important; 
    overflow-y: auto; 
    border: 1px solid var(--red); 
}

/* Estilo del scroll */
.dropdown-menu::-webkit-scrollbar {
    width: 8px; 
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background-color: var(--red); 
    border-radius: 10px; 
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background-color: var(--red);
} 
</style>

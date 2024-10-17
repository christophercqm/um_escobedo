<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <!-- Mensaje si no hay partidos -->
                <div v-if="!ultimosPartidos.length" class="text-center">
                    <p>{{ message }}</p>
                </div>

                <!-- Tabla de últimos partidos -->
                <div v-else>
                    <h2 class="text-2xl font-bold mb-6">Últimos Partidos</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID del Partido</th>
                                <th>Partido</th>
                                <th>Puntuación Local</th>
                                <th>Puntuación Visitante</th>
                                <th>Estadio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="partido in ultimosPartidos" :key="partido.id">
                                <td>{{ partido.partido_id }}</td>
                                <td>
                                    {{ partido.partido.equipo_local.nombre }} vs {{ partido.partido.equipo_visitante.nombre }}
                                </td>
                                <td>{{ partido.puntuacion_local }}</td>
                                <td>{{ partido.puntuacion_visitante }}</td>
                                <td>{{ partido.estadio }}</td>
                                <td>{{ partido.estado_partido }}</td>
                                <td>
                                    <!-- Botones para editar y eliminar -->
                                    <NavLink :href="route('admin.ultimos_partidos.edit', partido.id)" class="btn btn-primary btn-sm">
                                        Editar
                                    </NavLink>
                                    <button class="btn btn-danger btn-sm" @click.prevent="eliminarPartido(partido.id)">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Botón para crear un nuevo último partido -->
                <div class="text-center mt-4">
                    <NavLink 
                        :href="route('admin.ultimos_partidos.create')" 
                        class="btn-escobedo btn-admin"
                    >
                        <i class="bi bi-plus-circle pr-2"></i>
                        Crear Último Partido
                    </NavLink>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Swal from 'sweetalert2'; // Importar SweetAlert
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";

// Propiedades que recibirán los datos
const props = defineProps({
    ultimosPartidos: Array,
    message: String, // Mensaje en caso de que no haya partidos
});

// Método para eliminar un partido
const eliminarPartido = (id) => {
    // Usar SweetAlert para confirmar la eliminación
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si se confirma, eliminar el partido
            Inertia.delete(`/ultimos-partidos/admin/${id}`, {
                onSuccess: () => {
                    // Mostrar mensaje de éxito
                    Swal.fire(
                        'Eliminado!',
                        'El partido ha sido eliminado.',
                        'success'
                    );
                },
                onError: (errors) => {
                    // Mostrar mensaje de error
                    Swal.fire(
                        'Error!',
                        'No se pudo eliminar el partido.',
                        'error'
                    );
                    console.error("Error al eliminar el partido:", errors);
                },
            });
        }
    });
};
</script>

<style scoped>
/* Aquí puedes agregar estilos personalizados si lo deseas */
</style>

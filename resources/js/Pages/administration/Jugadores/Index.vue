<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-escobedo btn-admin"
                    :href="route('admin.jugadores.create')"
                >
                    <i class="bi bi-person-plus pr-2"></i>
                    Crear Jugador
                </NavLink>

                <div style="overflow-x: auto">
                    <table
                        id="jugadoresTable"
                        class="table table-striped datatable my-4"
                    >
                        <thead>
                            <tr>
                                <th class="sortable" data-column="nombre">Nombre</th>
                                <th class="sortable" data-column="apellido">Apellido</th>
                                <th class="sortable" data-column="posicion">Posición</th>
                                <th class="sortable" data-column="numero_camiseta">Número de Camiseta</th>
                                <th class="sortable" data-column="equipo">Equipo</th>
                                <th class="sortable" data-column="estado">Estado</th> 
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="jugador in jugadores" :key="jugador.id">
                                <td>{{ jugador.nombre }}</td>
                                <td>{{ jugador.apellido }}</td>
                                <td>{{ jugador.posicion }}</td>
                                <td>{{ jugador.numero_camiseta }}</td>
                                <td>{{ jugador.equipo }}</td>
                                <td>
                                    <span v-if="jugador.estado === 'Activo'">Activo</span>
                                    <span v-else>Inactivo</span>
                                </td>   
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.jugadores.edit', jugador.id)"
                                        >
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>

                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.jugadores.show', jugador.id)"
                                        >
                                            <i class="bi bi-eye text-success"></i>
                                        </NavLink>

                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="eliminarJugador(jugador.id)"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Swal from "sweetalert2";

// Definir las props
const props = defineProps({
    jugadores: Array,
});

// Estado local para manejar la lista de jugadores
const jugadores = ref([...props.jugadores]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        dataTable = $("#jugadoresTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Función para eliminar un jugador
const eliminarJugador = (id) => {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            // Llamar al método destroy del controlador
            Inertia.delete(route("admin.jugadores.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de jugadores
                    jugadores.value = jugadores.value.filter(jugador => jugador.id !== id);
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El jugador ha sido eliminado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                },
                onError: () => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error al eliminar el jugador.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    });
                },
            });
        }
    });
};
</script>

<style>
.contain-icons i {
    font-size: 20px;
}

.contain-icons .icons {
    display: flex;
    gap: .5rem;
}
</style>

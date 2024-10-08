<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-admin"
                    :href="route('partidos.create')"
                >
                    <i class="bi bi-plus pr-2"></i>
                    Crear Partido
                </NavLink>

                <div style="overflow-x: auto">
                    <table
                        id="partidosTable"
                        class="table table-striped datatable my-4"
                    >
                        <thead>
                            <tr>
                                <th class="sortable" data-column="equipo_local">Equipo Local</th>
                                <th class="sortable" data-column="equipo_visitante">Equipo Visitante</th>
                                <th class="sortable" data-column="fecha_hora">Fecha y Hora</th>
                                <th class="sortable" data-column="resultado">Resultado</th>
                                <th class="sortable" data-column="estado">Estado</th>
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="partido in partidos" :key="partido.id">
                                <td>
                                    <div class="team-info">
                                        <img v-if="partido.equipo_local" :src="`/storage/${partido.equipo_local.logo}`" alt="Logo del equipo local" class="team-logo" />
                                        <span v-if="partido.equipo_local">{{ partido.equipo_local.nombre }}</span>
                                        <span v-else>No disponible</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="team-info">
                                        <img v-if="partido.equipo_visitante" :src="`/storage/${partido.equipo_visitante.logo}`" alt="Logo del equipo visitante" class="team-logo" />
                                        <span v-if="partido.equipo_visitante">{{ partido.equipo_visitante.nombre }}</span>
                                        <span v-else>No disponible</span>
                                    </div>
                                </td>

                                <td>{{ new Date(partido.fecha_hora).toLocaleString() }}</td>
                                <td>
                                    {{ partido.resultado_local || 0 }} - {{ partido.resultado_visitante || 0 }}
                                </td>
                                <td>
                                    <span v-if="partido.estado === 'Activo'" class="text-success">Activo</span>
                                    <span v-else class="text-danger">{{ partido.estado }}</span>
                                </td>
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('partidos.edit', partido.id)"
                                        >
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>

                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('partidos.show', partido.id)"
                                        >
                                            <i class="bi bi-eye text-success"></i>
                                        </NavLink>

                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="eliminarPartido(partido.id)"
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
    partidos: Array,
});

// Estado local para manejar la lista de partidos
const partidos = ref([...props.partidos]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        dataTable = $("#partidosTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Función para eliminar un partido
const eliminarPartido = (id) => {
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
            Inertia.delete(route("partidos.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de partidos
                    partidos.value = partidos.value.filter(partido => partido.id !== id);
                    // Reiniciar DataTable para reflejar el cambio
                    if (dataTable) {
                        dataTable.clear().rows.add(partidos.value).draw();
                    }
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El partido ha sido eliminado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                },
                onError: () => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error al eliminar el partido.',
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

.team-info {
    display: flex;
    align-items: center;
}

.team-logo {
    width: 30px; /* Ajusta el tamaño del logo según sea necesario */
    height: 30px; /* Ajusta el tamaño del logo según sea necesario */
    margin-right: 8px; /* Espacio entre el logo y el nombre */
}

tbody {
    font-size: 15px;
}
</style>

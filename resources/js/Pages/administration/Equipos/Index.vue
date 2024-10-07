<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-admin"
                    :href="route('equipos.create')"
                >
                    <i class="bi bi-plus-circle pr-2"></i>
                    Agregar Nuevo Equipo
                </NavLink>

                <div style="overflow-x: auto">
                    <table
                        id="equiposTable"
                        class="table table-striped datatable my-4"
                    >
                        <thead>
                            <tr>
                                <th class="sortable" data-column="nombre">Nombre</th>
                                <th class="sortable" data-column="ciudad">Ciudad</th>
                                <th class="sortable" data-column="pais">País</th>
                                <th class="sortable" data-column="logo">Logo</th>
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="equipo in equipos" :key="equipo.id">
                                <td>{{ equipo.nombre }}</td>
                                <td>{{ equipo.ciudad }}</td>
                                <td>{{ equipo.pais }}</td>
                                <td>
                                    <img
                                        v-if="equipo.logo"
                                        :src="`/storage/${equipo.logo}`"
                                        alt="Logo"
                                        class="w-20 h-20 object-cover img-equipo"
                                    />
                                    <span v-else>No disponible</span>
                                </td>
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('equipos.edit', equipo.id)"
                                        >
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>

                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="eliminarEquipo(equipo.id)"
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
    equipos: Array,
});

// Estado local para manejar la lista de equipos
const equipos = ref([...props.equipos]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        dataTable = $("#equiposTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Función para eliminar un equipo
const eliminarEquipo = (id) => {
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
            Inertia.delete(route("equipos.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de equipos
                    equipos.value = equipos.value.filter(equipo => equipo.id !== id);
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El equipo ha sido eliminado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                },
                onError: () => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error al eliminar el equipo.',
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

.img-equipo {
    width: 30px;
    height: 30px;
    object-fit: cover;
}


</style>

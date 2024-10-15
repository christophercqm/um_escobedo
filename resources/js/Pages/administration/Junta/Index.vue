<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink class="btn-escobedo btn-admin" :href="route('admin.junta.create')">
                    <i class="bi bi-person-plus pr-2"></i>
                    Crear Junta
                </NavLink>
                <div v-if="miembros.length === 0" class="text-center">
                    <p>No hay miembros en la junta.</p>
                </div>
                <div v-else>
                    <table id="miembrosTable" class="table table-striped datatable my-4">
                        <thead>
                            <tr>
                                <th class="sortable" data-column="nombre">Nombre</th>
                                <th class="sortable" data-column="cargo">Cargo</th>
                                <th class="sortable" data-column="foto">Foto</th>
                                <th class="sortable" data-column="estado">Estado</th>
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="miembro in miembros" :key="miembro.id">
                                <td>{{ miembro.nombre }}</td>
                                <td>{{ miembro.cargo }}</td>
                                <td>
                                    <img :src="`/storage/${miembro.foto_url}`" alt="Imagen"
                                        class="w-20 h-20 object-cover img-miembro" />
                                </td>
                                <td>
                                    <span v-if="miembro.estado === 'Activo'">Activo</span>
                                    <span v-else>Inactivo</span>
                                </td>
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.junta.edit', miembro.id)">
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>
                                        <NavLink class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.junta.show', miembro.id)">
                                            <i class="bi bi-eye text-success"></i>
                                        </NavLink>
                                        <button class="text-red-600 hover:text-red-900"
                                            @click="eliminarMiembro(miembro.id)">
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
    miembros: Array, // Cambiar a 'miembros' para la junta
});

// Estado local para manejar la lista de miembros
const miembros = ref([...props.miembros]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        // Cambia aquí el ID de la tabla a 'miembrosTable'
        dataTable = $("#miembrosTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Función para eliminar un miembro de la junta
const eliminarMiembro = (id) => {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            // Llamar al método destroy del controlador
            Inertia.delete(route("admin.junta.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de miembros
                    miembros.value = miembros.value.filter(m => m.id !== id);
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El miembro de la junta ha sido eliminado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                },
                onError: () => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error al eliminar el miembro.',
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

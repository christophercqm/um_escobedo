<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-escobedo btn-admin"
                    :href="route('cuerpo-tecnico.create')"
                >
                    <i class="bi bi-person-plus pr-2"></i>
                    Crear Miembro del Cuerpo Técnico
                </NavLink>

                <div style="overflow-x: auto">
                    <table
                        id="technicalStaffTable"
                        class="table table-striped datatable my-4"
                    >
                        <thead>
                            <tr>
                                <th class="sortable" data-column="nombres">Nombres</th>
                                <th class="sortable" data-column="apellidos">Apellidos</th>
                                <th class="sortable" data-column="rol">Rol</th>
                                <th class="sortable" data-column="foto">Foto</th>
                                <th class="sortable" data-column="estado">Estado</th>
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="miembro in cuerpoTecnico" :key="miembro.id">
                                <td>{{ miembro.nombres }}</td>
                                <td>{{ miembro.apellidos }}</td>
                                <td>{{ miembro.rol }}</td>
                                <td>
                                    <img
                                        :src="`/storage/${miembro.foto}`"
                                        alt="Foto"
                                        class="w-20 h-20 object-cover img-miembro"
                                    />
                                </td>
                                <td>
                                    <span v-if="miembro.estado === 'Activo'">Activo</span>
                                    <span v-else>Inactivo</span>
                                </td>
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('cuerpo-tecnico.edit', miembro.id)"
                                        >
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>

                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('cuerpo-tecnico.show', miembro.id)"
                                        >
                                            <i class="bi bi-eye text-success"></i>
                                        </NavLink>

                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="eliminarMiembro(miembro.id)"
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
    cuerpoTecnico: Array,
});

// Estado local para manejar la lista de cuerpo técnico
const cuerpoTecnico = ref([...props.cuerpoTecnico]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        dataTable = $("#technicalStaffTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Función para eliminar un miembro del cuerpo técnico
const eliminarMiembro = (id) => {
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
            Inertia.delete(route("cuerpo-tecnico.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de cuerpo técnico
                    cuerpoTecnico.value = cuerpoTecnico.value.filter(miembro => miembro.id !== id);
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El miembro ha sido eliminado.',
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

.img-miembro {
    object-fit: contain;
}
</style>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-escobedo btn-admin"
                    :href="route('admin.prensa.create')"
                >
                    <i class="bi bi-pen pr-2"></i>
                    Crear artículo
                </NavLink>

                <div style="overflow-x: auto">
                    <table
                        id="prensaTable"
                        class="table table-striped datatable my-4"
                    >
                        <thead>
                            <tr>
                                <th class="sortable" data-column="fecha_creacion">Fecha de Creación</th>
                                <th class="sortable" data-column="titulo">Título</th>
                                <th class="sortable" data-column="descripcion_breve">Descripción Breve</th>
                                <th class="sortable" data-column="descripcion">Descripción Completa</th>
                                <th class="sortable imagen-principal" data-column="imagen">Imagen</th>
                                <th class="sortable" data-column="estado">Estado</th> 
                                <th class="sortable" data-column="categoria">Categoría</th>
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="articulo in articulos" :key="articulo.id">
                                <td>{{ articulo.fecha_creacion }}</td>
                                <td>{{ articulo.titulo }}</td>
                                <td>{{ articulo.descripcion_breve }}</td>
                                <td>{{ articulo.descripcion }}</td>
                                <td>
                                    <img
                                        :src="`/storage/${articulo.imagen}`"
                                        alt="Imagen"
                                        class="w-20 h-20 object-cover"
                                    />
                                </td>
                                <td>
                                    <!-- Mostrar "Visible" o "Oculto" basado en el estado -->
                                    <span v-if="articulo.estado === 1">Visible</span>
                                    <span v-else>Oculto</span>
                                </td>
                                <td>
                                   <span> {{ formatCategoria(articulo.categoria) }}</span>
                                </td>
                                <td class="contain-icons">
                                    <div class="icons">
                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.prensa.edit', articulo.id)"
                                        >
                                            <i class="bi bi-pencil-square text-success"></i>
                                        </NavLink>

                                        <NavLink
                                            class="text-blue-600 hover:text-blue-900"
                                            :href="route('admin.prensa.show', articulo.id)"
                                        >
                                            <i class="bi bi-eye text-success"></i>
                                        </NavLink>

                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="eliminarArticulo(articulo.id)"
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
    prensa: Array,
});

// Estado local para manejar la lista de artículos
const articulos = ref([...props.prensa]);

let dataTable;

onMounted(() => {
    // Inicializa DataTable solo si jQuery y DataTables están disponibles
    if (window.$) {
        dataTable = $("#prensaTable").DataTable(); // Inicializa DataTable
    }
});

onBeforeUnmount(() => {
    // Destruir la instancia de DataTable si existe
    if (dataTable) {
        dataTable.destroy();
    }
});

// Método para formatear la categoría
const formatCategoria = (categoria) => {
    return categoria === 'cronicas' ? 'Crónicas' : categoria.charAt(0).toUpperCase() + categoria.slice(1);
}

// Función para eliminar un artículo
const eliminarArticulo = (id) => {
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
            Inertia.delete(route("admin.prensa.destroy", id), {
                onSuccess: () => {
                    // Actualizar la lista local de artículos
                    articulos.value = articulos.value.filter(articulo => articulo.id !== id);
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El artículo ha sido eliminado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                },
                onError: () => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error al eliminar el artículo.',
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

<template>
    <Head title="Prensa" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Prensa
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <NavLink
                    class="btn-escobedo"
                    :href="route('admin.prensa.create')"
                >
                    Añadir
                </NavLink>

                <!-- Mostrar mensaje de éxito -->
                <div v-if="props.flash && props.flash.success" class="alert alert-success">
                    {{ props.flash.success }}
                </div>

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
                                <th class="sortable" data-column="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="articulo in props.prensa" :key="articulo.id">
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
                                    <Link
                                        class="text-blue-600 hover:text-blue-900"
                                        :href="route('admin.prensa.edit', articulo.id)"
                                    >
                                        Editar
                                    </Link>
                                    <button
                                        class="text-red-600 hover:text-red-900"
                                        @click="eliminarArticulo(articulo.id)"
                                    >
                                        Eliminar
                                    </button>
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
import { onMounted, onBeforeUnmount } from "vue";
import Head from "@inertiajs/inertia-vue3"; // Asegúrate de que esta importación sea correcta

import { Inertia } from "@inertiajs/inertia"; // Asegúrate de importar Inertia
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Swal from 'sweetalert2';

// Definir las props
const props = defineProps({
    prensa: Array, // Espera un arreglo de artículos de prensa
});

// Variable para almacenar la instancia de DataTable
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

// Función para eliminar un artículo
const eliminarArticulo = async (id) => {
    const { value: confirmDelete } = await Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    });

    if (confirmDelete) {
        // Llamar al método destroy del controlador
        Inertia.delete(route('admin.prensa.destroy', id));
    }
};

</script>

<style>
/* Aquí puedes agregar estilos personalizados */
</style>

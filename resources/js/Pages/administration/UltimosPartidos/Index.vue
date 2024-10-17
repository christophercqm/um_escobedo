<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <!-- Mensaje si no hay partidos -->
                <div class="text-center">
                    <p>No hay últimos partidos registrados.</p>
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue"; // Asegúrate de importar el NavLink

// No es necesario incluir lógica o propiedades relacionadas con partidos
</script>

<style scoped>
/* Aquí puedes agregar estilos personalizados si lo deseas */
</style>

<template>
    <GuestLayout>
        <div class="content container-proximos-partidos w-100 bg-white">
            <div class="container bg-white">
                <div class="row">
                    <div class="col bg-white">
                        <!-- Botón de Volver -->
                        <NavLink href="/" class="btn-public mb-3">
                            Volver
                        </NavLink>

                        <h1 class="bg-white">Próximos Partidos</h1>
                        <table class="table table-hover bg-white box-shadow">
                            <thead>
                                <tr>
                                    <th>Fecha y Hora</th>
                                    <th>Local</th>
                                    <th>Visitante</th>
                                    <th>Liga</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="partido in partidos" :key="partido.id">
                                    <td>
                                        {{
                                            formatFecha(partido.fecha_hora)
                                        }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <span class="logo-icon">
                                                <img :src="`storage/${partido.equipo_local.logo}`" alt="Logo Local"
                                                    class="img-fluid icon" />
                                            </span>
                                            <span class="equipo">
                                                {{
                                                    partido.equipo_local.nombre
                                                }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <span class="logo-icon">
                                                <img :src="`storage/${partido.equipo_visitante.logo}`"
                                                    alt="Logo Visitante" class="img-fluid icon" />
                                            </span>
                                            <span class="equipo">
                                                {{
                                                    partido.equipo_visitante
                                                        .nombre
                                                }}
                                            </span>
                                           
                                        </div>
                                    </td>

                                    <td>
                                        <span>Segunda RFEF</span>
                                    </td>

                                    <td>{{ partido.estado }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { defineProps } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";

// Definir las propiedades recibidas
const props = defineProps({
    partidos: {
        type: Array,
        required: true,
    },
});

// Función para formatear la fecha
function formatFecha(fecha) {
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    const fechaFormateada = new Date(fecha).toLocaleDateString('es-ES', options);
    
    // Cambiar la primera letra del mes a mayúscula
    return fechaFormateada.replace(/(\d+)\s([a-záéíóú]+)(\s\d{4})/, (match, day, month, year) => {
        return `${day} ${capitalizeFirstLetter(month)}${year}`;
    });
}

// Función auxiliar para capitalizar la primera letra
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
</script>

<style scoped>
.container {
    margin-top: 20px;
}
</style>

<style setup>
.container-proximos-partidos {
    max-width: 1250px;
    margin-left: auto;
    margin-right: auto;
}

table tr,
td,
th {
    font-family: var(--roboto) !important;
}

thead tr th {
    font-size: 12px;
}

tbody tr td {
    font-size: 12px;
}

.icon {
    width: 20px;
}
</style>

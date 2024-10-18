<template>
    <GuestLayout>
        <div class="content container-proximos-partidos w-100 bg-white">
            <div class="container bg-white fade-in">
                <div class="row">
                    <div class="col bg-white">
                        <!-- Botón de Volver -->
                        <NavLink href="/" class="btn-public mb-3">
                            Volver
                        </NavLink>

                        <h1 class="bg-white">Próximos Partidos</h1>

                        <div class="table-responsive">
                            <table class="table table-hover bg-white box-shadow">
                                <thead>
                                    <tr>
                                        <th class="title-encabezado">Fecha y Hora</th>
                                        <th class="title-encabezado">Local</th>
                                        <th class="title-encabezado">Visitante</th>
                                        <th class="title-encabezado">Liga</th>
                                        <th class="title-encabezado">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="partido in partidosFiltrados" :key="partido.id">
                                        <td>{{ formatFecha(partido.fecha_hora) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="logo-icon">
                                                    <img :src="`storage/${partido.equipo_local.logo}`" alt="Logo Local"
                                                        class="img-fluid icon" />
                                                </span>
                                                <span class="equipo">{{ partido.equipo_local.nombre }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="logo-icon">
                                                    <img :src="`storage/${partido.equipo_visitante.logo}`" alt="Logo Visitante"
                                                        class="img-fluid icon" />
                                                </span>
                                                <span class="equipo">{{ partido.equipo_visitante.nombre }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Segunda RFEF</span>
                                        </td>
                                        <td class="text-success">{{ partido.estado }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { defineProps, computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";

// Definir las propiedades recibidas
const props = defineProps({
    partidos: {
        type: Array,
        required: true,
    },
});

// Computed property para filtrar partidos
const partidosFiltrados = computed(() => {
    const now = new Date();
    return props.partidos.filter(partido => new Date(partido.fecha_hora) > now);
});

// Función para formatear la fecha
function formatFecha(fecha) {
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    const fechaFormateada = new Date(fecha).toLocaleDateString('es-ES', options);
    return fechaFormateada.replace(/(\d+)\s([a-záéíóú]+)(\s\d{4})/, (match, day, month, year) => {
        return `${day} ${capitalizeFirstLetter(month)} ${year}`;
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

.title-encabezado {
    color: var(--red) !important;
}

.table-responsive {
    overflow-x: auto; /* Permite el desplazamiento horizontal en pantallas pequeñas */
}

@media (max-width: 768px) {
    h1 {
        font-size: 24px; /* Tamaño de fuente más pequeño para móviles */
    }

    .title-encabezado {
        font-size: 10px; /* Tamaño de fuente más pequeño en móviles */
    }

    tbody tr td {
        font-size: 10px; /* Tamaño de fuente más pequeño en móviles */
    }

    .icon {
        width: 30px; /* Aumentar el tamaño del logo en móviles */
    }

    .d-flex {
        flex-direction: column; /* Cambia a columna en móviles */
        align-items: flex-start; /* Alinea los elementos al inicio */
    }
}
</style>

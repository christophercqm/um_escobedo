<template>
    <GuestLayout>
        <div class="content container-proximos-partidos w-100">
            <div class="container bg-white">
                <div class="row">
                    <div class="col">
                        <h1>Próximos Partidos</h1>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Equipo Local</th>
                                    <th>Logo Local</th>
                                    <th>Equipo Visitante</th>
                                    <th>Logo Visitante</th>
                                    <th>Fecha y Hora</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="partido in partidos"
                                    :key="partido.id"
                                >
                                    <td>{{ partido.equipo_local.nombre }}</td>
                                    <td>
                                        <img
                                            :src="`storage/${partido.equipo_local.logo}`"
                                            alt="Logo Local"
                                            class="img-fluid"
                                            style="width: 50px; height: auto"
                                        />
                                    </td>
                                    <td>
                                        {{ partido.equipo_visitante.nombre }}
                                    </td>
                                    <td>
                                        <img
                                            :src="`storage/${partido.equipo_visitante.logo}`"
                                            alt="Logo Visitante"
                                            class="img-fluid"
                                            style="width: 50px; height: auto"
                                        />
                                    </td>
                                    <td>
                                        {{
                                            new Date(
                                                partido.fecha_hora
                                            ).toLocaleString()
                                        }}
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

// Definir las propiedades recibidas
const props = defineProps({
    partidos: {
        type: Array,
        required: true,
    },
});
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
</style>
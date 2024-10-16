<template>
    <div class="col-md-4">
        <div class="sidebar box-shadow p-3">
            <div class="container-proximo-partido">
                <h5
                    class="sidebar-title text-uppercase d-flex justify-between align-items-center mb-4"
                >
                    <span class="title-proximo-partido">Próximo partido</span>
                </h5>
                <hr class="separator" />

                <div v-if="proximoPartido" class="proximo-partido">
                    <div class="container-segunda-ref">
                        <p class="text-center text-uppercase segunda-ref mb-0">
                            segunda ref
                        </p>
                        <small class="fecha-partido text-center d-block">{{
                            formatDate(proximoPartido.fecha_hora)
                        }}</small>
                    </div>
                    <div class="match-info text-center">
                        <div class="d-flex justify-between align-items-center container-partido-vs">
                            <div class="equipo-uno d-flex flex-column">
                                <img
                                    :src="`/storage/${proximoPartido.equipo_local.logo}`"
                                    alt="Logo equipo local"
                                    class="team-logo"
                                />
                                <strong class="name-equipo">{{
                                    proximoPartido.equipo_local.nombre
                                }}</strong>
                            </div>

                            <div class="vs">
                                <span class="vs">vs</span>
                                <span class="hora">{{
                                    formatHour(proximoPartido.fecha_hora)
                                }}</span>
                            </div>

                            <div class="equipo-dos d-flex flex-column">
                                <img
                                    :src="`/storage/${proximoPartido.equipo_visitante.logo}`"
                                    alt="Logo equipo visitante"
                                    class="team-logo"
                                />
                                <strong class="name-equipo">{{
                                    proximoPartido.equipo_visitante.nombre
                                }}</strong>
                            </div>
                        </div>

                        <div class="conteo d-flex justify-center gap-3 mt-4">
                            <div class="dia d-flex flex-column">
                                <span class="number">{{
                                    padNumber(days)
                                }}</span>
                                <small class="text-conteo">días</small>
                            </div>
                            <div class="puntos">
                                <span>:</span>
                            </div>
                            <div class="horas d-flex flex-column">
                                <span class="number">{{
                                    padNumber(hours)
                                }}</span>
                                <small class="text-conteo">horas</small>
                            </div>
                            <div class="puntos">
                                <span>:</span>
                            </div>
                            <div class="minutos d-flex flex-column">
                                <span class="number">{{
                                    padNumber(minutes)
                                }}</span>
                                <small class="text-conteo">minutos</small>
                            </div>
                            <div class="puntos">
                                <span>:</span>
                            </div>
                            <div class="segundos d-flex flex-column">
                                <span class="number">{{
                                    padNumber(seconds)
                                }}</span>
                                <small class="text-conteo">segundos</small>
                            </div>
                        </div>
                        </div>

                    <div class="button-proximo-partido d-flex justify-center ">
                        <NavLink 
                            class="btn-public text-center"
                            :href="route('proximos-partidos.index')" 
                        >
                             Ver todos los partidos 
                            
                        </NavLink>
                    </div>
                </div>

                <div v-else class="text-center">
                    <p>No hay próximos partidos.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref, onMounted, onUnmounted } from "vue";
import NavLink from "../NavLink.vue";

const props = defineProps({
    proximoPartido: {
        type: Object,
        required: true, // Asegúrate de que esta prop es obligatoria
    },
});

// Función para formatear la fecha
const formatDate = (fecha) => {
    const date = new Date(fecha);
    const options = { day: "numeric", month: "short", year: "numeric" };
    return date
        .toLocaleDateString("es-ES", options)
        .replace(".", "")
        .toUpperCase(); // Quitar el punto y convertir a mayúsculas
};

// Función para pad a dos dígitos
const padNumber = (num) => {
    return String(num).padStart(2, "0");
};

console.log("Props recibidas en Sidebar:", props); // Verificar que la prop llega correctamente

// Contadores para los días, horas, minutos y segundos
const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);

// Función para formatear la hora
const formatHour = (fecha) => {
    const date = new Date(fecha);
    const hours = String(date.getHours()).padStart(2, "0"); // Asegura que las horas estén en formato de 2 dígitos
    const minutes = String(date.getMinutes()).padStart(2, "0"); // Asegura que los minutos estén en formato de 2 dígitos
    return `${hours}:${minutes}`; // Retorna el formato deseado "18:00"
};

// Función para calcular el tiempo restante
const calculateTimeRemaining = () => {
    const now = new Date();
    const targetDate = new Date(props.proximoPartido.fecha_hora);
    const totalSeconds = Math.floor((targetDate - now) / 1000);

    if (totalSeconds >= 0) {
        days.value = Math.floor(totalSeconds / 86400); // 86400 segundos en un día
        hours.value = Math.floor((totalSeconds % 86400) / 3600); // 3600 segundos en una hora
        minutes.value = Math.floor((totalSeconds % 3600) / 60); // 60 segundos en un minuto
        seconds.value = totalSeconds % 60; // Resto de segundos
    } else {
        // Si el tiempo ha pasado, reiniciar los contadores
        days.value = 0;
        hours.value = 0;
        minutes.value = 0;
        seconds.value = 0;
    }
};

// Inicializar el contador y actualizar cada segundo
let intervalId;
onMounted(() => {
    calculateTimeRemaining();
    intervalId = setInterval(() => {
        calculateTimeRemaining();
    }, 1000);
});

// Limpiar el intervalo al desmontar el componente
onUnmounted(() => {
    clearInterval(intervalId);
});
</script>

<style scoped>
.team-logo {
    width: 50px;
    height: auto;
}

.separator {
    margin: 10px 0;
}

.btn-proximo-partido {
    color: var(--gray) !important;
    font-size: 13px;
    border: 1px solid var(--gray);
    padding: 5px;
}

.equipo-uno,
.equipo-dos {
    justify-content: center;
    align-items: center;
    gap: 1rem;
}

.name-equipo {
    color: var(--blue);
    font-weight: 500;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.vs {
    color: var(--grayv2);
    font-size: 2.5rem;
    display: flex;
    flex-direction: column;
}

.vs span.vs {
    line-height: 1;
    color: var(--blue);
    font-weight: 500;
}

.vs .hora {
    font-size: .8rem;
    color: var(--red);
    font-weight: 500;
}

.conteo .number {
    color: var(--blue);
    font-weight: 700;
    font-size: 2rem;
}

.conteo .text-conteo {
    color: var(--blue);
    text-transform: uppercase;
    font-size: 0.7rem;
}

.puntos {
    color: var(--blue);
    font-weight: 700;
}

.puntos span {
    display: block;
    font-size: 1.5rem;
    padding-top: 0.2rem;
}

.segunda-ref {
    color: var(--blue);
    font-weight: 600;
}

.fecha-partido {
    color: var(--red);
    font-weight: 500;
    font-size: .8rem;
}

.container-segunda-ref {
    margin-bottom: 2.2rem;
}

.box-shadow {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.container-partido-vs {
    margin-bottom: 3rem;
}

.button-proximo-partido {
    margin-top: 2rem;
}
</style>

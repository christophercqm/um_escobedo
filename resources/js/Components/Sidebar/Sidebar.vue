<template>
    <div class="col-md-4 fade-in">
        <div class="sidebar">
            <!-- PRÓXIMO PARTIDO-->
            <div class="container-proximo-partido box-shadow p-3 mb-4">
                <h5 class="sidebar-title text-uppercase d-flex justify-between align-items-center mb-4">
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
                                <img :src="`/storage/${proximoPartido.equipo_local.logo}`" alt="Logo equipo local"
                                    class="team-logo" />
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
                                <img :src="`/storage/${proximoPartido.equipo_visitante.logo}`"
                                    alt="Logo equipo visitante" class="team-logo" />
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

                    <div class="button-proximo-partido d-flex justify-center">
                        <NavLink class="btn-public text-center" :href="route('proximos-partidos.index')">
                            Ver próximos partidos
                        </NavLink>
                    </div>
                </div>

                <div v-else class="text-center">
                    <p>No hay próximos partidos.</p>
                </div>
            </div>

            <!-- ÚLTIMO PARTIDO -->
            <div class="container-siguenos box-shadow p-3">
                <h5 class="sidebar-title text-uppercase d-flex mb-4 align-items-center justify-between">
                    <span class="title-proximo-partido">Último partido</span>
                </h5>
                <hr class="separator" />
                <div class="container-segunda-ref">
                    <p class="text-center text-uppercase segunda-ref mb-0">
                        Segunda ref 2024-25
                    </p>
                    <p class="fecha-partido text-center d-block">
                        {{
                            ultimoPartido && ultimoPartido.partido
                                ? formatFullDate(
                                    ultimoPartido.partido.fecha_hora
                                )
                                : "No disponible"
                        }}
                    </p>

                    <!-- Información del último partido con los equipos -->
                    <div class="match-info text-center mt-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="equipo-uno d-flex flex-column align-items-center">
                                <img :src="`/storage/${ultimoPartido.partido.equipo_local.logo}`"
                                    alt="Logo equipo local" class="team-logo" />
                                <strong class="name-equipo">{{
                                    ultimoPartido.partido.equipo_local.nombre
                                }}</strong>
                            </div>
                            <div class="vs mx-2">
                                <span class="vs goles d-flex gap-2">
                                    <span class="resultado text-center">
                                        {{
                                            ultimoPartido
                                                ? ultimoPartido.puntuacion_local
                                                : 0
                                        }}
                                        -
                                        {{
                                            ultimoPartido
                                                ? ultimoPartido.puntuacion_visitante
                                                : 0
                                        }}
                                    </span>
                                    <small class="estadio">
                                        {{
                                            ultimoPartido
                                                ? ultimoPartido.estadio
                                                : "No disponible"
                                        }}
                                    </small>
                                </span>
                            </div>
                            <div class="equipo-dos d-flex flex-column align-items-center">
                                <img :src="`/storage/${ultimoPartido.partido.equipo_visitante.logo}`"
                                    alt="Logo equipo visitante" class="team-logo" />
                                <strong class="name-equipo">{{
                                    ultimoPartido.partido.equipo_visitante
                                        .nombre
                                }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SÍGUENOS -->
            <div class="container-siguenos box-shadow p-3">
                <h5 class="sidebar-title text-uppercase d-flex mb-4 align-items-center justify-between">
                    <span class="title-proximo-partido">Síguenos</span>
                    <div class="redes d-flex gap-3">
                        <div class="social-icons">
                            <a href="https://www.instagram.com/um_escobedooficial/" target="_blank">
                                <i class="fa-brands fa-instagram icon"></i>
                            </a>
                        </div>
                        <div class="social-icons">
                            <a href="https://x.com/UMEscobedo?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                                target="_blank">
                                <i class="fa-brands fa-x-twitter icon"></i>
                            </a>
                        </div>
                    </div>
                </h5>
                <hr class="separator" />

                <div class="img-socio mt-4">
                    <img :src="bg_sidebar" alt="Imagen Escobedo" />
                    <div class="overlay"></div>
                </div>

                <div class="button-hazte-socio w-100 d-flex justify-center">
                    <NavLink class="btn-public text-center" :href="route('contacto')">
                        Hazte socio
                    </NavLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref, onMounted, onUnmounted } from "vue";
import bg_sidebar from "@images/bg-sidebar.jpeg";
import NavLink from "../NavLink.vue";

const props = defineProps({
    proximoPartido: {
        type: Object,
        required: true,
    },
    ultimoPartido: {
        type: Object,
        required: true,
    },
});

// Función para formatear la fecha y la hora en el formato "DD MMM YYYY - HH:mm"
const formatFullDate = (fecha) => {
    const date = new Date(fecha);
    const optionsDate = { day: "numeric", month: "short", year: "numeric" };
    const formattedDate = date
        .toLocaleDateString("es-ES", optionsDate)
        .replace(".", "")
        .toUpperCase();

    const hours = String(date.getHours()).padStart(2, "0");
    const minutes = String(date.getMinutes()).padStart(2, "0");

    return `${formattedDate} - ${hours}:${minutes}`;
};

// Función para formatear la fecha
const formatDate = (fecha) => {
    const date = new Date(fecha);
    const options = { day: "numeric", month: "short", year: "numeric" };
    return date
        .toLocaleDateString("es-ES", options)
        .replace(".", "")
        .toUpperCase();
};

// Función para pad a dos dígitos
const padNumber = (num) => {
    return String(num).padStart(2, "0");
};

// Contadores para los días, horas, minutos y segundos
const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);

// Función para formatear la hora
const formatHour = (fecha) => {
    const date = new Date(fecha);
    const hours = String(date.getHours()).padStart(2, "0");
    const minutes = String(date.getMinutes()).padStart(2, "0");
    return `${hours}:${minutes}`;
};

// Función para calcular el tiempo restante
const calculateTimeRemaining = () => {
    const now = new Date();
    const targetDate = new Date(props.proximoPartido.fecha_hora);
    const totalSeconds = Math.floor((targetDate - now) / 1000);

    if (totalSeconds >= 0) {
        days.value = Math.floor(totalSeconds / 86400);
        hours.value = Math.floor((totalSeconds % 86400) / 3600);
        minutes.value = Math.floor((totalSeconds % 3600) / 60);
        seconds.value = totalSeconds % 60;
    } else {
        days.value = 0;
        hours.value = 0;
        minutes.value = 0;
        seconds.value = 0;
    }
};

// Inicializar el contador y actualizar cada segundo
let intervalId;
onMounted(() => {
    console.log("Ultimo Partido:", props.ultimoPartido);
    calculateTimeRemaining();
    intervalId = setInterval(calculateTimeRemaining, 1000);
});

// Limpiar el intervalo al desmontar
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
    font-size: 0.8rem;
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
    font-size: 0.8rem;
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
    font-size: 0.8rem;
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

.img-socio {
    position: relative;
    width: 100%;
    max-height: 220px;
    height: 220px;
    position: relative;
    object-position: center;
}

.img-socio img {
    width: 100%;
    height: 100%;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.social-icons .icon {
    font-size: 1.5rem;
    color: var(--red);
}

.estadio {
    font-size: .7rem;
    padding: 0 1rem;
}
</style>

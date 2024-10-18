<template>
    <GuestLayout>
        <div class="content container-home w-100">
            <div class="container container-bg px-0">
                <div class="row row-info-bg">
                    <div class="bg-home"></div>
                    <div class="col col-bg-info">
                        <!-- INFO DESC TOP -->
                        <div class="content-top">
                            <div class="slider-content d-flex flex-column align-items-start">
                                <h3 class="text-white">
                                    Bienvenido al Club Escobedo
                                </h3>
                                <h2 class="text-white text-left title">
                                    Somos profesionales
                                    <span class="d-block">Club de Fútbol</span>
                                </h2>
                                <p class="text-white text-left">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Quisque non velit sed urna
                                    dapibus condimentum. Nulla facilisi. Morbi
                                    auctor risus nec ligula posuere,
                                </p>
                                <NavLink href="/club" class="btn-public btn-acerca-club text-white d-flex gap-3">
                                    <span class="text-acerca-club">
                                        Acerca del club
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                    </svg>
                                </NavLink>
                            </div>
                        </div>

                        <!-- SIGUIENTES PARTIDOS  -->
                        <div class="next-match-banner">
                            <div class="next-match-widget text-center semi-black">
                                <h2 class="text-white m-0 title-next-match">Próximo partido</h2>
                                <hr class="separator">

                                <!-- Nombre de la competición o liga -->
                                <h4 class="next-match mb-0 text-uppercase text-white">
                                    segunda ref
                                </h4>
                                <!-- Fecha del partido -->
                                <h5 class="date mt-1">
                                    {{ formatDate(proximoPartido.fecha_hora) }}
                                </h5>

                                <div class="match-info d-flex align-items-center justify-content-center mt-2">
                                    <!-- Logo equipo local -->
                                    <div
                                        class="team-info text-center d-flex flex-column justify-center align-items-center">
                                        <figure class="container-image">
                                            <img :src="`/storage/${proximoPartido.equipo_local.logo}`" alt="Logo Local"
                                                class="team-logo" />
                                        </figure>
                                        <h6 class="team-name text-white">
                                            {{
                                                proximoPartido.equipo_local
                                                    .nombre
                                            }}
                                        </h6>
                                    </div>

                                    <div class="vs-section mx-3">
                                        <h3 class="vs-text text-white mb-0">VS</h3>
                                        <p class="match-time">
                                            {{
                                                formatTime(
                                                    proximoPartido.fecha_hora
                                                )
                                            }}
                                        </p>
                                    </div>

                                    <!-- Logo equipo visitante -->
                                    <div
                                        class="team-info text-center d-flex flex-column justify-center align-items-center">
                                        <figure class="container-image">
                                            <img :src="`/storage/${proximoPartido.equipo_visitante.logo}`"
                                                alt="Logo Visitante" class="team-logo" />
                                        </figure>
                                        <h6 class="team-name text-white">
                                            {{
                                                proximoPartido.equipo_visitante
                                                    .nombre
                                            }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <a class="top-mc-starts mt-4">
                                <h5 class="mn-mc-titel text-center text-white">
                                    Inicio de LaLiga 2024
                                </h5>
                                <hr />

                                <ul class="d-flex flex-column justify-content-center w-100 p-0 list-assis">
                                    <li class="d-flex align-items-center justify-content-between w-100">
                                        <span class="ct-2 d-flex align-items-center">
                                            <i class="far fa-futbol"></i> Goles
                                        </span>
                                        <span>12 </span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between">
                                        <span class="ct-2">
                                            <i class="fas fa-mitten"></i>
                                            Asistencias
                                        </span>
                                        <span>54 </span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between">
                                        <span class="ct-2">
                                            <i class="fas fa-running"></i>
                                            Apariciones
                                        </span>
                                        <span>34 </span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CALENDARIO Y RESULTADOS -->
                <PartidosResultados 
                    :proximoPartido="proximoPartido"
                    :ultimoPartido="ultimoPartido"
                    :todosPartidos="todosPartidos"
                />

                <!-- NUESTRA HISTORIA  -->
                <NuestraHistoria></NuestraHistoria>

                <!-- TABLE DE POSICIONES-->
                <TablaPosiciones></TablaPosiciones>

                <!-- Plantilla de Jugadores -->
                <PlantillaJugadores></PlantillaJugadores>

                <!-- Forma parte de un gran equipo -->
                <div class="join-us-div">
                    <div class="container">
                        <div class="d-lg-flex justify-content-between">
                            <h1 class="comon-heading m-0">
                                Forma parte de un gran equipo
                            </h1>
                            <NavLink href="/contacto" class="btn all-cm-btn mt-4 mt-lg-0">
                                <span>únete a nosotros</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                            </NavLink>
                        </div>
                    </div>
                </div>

                <!-- SECTION TIENDA -->
                <Tienda></Tienda>

                <!-- PATROCINADORES-->
                <Patrocinadores></Patrocinadores>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";

import GuestLayout from "@/Layouts/GuestLayout.vue";

import Patrocinadores from "@/Components/Home/Patrocinadores.vue";
import Tienda from "@/Components/Home/Tienda.vue";
import PartidosResultados from "@/Components/Home/PartidosResultados.vue";
import NuestraHistoria from "@/Components/Home/NuestraHistoria.vue";
import TablaPosiciones from "@/Components/Home/TablaPosiciones.vue";
import PlantillaJugadores from "@/Components/Home/PlantillaJugadores.vue";

import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    proximoPartido: Object,
    ultimoPartido: Object,
    todosPartidos: Array
});

onMounted(() => {
    //console.log("Props recibidas", props);
    //console.log("Próximo Partido:", props.proximoPartido);
    //console.log("Último Partido:", props.ultimoPartido);

});

// Función para formatear la fecha
function formatDate(fechaHora) {
    const date = new Date(fechaHora);
    const day = date.getDate();
    const month = date.toLocaleString('default', { month: 'short' }).toUpperCase(); // Mes abreviado en MAYÚSCULAS
    const year = date.getFullYear();
    return `${day} ${month} ${year}`;
}

// Función para formatear la hora
const formatTime = (fechaHora) => {
    const options = { hour: "2-digit", minute: "2-digit" };
    const hora = new Date(fechaHora);
    return hora.toLocaleTimeString("es-ES", options);
};
</script>

<style scoped>
.bg-home {
    background: url("@images/homev1.jpg") no-repeat center center;
    background-size: cover;
    height: 100vh;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: -1;
}

.content.container-home {
    height: 100%;
}

.container-bg {
    width: 100%;
    max-width: unset !important;
}

.row-info-bg {
    width: 100%;
}

.row-info-bg .col-bg-info {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    height: 100vh;
}

.container-home .container {
    max-width: 1250px;
}

.content {
    text-align: center;
}

p {
    margin: 0;
}

.owl-stage-outer,
.owl-stage {
    width: 100% !important;
}

.container-black {
    background-color: var(--black);
    color: var(--white);
}

.contain-red {
    background-color: var(--red);
}

.img-logo {
    width: 3.4rem;
}

.next-match-banner {
    position: absolute;
    right: 8%;
    transform: translateY(-50%);
    top: 50%;
    width: 24%;
}

.top-next-mc,
.top-mc-starts {
    text-decoration: none;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 8px;
    display: grid;
    align-content: center;
    padding: 19px 10px;
}

.time {
    color: var(--red);
}

.next-match {
    font-size: 19px;
    margin-top: 0 !important;
}

.mn-mc-titel {
    font-family: var(--roboto) !important;
    margin: 0 !important;
}

.top-next-mc .date,
.top-next-mc .location-mc {
    font-family: var(--roboto) !important;
}

.top-next-mc .date {
    font-weight: 700;
}

.ct-2 {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.ct-2 i {
    color: var(--red);
}

.list-assis {
    font-size: 19px;
    display: flex;
    gap: 0.5rem;
}

.btn-escobedo {
    background-color: var(--red);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    box-shadow: 0px 14px 80px rgb(252 56 56 / 40%);
    font-size: 20px;
    margin-top: 25px;
    background: #ee1d36;
    padding: 10px 35px;
}

.slider-content {
    max-width: 450px;
}

.title {
    font-size: 3rem;
    text-transform: uppercase;
    font-weight: 600;
}

.content-top .slider-content {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

/* SECCIÓN - FORMA PARTE DE UN GRAN EQUIPO */
.join-us-div {
    display: inline-block;
    width: 100%;
    padding: 30px 0;
    background: var(--red) url("@images/creat-bg.jpg") no-repeat;
    background-size: cover;
}

.join-us-div .comon-heading {
    color: var(--white);
}

.comon-heading {
    font-weight: 600;
    color: #071f40;
    font-size: 35px;
}

.join-us-div .all-cm-btn {
    background: var(--white);
    color: var(--red) !important;
    line-height: 36px;
    font-weight: 700;
    text-transform: uppercase;
    display: flex;
    align-items: center;
}

.join-us-div .all-cm-btn svg {
    transform: rotate(90deg);
    width: 30px;
    height: 30px;
}

.btn-acerca-club {
    font-size: 1.2rem;
}

.btn-acerca-club i {
    font-size: 1.2rem;
}

.match-time {
    color: var(--red);
    font-size: .9rem;
}

.container-image {
    width: 60px;
    height: 60px;
    margin-bottom: .5rem !important;
}

.next-match-widget {
    padding: 19px 10px;
    border-radius: 8px;
}

.date,
.match-time {
    color: var(--red);
    font-weight: 500;
    font-size: 0.8rem;
    font-family: var(--roboto) !important;
}

.team-name {
    font-family: var(--roboto) !important;
    font-size: .9rem;
}

.title-next-match {
    font-size: 1.5rem;
    font-family: var(--roboto) !important;

}


@media (max-width: 992px) {
    .row.row-calendairo-resultados {
        z-index: 1;
        position: relative;
    }

    .next-match-banner {
        display: none;
    }
}
</style>

<template>
    <GuestLayout>
        <div class="content container-home w-100">
            <div class="container container-bg px-0">
                <div class="row row-info-bg">
                    <div class="bg-home"></div>
                    <div class="col col-bg-info">
                        <!-- INFO DESC TOP -->
                        <div class="content-top">
                            <div
                                class="slider-content d-flex flex-column align-items-start"
                            >
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
                                <NavLink
                                    href="/contacto"
                                    class="btn text-white btn-escobedo"
                                >
                                    Acerca del Club
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-arrow-right"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                        ></path>
                                    </svg>
                                </NavLink>
                            </div>
                        </div>

                        <!-- SIGUIENTES PARTIDOS  -->
                        <div class="next-match-banner">
                            <a class="top-next-mc text-center">
                                <h5 class="mn-mc-titel">Próximo Partido</h5>
                                <hr />
                                <h4 class="next-match">
                                    2023-2024 UEFA Champions League
                                </h4>
                                <div
                                    class="d-flex align-items-center justify-content-center mt-2"
                                >
                                    <figure>
                                        <img
                                            :src="escobedo_logo"
                                            alt="Logo Image"
                                            class="img-logo"
                                        />
                                    </figure>
                                    <div class="mc-details-top text-center">
                                        <p class="time">19:20pm</p>
                                        <h5 class="date">24/ 11/ 2024</h5>
                                        <p class="location-mc">
                                            Estadio El Malecón, Cantabria
                                        </p>
                                    </div>

                                    <figure>
                                        <img
                                            :src="escobedo_logo"
                                            alt="Logo Image"
                                            class="img-logo"
                                        />
                                    </figure>
                                </div>
                            </a>

                            <a class="top-mc-starts mt-4">
                                <h5 class="mn-mc-titel text-center">
                                    Inicio de LaLiga 2024
                                </h5>
                                <hr />

                                <ul
                                    class="d-flex flex-column justify-content-center w-100 p-0 list-assis"
                                >
                                    <li
                                        class="d-flex align-items-center justify-content-between w-100"
                                    >
                                        <span
                                            class="ct-2 d-flex align-items-center"
                                        >
                                            <i class="far fa-futbol"></i> Goles
                                        </span>
                                        <span>12 </span>
                                    </li>

                                    <li
                                        class="d-flex align-items-center justify-content-between"
                                    >
                                        <span class="ct-2">
                                            <i class="fas fa-mitten"></i>
                                            Asistencias
                                        </span>
                                        <span>54 </span>
                                    </li>

                                    <li
                                        class="d-flex align-items-center justify-content-between"
                                    >
                                        <span class="ct-2">
                                            <i class="fas fa-running"></i>
                                            Apariciones
                                        </span>
                                        <span>34 </span>
                                    </li>
                                </ul>
                            </a>
                        </div>

                        <!-- BANNER PRINCIPAL (ÚLTIMAS NOVEDADES)-->
                        <div class="latest-news-div">
                            <div class="row row-one m-0">
                                <div class="col-lg-5 container-black">
                                    <h2
                                        class="py-3"
                                        style="z-index: 4; position: relative"
                                    >
                                        Últimas novedades
                                    </h2>
                                </div>
                                <div class="col-lg-7 contain-red">
                                    <div class="latest-news"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CALENDARIO Y RESULTADOS -->
                <PartidosResultados></PartidosResultados>

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
                            <a href="#" class="btn all-cm-btn mt-4 mt-lg-0">
                                únete a nosotros
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-up-short"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"
                                    ></path>
                                </svg>
                            </a>
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
import escobedo_logo from "@images/logo-escobedo.png";

import Patrocinadores from "@/Components/Home/Patrocinadores.vue";
import Tienda from "@/Components/Home/Tienda.vue";
import PartidosResultados from "@/Components/Home/PartidosResultados.vue";
import NuestraHistoria from "@/Components/Home/NuestraHistoria.vue";
import TablaPosiciones from "@/Components/Home/TablaPosiciones.vue";
import PlantillaJugadores from "@/Components/Home/PlantillaJugadores.vue";

import NavLink from "@/Components/NavLink.vue";

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

.latest-news-div {
    width: 100%;
    background: gray;
    position: absolute;
    bottom: 0;
    left: 0;
}

.latest-news-div .container {
    max-width: unset;
    padding: 0;
}

.latest-news-div .container .row-one {
    width: 100%;
    margin-left: 0;
    margin-right: 0;
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

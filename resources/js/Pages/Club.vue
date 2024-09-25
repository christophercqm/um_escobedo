<template>
    <GuestLayout>
        <div class="container container-club px-0">
            <!-- NUESTRA HISTORIA -->
            <div class="row row-info-bg full-width mx-auto">
                <div class="col col-img h-100">
                    <figure class="big-img">
                        <img
                            :src="equipo"
                            alt="Equipo Escobedo"
                            class="img-fluid"
                        />
                    </figure>
                    <figure class="small-img">
                        <img :src="equipo_2" alt="pic2" />
                    </figure>
                </div>
                <div class="col col-history">
                    <h5 class="samll-sub mb-1 mt-0 title">Nuestra Historia</h5>
                    <h2 class="comon-heading m-0">Sobre el Club Escobedo</h2>
                    <p class="mt-3">
                        Nuestra historia se remonta a 1917, cuando se fundó
                        nuestro club con el nombre de Arenas Sport, de la mano
                        de Antonio Arce Puente. A partir de 1923, nos
                        establecimos con el nombre actual de U.M. Escobedo, con
                        el testigo de Benjamín Arce Calva, aunque
                        momentáneamente fuimos Juventud Imperial en tiempos de
                        Guerra Civil con Jose Portilla García, volviendo a
                        nuestra denominación habitual con Francisco Alonso
                        Entrecanales. Eusebio Arce, recordado por poner nombre a
                        nuestro campo actual, dio el relevo a nuestro actual
                        presidente Luis Merino Arce desde 1981.
                    </p>

                    <!-- Párrafo oculto inicialmente -->
                    <p v-if="isExpanded" class="hidden-content">
                        Tras una década oscura en los años 50, en l que nos
                        alejamos del panorama deportivo, regresamos gracias al
                        apoyo de Nicanor Arce Noreña y resurgimos con más fuerza
                        en 1964/65, en una nueva localidad. A partir de aquí,
                        conseguimos numerosos éxitos: en 1966/67, ascender a
                        tercera división con Lorenzo Ruiz Arce; en 1969/70,
                        ganar la Copa Cantabria con Antonio Arce Vela; ser
                        campeones de liga en cuatro ocasiones (1991/92,1992/93,
                        2018/19, 2023/24); ser campeones de la copa Federación
                        (2017/18); participar en veintidós fases de ascenso;
                        participar en la Copa del Rey -consiguiendo vencer al
                        Málaga y enfrentándonos al Sevilla F.C. y, finalmente,
                        conseguir el ansiado ascenso a 2ª RFEF en la temporada
                        pasada de 2023/24.
                    </p>

                    <!-- Botón Seguir Leyendo -->
                    <span class="seguir-leyendo" @click="toggleContent">
                        {{ isExpanded ? "Leer menos" : "Seguir leyendo" }}
                    </span>
                </div>
            </div>

            <!-- MISIÓN, VISIÓN - VALORES  -->
            <MisionVision></MisionVision>

            <!-- JUNTA -->
            <Junta></Junta>

            <!-- BARRA PATROCINIO -->
            <BarraPatrocinio></BarraPatrocinio>

            <!-- ACTUALIDAD -->
            <Blog></Blog>

            <!-- PATROCINADORES -->
            <Patrocinadores></Patrocinadores>

            <!-- NUESTRO CUERPO TÉCNICO -->
            <CuerpoTecnico></CuerpoTecnico>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import equipo from "@images/equipo/equipo-escobedo.jpg";
import equipo_2 from "@images/equipo/equipo-escobedo-2.jpg";

import MisionVision from "@/Components/Club/MisionVision.vue";
import Junta from "@/Components/Club/Junta.vue";
import Blog from "@/Components/Club/Blog.vue";
import Patrocinadores from "@/Components/Home/Patrocinadores.vue";
import BarraPatrocinio from "@/Components/BarraPatrocinio/Patrocinio.vue";
import CuerpoTecnico from "@/Components/Club/CuerpoTecnico.vue";

import { ref } from "vue";

// Estado para controlar si el contenido está expandido o no
const isExpanded = ref(false);

// Función para alternar la visibilidad del contenido
const toggleContent = () => {
    isExpanded.value = !isExpanded.value;
};
</script>

<style scoped>
.container.container-club {
}

.big-img {
    position: relative;
    width: 100%;
    height: 320px;
    border-radius: var(--border);
    display: inline-block;
    overflow: hidden;
    margin: 0;
}

.big-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* Capa negra para la opacidad */
.big-img::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0); /* Transparente por defecto */
    transition: background-color 0.3s ease;
    z-index: 1;
}

/* Efecto hover para aplicar la capa negra */
.big-img:hover::before {
    background-color: rgba(0, 0, 0, 0.5); /* Opacidad negra */
}

.big-img:hover img {
    transform: scale(1.05);
}

.col-img {
    position: relative;
}

.title {
    color: var(--red);
}

.small-img {
    width: 240px;
    height: 140px;
    max-height: 140px;
    border-radius: var(--border);
    position: absolute;
    bottom: 0;
    z-index: 1;
    margin: 0;
    overflow: hidden;
    left: 2rem;
    bottom: -38%;
    transform: translateY(-50%);
}

.full-width {
    max-width: 1250px;
}

.row-info-bg {
    padding-top: 120px;
    padding-bottom: 120px;
}

.patrocinadores .col-patro {
    padding: 50px 0;
    margin-top: 0 !important;
}

.patrocinadores .col-patro h2.patrocinadores-title {
    margin-top: 0 !important;
}

.seguir-leyendo {
    color: var(--red);
}

.col-history {
    position: relative;
}

.hidden-content {
    display: block;
    transition: max-height 0.3s ease-out;
}

/* Cuando está expandido, mostrar contenido */
.is-expanded .hidden-content {
    display: block;
    max-height: 1000px; /* Altura suficiente para mostrar todo */
}

.seguir-leyendo {
    cursor: pointer;
    color: var(--red);
    text-decoration: underline;
    margin-top: 10px;
    display: inline-block;
    transition: color 0.3s ease;
}

.seguir-leyendo:hover {
    color: var(--red-hover);
}

@media (max-width: 768px) {
    .container-club .row-info-bg {
        display: flex;
        flex-direction: column;
    }

    .col-history {
        padding-top: 100px;
    }
}
</style>

<template>
    <GuestLayout>
        <div class="container container-club px-0">
            <!-- NUESTRA HISTORIA -->
            <div class="row row-info-bg full-width mx-auto">
                <div class="col col-img">
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
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
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
</style>

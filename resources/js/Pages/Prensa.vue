<template>
    <GuestLayout>
        <div class="content container-prensa w-100">
            <div class="container px-0">
                <!-- Primera fila con título -->
                <div class="row row-1">
                    <div class="col col-bg-info">
                        <h1>Últimas noticias</h1>
                    </div>
                </div>

                <!-- Segunda fila con botones -->
                <div class="row row-2 my-4">
                    <div class="col d-flex justify-content-start gap-3">
                        <!-- Botón Todos -->
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'todos',
                            }"
                            @click="showSection('todos')"
                        >
                            Todos
                        </button>
                        <!-- Botón de Actualidad -->
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'actualidad',
                            }"
                            @click="showSection('actualidad')"
                        >
                            Actualidad
                        </button>
                        <!-- Botón de Crónicas -->
                        <button
                            class="btn"
                            :class="{
                                'btn-active': currentSection === 'cronicas',
                            }"
                            @click="showSection('cronicas')"
                        >
                            Crónicas
                        </button>
                    </div>
                </div>

                <!-- Tercera fila con las cards -->
                <div class="row row-3">
                    <div class="col-9">
                        <!-- Mostrar todas las cards -->
                        <div
                            v-if="currentSection === 'todos'"
                            class="my-4 d-flex gap-4"
                        >
                            <!-- Card de Actualidad -->
                            <div class="card shadow-sm mb-4">
                                <img
                                    :src="notice1"
                                    alt="Noticia 1"
                                    class="card-img-top"
                                />
                                <div class="card-body">
                                    <h3 class="card-title">
                                        Título Actualidad
                                    </h3>
                                    <div class="card-meta mb-2">
                                        <span class="text-muted me-3">
                                            <i class="fa fa-calendar me-1"></i>
                                            21 Octubre 2024
                                        </span>
                                    </div>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipisici elit, sed eiusmod tempor
                                        incidunt ut labore et dolore magna
                                        aliqua...
                                    </p>
                                </div>
                                <div class="text-center contain-btn">
                                    <a
                                        href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/sem-porta-mollis-parturient/"
                                        class="btn btn-escobedo w-100"
                                        >Saber más</a
                                    >
                                </div>
                            </div>

                            <!-- Card de Crónicas -->
                            <div class="card shadow-sm mb-4">
                                <img
                                    :src="notice1"
                                    alt="Crónica 1"
                                    class="card-img-top"
                                />
                                <div class="card-body">
                                    <h3 class="card-title">
                                        Título de Crónica 1
                                    </h3>
                                    <div class="card-meta mb-2">
                                        <span class="text-muted me-3">
                                            <i class="fa fa-calendar me-1"></i>
                                            22 Octubre 2024
                                        </span>
                                    </div>
                                    <p class="card-text">
                                        Resumen breve de la crónica más reciente
                                        1...
                                    </p>
                                </div>
                                <div class="text-center contain-btn">
                                    <a
                                        href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/titulo-cronica-1"
                                        class="btn btn-escobedo w-100"
                                        >Saber más</a
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Mostrar Card de Actualidad -->
                        <div
                            v-if="currentSection === 'actualidad'"
                            class="card shadow-sm my-4"
                        >
                            <img
                                :src="notice1"
                                alt="Noticia 1"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h3 class="card-title">
                                    Título Actualidad
                                </h3>
                                <div class="card-meta mb-2">
                                    <span class="text-muted me-3">
                                        <i class="fa fa-calendar me-1"></i> 21
                                        Octubre 2024
                                    </span>
                                </div>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisici elit, sed eiusmod tempor incidunt
                                    ut labore et dolore magna aliqua...
                                </p>
                            </div>
                            <div class="text-center contain-btn">
                                <a
                                    href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/sem-porta-mollis-parturient/"
                                    class="btn btn-escobedo w-100"
                                    >Saber más</a
                                >
                            </div>
                        </div>

                        <!-- Mostrar Card de Crónicas -->
                        <div
                            v-if="currentSection === 'cronicas'"
                            class="card shadow-sm my-4"
                        >
                            <img
                                :src="notice1"
                                alt="Crónica 1"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h3 class="card-title">Título de Crónica 1</h3>
                                <div class="card-meta mb-2">
                                    <span class="text-muted me-3">
                                        <i class="fa fa-calendar me-1"></i> 22
                                        Octubre 2024
                                    </span>
                                </div>
                                <p class="card-text">
                                    Resumen breve de la crónica más reciente
                                    1...
                                </p>
                            </div>
                            <div class="text-center contain-btn">
                                <a
                                    href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/titulo-cronica-1"
                                    class="btn btn-escobedo w-100"
                                    >Saber más</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-3 col-sidebar p-0">
                        <!-- Menú Lateral -->
                        <div class="sidebar">
                            <h5 class="sidebar-title">U.M. ESCOBEDO</h5>
                            <hr class="separator" />
                            <p class="sidebar-info-escobedo">
                                Página oficial de la Unión Montañesa Escobedo,
                                club fundado en 1917 y que actualmente milita en
                                Segunda RFEF.
                            </p>

                            <br />
                            <h5 class="sidebar-title">Enlaces de interés</h5>
                            <hr class="separator" />
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#inicio" class="sidebar-link"
                                        >Inicio</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#noticias" class="sidebar-link"
                                        >Noticias</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#cronicas" class="sidebar-link"
                                        >Crónicas</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="#contacto" class="sidebar-link"
                                        >Contacto</a
                                    >
                                </li>
                            </ul>

                            <br />
                            <h5 class="sidebar-title">Últimos noticias</h5>
                            <hr class="separator" />

                            <div class="last-news">
                                <div class="list-group">
                                    <!-- Noticia 1 -->
                                    <a
                                        href="#"
                                        class="list-group-item list-group-item-action"
                                    >
                                        <div class="d-flex">
                                            <img
                                                src="https://picsum.photos/50/50"
                                                alt="Noticia 1"
                                                class="me-3"
                                            />
                                            <div>
                                                <h6 class="mb-1 title">
                                                    Noticia 1
                                                </h6>
                                                <small>
                                                    <i
                                                        class="fa fa-calendar me-1"
                                                    ></i>
                                                    24 Octubre 2024
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Noticia 2 -->
                                    <a
                                        href="#"
                                        class="list-group-item list-group-item-action"
                                    >
                                        <div class="d-flex">
                                            <img
                                                src="https://picsum.photos/50/50"
                                                alt="Noticia 2"
                                                class="me-3"
                                            />
                                            <div>
                                                <h6 class="mb-1 title">
                                                    Noticia 2
                                                </h6>
                                                <small>
                                                    <i
                                                        class="fa fa-calendar me-1"
                                                    ></i>
                                                    25 Octubre 2024
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Noticia 3 -->
                                    <a
                                        href="#"
                                        class="list-group-item list-group-item-action"
                                    >
                                        <div class="d-flex">
                                            <img
                                                src="https://picsum.photos/50/50"
                                                alt="Noticia 3"
                                                class="me-3"
                                            />
                                            <div>
                                                <h6 class="mb-1 title">
                                                    Noticia 3
                                                </h6>
                                                <small>
                                                    <i
                                                        class="fa fa-calendar me-1"
                                                    ></i>
                                                    26 Octubre 2024
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <br>
                            <div
                                class="sidebar-service card shadow-sm mb-4 position-relative"
                            >
                                <img 
                                    :src=sidebar_bg
                                    class="card-img-top"
                                    alt="Servicios de Fontanería"
                                    style="
                                        opacity: 0.5;
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                    "
                                />
                                <div class="overlay"></div>
                                <!-- Dark overlay -->
                                <div
                                    class="card-body text-center position-relative"
                                >
                                    <h5 class="card-title text-left text-white">
                                        Servicios de Fontanería
                                    </h5>
                                    <p class="card-text text-left text-white">
                                        Expertos en el sector con más de 30 años
                                        de experiencia. Contamos con sello de
                                        garantía.
                                    </p>
                                    <a href="#" class="btn btn-escobedo"
                                        >Contáctanos</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

import notice1 from "@images/noticias/notice1.jpg";
import sidebar_bg from "@images/sidebar-bg.jpeg";
// Estado reactivo para controlar la sección visible
const currentSection = ref("todos"); // Inicialmente se muestran todas las noticias

// Función para cambiar la sección activa
const showSection = (section) => {
    currentSection.value = section;
};



</script>

<style scoped>
.container-prensa .container {
    max-width: 1250px;
    padding: 50px 0;
}

.btn {
    padding: 10px 20px;
    font-weight: bold;
    transition: background-color 0.5s ease, color 0.5s ease;
}

/* Color del botón activo */
.btn-active {
    background-color: var(--red);
    color: var(--white);
}

/* Estilo de los botones inactivos */
.btn:not(.btn-active) {
    background-color: transparent;
    color: var(--red);
    background-color: white;
    border-color: red;
}

/* Hover para botones inactivos */
.btn:not(.btn-active):hover {
    background-color: var(--red);
    color: var(--white);
}

.card {
    transition: transform 0.5s ease-in-out;
    flex: 1;
}

/* Efecto hover en las cards */
.row-3 .card:hover {
    transform: scale(1.05);
}

/* Estilo del menú lateral */
.sidebar {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 0.5rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sidebar-title {
    font-weight: bold;
    margin-bottom: 15px;
}

/* Estilo de los enlaces del menú */
.sidebar-link {
    text-decoration: none;
    color: #333 !important;
    display: block;
    padding: 10px;
    border-radius: var(--border);
}

/* Hover para enlaces del menú */
.sidebar-link:hover {
    color: var(--red) !important;
}

.separator {
    color: var(--red);
}

.sidebar .title {
    color: var(--black);
}

.sidebar img {
    width: 97px;
    max-width: 97px;
    height: 67px;
    border: 8px;
    object-fit: cover;
}

.last-news .list-group-item {
    border: unset;
    padding: 0;
}

.last-news .list-group {
    display: flex;
    gap: 1.2rem;
}

.list-group img {
    border-radius: var(--border);
}

.sidebar-info-escobedo {
    font-size: 14px;
}

.sidebar-service {
    position: relative;
    max-height: 400px;
    height: 400px;
    background-color: var(--black);
}

.sidebar-service .card-img-top {
    max-width: unset;
}


.sidebar-service .card-body {
    position: absolute !important;
    z-index: 2;
    bottom: 0;
}

.sidebar-service .card-body {
    display: flex;
    flex-direction: column;
    align-items: start;
}

.sidebar-service .card-text{
    font-size: 13px;
}

.card-meta .card-meta span{
    font-size: 14px;
}




</style>

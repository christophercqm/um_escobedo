<template>
    <nav class="navbar">
        <div
            :class="[
                'container d-flex content-nav flex-column',
                { sticky: isSticky },
            ]"
        >
            <div
                class="menu-top d-flex justify-content-between align-items-center w-100"
            >
                <!-- Patrocinadores (desaparecen cuando es sticky) -->
                <div class="top-navigation-left">
                    <div class="top-navigation-left-text d-flex gap-5 align-items-center">
                        <!-- LOGO FÚTBOL EMOTION-->
                        <div class="container-sponsor">
                            <div class="contain-logo">
                                <img :src=logo_emotion alt="Logo Fútbol Emotion">
                            </div>
                        </div>
                        <!-- SOKA-->
                        <div class="container-sponsor">
                            <div class="contain-logo">
                                <img :src=logo_soka alt="Logo Soka">
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- LOGO -->
                <div class="logo">
                    <NavLink href="/" class="link-logo">
                        <img :src="logo" alt="Logo Image" class="img-logo" />
                    </NavLink>
                </div>

                <!-- Redes sociales (se colocan a la derecha cuando es sticky) -->
                <div class="top-navigation-right">
                    <div class="top-social-wrapper d-flex">
                        <div class="social-icon">
                            <a
                                href="https://www.instagram.com/um_escobedooficial/"
                                target="_blank"
                            >
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a
                                href="https://x.com/UMEscobedo?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                                target="_blank"
                            >
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Icono de hamburguesa para menú móvil -->
                <div class="hamburger-menu" @click="toggleMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <!-- Menú de navegación lateral -->
            <div class="site-menu" :class="{ 'open-menu': isMenuOpen }">
                <!-- Icono de cerrar -->
                <div class="close-menu" @click="toggleMenu">
                    <i class="fa-solid fa-xmark"></i>
                </div>

                <div class="logo-mobil">
                    <div class="logo">
                        <img :src="logo" alt="Escobedo Logo" />
                    </div>
                </div>
                <ul class="menueffect">
                    <li>
                        <NavLink href="/club" class="nav_link">El Club</NavLink>
                    </li>
                    <li>
                        <NavLink href="/primer-equipo" class="nav_link"
                            >Primer Equipo</NavLink
                        >
                    </li>
                    <li>
                        <NavLink href="/escuela" class="nav_link"
                            >Escuela</NavLink
                        >
                    </li>
                    <li>
                        <NavLink href="/prensa" class="nav_link"
                            >Prensa</NavLink
                        >
                    </li>
                    <li>
                        <NavLink href="/contacto" class="nav_link"
                            >Contacto</NavLink
                        >
                    </li>
                </ul>

                <!-- REDES MOBILE -->
                <div class="redes">
                    <div class="social-icon">
                        <a
                            href="https://www.instagram.com/um_escobedooficial/"
                            target="_blank"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a
                            href="https://x.com/UMEscobedo?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                            target="_blank"
                        >
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Fondo oscuro cuando el menú lateral está abierto -->
            <div class="overlay" v-if="isMenuOpen" @click="toggleMenu"></div>
        </div>
    </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import NavLink from "@/Components/NavLink.vue";
import logo from "@images/logo-escobedo.png";
import logo_soka from "@images/logo-soka.png";
import logo_emotion from "@images/logo-futbol-emotion.png";



const isSticky = ref(false);
const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

onMounted(() => {
    const handleScroll = () => {
        const menu = document.querySelector(".site-menu");
        const stickyOffset = menu.offsetTop;

        // Añadir o quitar la clase 'sticky' basado en la posición del scroll
        if (window.scrollY > stickyOffset) {
            isSticky.value = true;
        } else {
            isSticky.value = false;
        }
    };

    // Registrar el evento de scroll
    window.addEventListener("scroll", handleScroll);

    // Limpiar el evento de scroll al desmontar el componente
    onUnmounted(() => {
        window.removeEventListener("scroll", handleScroll);
    });
});
</script>

<style scoped>
/* General styles */
.navbar {
    z-index: 9;
    background: rgba(0, 0, 0, 0.771);
}

/* Estilos para el logo */
.logo .img-logo {
    width: 4.5rem;
    padding-top: 0.2rem;
}

/* Social media */
.top-social-wrapper {
    display: flex;
    gap: 0.5rem;
}

.navbar .container {
    max-width: 1250px;
}

.social-icon a {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.social-icon a i {
    font-size: 1.3rem;
    transition: 0.5s;
}

.social-icon a i:hover {
    color: var(--red);
}

/* Estilos para el menú en pantallas grandes */
.site-menu {
    display: block; /* Mostrar el menú lateral siempre en pantallas grandes */
}

.site-menu ul {
    list-style: none;
    padding: 0;
}

.site-menu .menueffect {
    display: flex;
}

.site-menu .menueffect li a {
    text-transform: uppercase;
    font-family: var(--roboto);
    font-weight: 500;
    color: #fff;
    text-decoration: none;
}

.logo-mobil {
    display: none;
}

.hamburger-menu {
    display: none; /* Ocultar el icono de hamburguesa en pantallas grandes */
}

.hamburger-menu span {
    display: block;
    width: 25px;
    height: 3px;
    margin: 5px;
    background-color: white;
}

.redes {
   display: none; 
}

/* Estilos para el menú lateral en pantallas pequeñas (móviles y tabletas) */
@media (max-width: 992px) {
    .hamburger-menu {
        display: block;
    }

    .site-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 280px !important;
        height: 100%;
        background-color: rgba(0, 0, 0, 1);
        z-index: 6;
        opacity: 0; /* Inicialmente oculto */
        transition: transform 0.3s ease, opacity 0.5s ease; /* Transiciones para suavizar la apertura/cierre */
    }

    .menueffect {
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 3rem 1rem;
    }

    .close-menu{
        display: block !important;
        cursor: pointer;
    }

    .site-menu.open-menu {
        right: 0;
        opacity: 1;
        padding: 3rem 1rem;
    }

    .site-menu.open-menu .redes{
        display: flex;
        margin: 3rem 0;
    }

    .redes .social-icon a{
        justify-content: start;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 5;
        opacity: 0; /* Inicialmente oculto */
        transition: opacity 0.5s ease; /* Transición para suavizar la aparición del overlay */
    }

    .overlay.active {
        opacity: 1;
    }

    .menu-top .top-navigation-left,
    .menu-top .top-navigation-right {
        display: none; /* Ocultar las secciones en pantallas pequeñas */
    }

    .close-menu {
        display: block; /* Mostrar el icono de cerrar en pantallas pequeñas */
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
    }
}

.menueffect {
    display: flex;
    gap: 1.2rem;
}
.menueffect .nav_link {
    font-size: 1rem;
}

/* Sticky */

.container.sticky {
    max-width: unset;
    min-height: 5rem;
    justify-content: center;
}

.container.sticky .logo {
    padding: 0;
    position: initial;
}

.container.sticky .link-logo {
    position: absolute;
}

.container.sticky .menueffect {
    margin-bottom: 0;
}
.container.sticky .close-menu {
    display: none;
}
.container.sticky .top-navigation-left {
    display: none;
}

.container.sticky .top-social-wrapper {
    top: 50%;
    transform: translateY(-50%);
}

.sticky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    background-color: rgba(0, 0, 0, 1);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sticky .site-menu {
    justify-content: center;
}

.sticky .logo {
    position: absolute;
}

.sticky .top-social-wrapper {
    position: absolute;
    right: 20px;
}

.site-menu.open-menu .logo-mobil {
    display: flex;
    justify-content: center;
    margin: 2rem 0;
}

.site-menu.open-menu .logo-mobil .logo {
    max-width: 100px;
}


.container-sponsor {
    width: 150px;
}

.container-sponsor .contain-logo img{
    width: 100%;
    height: 100%; 
}

.close-menu {
    display: none;
}

.social-icon a {
    justify-content: flex-end;
}

</style>

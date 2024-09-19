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
                    <div class="top-navigation-left-text d-flex gap-5">
                        <span class="text-white">SPONSOR 1</span>
                        <span class="text-white">SPONSOR 2</span>
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
            </div>

            <!-- Menú de navegación -->
            <div class="site-menu">
                <ul class="menueffect d-flex">
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
            </div>

            <div class="hamburger-menu">
                <span></span> <span></span> <span></span>
            </div>
        </div>
    </nav>
</template>

<style scope>
.navbar {
    z-index: 1;
    background: rgba(0, 0, 0, 0.771);
}

.logo {
    padding: 1rem 0;
}

.logo .img-logo {
    width: 5rem;
}

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

.site-menu .menueffect {
    gap: 2rem;
}

.site-menu .menueffect li a {
    text-transform: uppercase;
    font-family: var(--roboto);
    font-weight: 500;
}

.menueffect a:before {
    bottom: 0;
    display: block;
    height: 3px;
    width: 0%;
    content: "";
    background-color: #fff;
}

.menueffect a:after {
    left: 0;
    top: 0;
    padding: 0.5em 0;
    position: absolute;
    content: attr(data-hover);
    color: #ffffff;
    white-space: nowrap;
    max-width: 0%;
    overflow: hidden;
}

.navbar .site-menu ul li a:hover {
    text-decoration: none;
    color: #fff;
}

.nav_link {
    font-size: 1rem;
}

/* MENU FIJO */
/* Estilos para el estado normal */
.navbar .top-navigation-left {
    display: flex;
}

/* Cuando está en modo sticky */
.sticky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    background-color: rgba(0, 0, 0, 0.9);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 2rem;
    transition: all 0.3s ease-in-out;
}

/* Estilos para el estado normal */
.logo .link-logo {
    position: relative;
}

/* Cuando el menú está en modo sticky, la clase .link-logo tendrá position: absolute */
.sticky .link-logo {
    position: absolute;
}

.sticky .top-social-wrapper {
    position: absolute;
    right: 20px;
}

/* Ajuste de la barra sticky */
.sticky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    background-color: rgba(0, 0, 0, 0.9);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 2rem;
    transition: all 0.3s ease-in-out;
}

/* Ocultar patrocinadores en estado sticky */
.sticky .top-navigation-left {
    display: none;
}

/* Mantener centrado el menú */
.sticky .site-menu {
    flex-grow: 1;
    justify-content: center;
}

.navbar .container.sticky {
    max-width: unset;
}   

.navbar .container.sticky .top-social-wrapper{
    padding-top: .5rem;
}
</style>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";

import NavLink from "@/Components/NavLink.vue";
import logo from "@images/logo-escobedo.png";

const isSticky = ref(false);

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
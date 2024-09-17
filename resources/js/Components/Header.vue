<template>
    <nav class="navbar">
        <div class="container d-flex flex-column">
            <div
                class="menu-top d-flex justify-content-between align-items-center w-100"
            >
                <div class="top-navigation-left">
                    <div class="top-navigation-left-text">
                        <span class="text-white">SPONSOR 1</span>
                        <span class="text-white">SPONSOR 2</span>
                    </div>
                </div>
                <!-- LOGO -->
                <div class="logo">
                    <NavLink href="/">
                        <img :src="logo" alt="Logo Image" />
                    </NavLink>
                </div>

                <div class="top-navigation-right">
                    <div class="top-social-wrapper d-flex">
                        <div class="social-icon">
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a href="#">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-menu">
                <ul class="menueffect d-flex">
                    <li>
                        <NavLink href="/club">El Club</NavLink>
                    </li>
                    <li>
                        <NavLink href="/primer-equipo">Primer Equipo</NavLink>
                    </li>
                    <li>
                        <NavLink href="/escuela">Escuela</NavLink>
                    </li>
                    <li>
                        <NavLink href="/prensa">Prensa</NavLink>
                    </li>
                    <li>
                        <NavLink href="/contacto">Contacto</NavLink>
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
    background: rgba(0, 0, 0, 0.671);
}

.logo {
    padding: 1rem 0;
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
</style>

<script setup>
import NavLink from "@/Components/NavLink.vue"; // Asegúrate de importar el componente NavLink

import logo from "@images/logo.png"; // Usa el alias configurado
</script>

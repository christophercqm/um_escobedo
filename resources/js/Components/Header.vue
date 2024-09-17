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
                    <a href="index.html">
                        <img :src="logo" alt="Logo Image" />
                    </a>
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
                    <li style="opacity: 1">
                        <a href="index.html">el club</a>
                    </li>
                    <li style="opacity: 1">
                        <a href="league-table.html">primer equipo</a>
                    </li>
                    <li style="opacity: 1">
                        <a href="players.html">escuela</a>
                    </li>
                    <li style="opacity: 1">
                        <a href="gallery.html">prensa</a>
                    </li>
                    <li style="opacity: 1">
                        <a href="blog.html">contacto</a>
                    </li>
                    <li style="opacity: 1">
                        <a href="contact-us.html">Contact</a>
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
    gap: .5rem;
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
    font-size: 1.5rem;
    transition: .5s;
}

.social-icon a i:hover {
    color: var(--red);
}

.site-menu .menueffect{
    gap: 2rem;
}

.site-menu .menueffect li a{
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
import logo from "@images/logo.png"; // Usa el alias configurado
</script>

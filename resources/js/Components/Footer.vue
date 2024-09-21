<template>
    <footer class="py-5 float-start w-100">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3">
                <!-- CONTACTO  -->
                <div class="col">
                    <div class="comon-footer">
                        <h5>Contacto</h5>
                        <p class="col-lg-10">
                            Apasionados por el fútbol desde 1917, preparados
                            para la victoria desde siempre.
                        </p>
                        <ul
                            class="list-unstyled d-flex align-items-center mt-2"
                        >
                            <li>
                                <a href="#" class="social-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-twitter-x"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"
                                        ></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- ENLACES -->
                <div class="col">
                    <div class="comon-footer">
                        <h5>U.M Escobedo</h5>
                        <ul class="list-unstyled">
                            <li>
                                <NavLink href="/club" class="nav_link"
                                    >El Club</NavLink
                                >
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
                </div>

                <!-- LOGO -->
                <div class="col">
                    <div class="comon-footer d-flex justify-center">
                        <div class="logo-container">
                            <img :src="logo" alt="Logo Escobedo" />
                        </div>
                    </div>
                </div>

                <hr class="separator w-100" />

                <div class="by d-flex justify-center w-100">
                    <span
                       class="copyright"
                    >Desarrollado por <strong>Black Cat</strong> by
                        <em>EL Ayudante</em></span
                    >
                </div>
            </div>
            <p class="text-center copy-t">© 2024 U.M. Escobedo</p>
        </div>
    </footer>
</template>

<style scoped>
footer .container {
    max-width: 1250px;
}

footer {
    background-color: var(--black);
}

.comon-footer h5 {
    color: var(--white);
    font-size: 26px;
    font-weight: 500;
    margin-bottom: 20px;
}

.comon-footer p,
.comon-footer li a,
.copy-t {
    color: #8d95a1;
    text-decoration: none;
    font-size: 16px;
}

.comon-footer li {
    margin-bottom: 10px;
}

footer .social-icon {
    display: block;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: start;
}

footer .social-icon svg,
footer .social-icon i.fa-instagram {
    transition: 0.5s;
}

footer .social-icon svg:hover {
    fill: var(--red);
}

footer .social-icon i.fa-instagram:hover {
    color: var(--red);
}

.logo-container {
    width: 80px;
}

.separator {
    opacity: 1;
    color: rgba(255, 255, 255, 0.4);
}

.copyright,
.copy-t{
    font-size: .9rem;
}

.by span {
    color: var(--grayv2);
}
</style>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import logo from "@images/logo-escobedo.png";
</script>

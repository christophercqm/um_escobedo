<template>
    <!-- PATROCINIOS -->
    <div class="patrocinadores contain-patrocinadores">
        <div class="container">
            <div class="row">
                <div class="col col-patro mt-0">
                    <h2
                        class="patrocinadores patrocinadores-title m-0 text-center"
                    >
                        Patrocinadores
                    </h2>

                    <div class="contain-patrocinadores">
                        <div class="logo">
                            <ul class="sponsor p-0 d-flex">
                                <li class="logo">
                                    <img
                                        :src="logo1"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo2"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo3"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo4"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo5"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo6"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo7"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                                <li class="logo">
                                    <img
                                        :src="logo8"
                                        alt="Logo Camargo"
                                        class="img-logo"
                                    />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import logo1 from "@images/patrocinadores/logo-camargo.webp";
import logo2 from "@images/patrocinadores/logo-cantur.webp";
import logo3 from "@images/patrocinadores/logo-elayudante.webp";
import logo4 from "@images/patrocinadores/logo-futbol-emotion.webp";
import logo5 from "@images/patrocinadores/logo-futbox.webp";
import logo6 from "@images/patrocinadores/logo-giraldo.webp";
import logo7 from "@images/patrocinadores/logo-piedras-cosas.webp";
import logo8 from "@images/patrocinadores/logo-soka.webp";
</script>

<style scoped>
.contain-patrocinadores {
    padding: 60px 0;

}

.patrocinadores .container {
    max-width: 1250px;
}

.contain-patrocinadores .logo {
    max-width: 70%;
    margin: 0 auto;
}

.contain-patrocinadores .logo ul.sponsor {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem 5rem;
}

.contain-patrocinadores .logo ul.sponsor li.logo {
    display: flex;
    justify-content: center;
    align-items: center;
}


.sponsor .logo {
    width: 20%;
    max-width: 8rem;
}

.patrocinadores {
    background-color: #EFEFF0;
}

.contain-patrocinadores .img-logo {
    width: 100%;
    height: auto;
    vertical-align: top;
    object-fit: contain;
}


.patrocinadores-title {
    font-family: var(--barlow);
    font-size: 35px;
}

@media (max-width: 992px) {
    .contain-patrocinadores .logo {
        max-width: 100%;
    }
    .contain-patrocinadores .logo ul.sponsor li.logo {
        width: 30%;
    }
}


</style>

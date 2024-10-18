<template>
    <div class="row row-calendairo-resultados">
        <div class="col">
            <div class="container">
                <div class="row gx-lg-5">
                    <div class="col-lg-7 col-xl-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="comon-heading m-0">
                                Partidos y Resultados
                            </h2>
                            <NavLink href="/proximos-partidos" class="btn all-cm-btn">
                                Todos los Partidos

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                    </path>
                                </svg>
                            </Navlink>
                        </div>
                        <div class="row row-cols-1 row-cols-lg-2 gy-5 g-lg-4 mt-0 mt-lg-0">
                            <div class="col">
                                <a href="#" class="items-matchs">
                                    <figure class="m-0 bg-mc-1">
                                        <img :src="bg_1" alt="bg-ms" />
                                        <div class="overlay"></div>
                                    </figure>
                                    <div class="matches-div-home">
                                        <h5>
                                            Central Olympic Stadium
                                            <span class="d-block">
                                                April 02, 2019
                                            </span>
                                        </h5>
                                        <div
                                            class="d-flex align-items-center justify-content-between contain-logo-result">
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />
                                                <figcaption>
                                                    Istanbul
                                                </figcaption>
                                            </figure>
                                            <h4>VS</h4>
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" class="logo_results" />
                                                <figcaption>
                                                    Italy FC.
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="items-matchs">
                                    <figure class="m-0 bg-mc-1">
                                        <img :src="bg_2" alt="bg-ms" />
                                        <div class="overlay"></div>
                                    </figure>
                                    <div class="matches-div-home">
                                        <h5>
                                            Central Olympic Stadium
                                            <span class="d-block">
                                                April 02, 2019
                                            </span>
                                        </h5>
                                        <div
                                            class="d-flex align-items-center justify-content-between contain-logo-result">
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />
                                                <figcaption>
                                                    Rayal FC
                                                </figcaption>
                                            </figure>
                                            <h4>VS</h4>
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />
                                                <figcaption>
                                                    Italy FC.
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="items-matchs">
                                    <figure class="m-0 bg-mc-1">
                                        <img :src="bg_3" alt="bg-ms" />
                                        <div class="overlay"></div>
                                    </figure>
                                    <div class="matches-div-home">
                                        <h5>
                                            Central Olympic Stadium
                                            <span class="d-block">
                                                April 02, 2019
                                            </span>
                                        </h5>
                                        <div
                                            class="d-flex align-items-center justify-content-between contain-logo-result">
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />
                                                <figcaption>
                                                    DC Unfo.
                                                </figcaption>
                                            </figure>
                                            <h4>VS</h4>
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />
                                                <figcaption>
                                                    Italy FC.
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="items-matchs">
                                    <figure class="m-0 bg-mc-1">
                                        <img :src="bg_4" alt="bg-ms" />
                                        <div class="overlay"></div>
                                    </figure>
                                    <div class="matches-div-home">
                                        <h5>
                                            Central Olympic Stadium
                                            <span class="d-block">
                                                April 02, 2019
                                            </span>
                                        </h5>
                                        <div
                                            class="d-flex align-items-center justify-content-between contain-logo-result">
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />

                                                <figcaption>
                                                    Istanbul
                                                </figcaption>
                                            </figure>
                                            <h4>VS</h4>
                                            <figure>
                                                <img :src="escobedo_logo" alt="cl2" />

                                                <figcaption>
                                                    Italy FC.
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <Sidebar 
                        :proximoPartido="proximoPartido"
                        :ultimoPartido="ultimoPartido" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import bg_1 from "@images/bg-1.jpg";
import bg_2 from "@images/bg-2.jpeg";
import bg_3 from "@images/bg-3.jpeg";
import bg_4 from "@images/bg-4.jpg";
import escobedo_logo from "@images/logo-escobedo.png";
import NavLink from "../NavLink.vue";
import Sidebar from "../Sidebar/Sidebar.vue";


const props = defineProps({
        proximoPartido: Object,
        ultimoPartido: Object,

})
</script>

<style scoped>
/* RESULTADOS  */
.items-matchs {
    display: grid;
    align-content: center;
    height: 270px;
    width: 100%;
    text-align: center;
    position: relative;
    background: #071f40;
    border-radius: var(--border);
    overflow: hidden;
    padding: 30px 20px;
    text-decoration: none;
}

.overlay {
    position: absolute;
    background-color: rgba(0, 31, 64, 0.5);
    width: 100%;
    height: 100%;
    z-index: 8;
    top: 0;
}

.items-matchs .bg-mc-1 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    right: 0;
}

.matches-div-home {
    position: relative;
    z-index: 8;
}

.items-matchs h5,
.items-matchs h4 {
    color: #fff;
    font-size: 25px;
    font-weight: 400;
    text-shadow: #181818 1px 2px 4px;
}

.items-matchs h5 span {
    font-weight: 400;
    font-size: 20px;
    margin-top: 8px;
}

.matches-div-home figure {
    width: 24%;
    margin: auto;
    display: inline-block;
}

.items-matchs figcaption {
    color: #fff;
    font-size: 19px;
    text-shadow: #181818 1px 2px 4px;
    font-family: "Roboto", sans-serif;
}

.matches-div-home figure {
    width: 24%;
    margin: auto;
    display: inline-block;
}

/* ÚLTIMOS RESULTADOS */
.ltest-divbm {
    text-decoration: none;
    font-family: var(--roboto);
    box-shadow: #e5e2e2 1px 4px 14px;
    display: inline-block;
    width: 100%;
    padding: 20px 0;
    border-radius: var(--border);
    background: #fff;
}

.comon-items-div {
    font-family: var(--roboto);
    display: inline-block;
    width: 100%;
    padding: 15px 20px 15px 20px;
    background: #fff;
    border-bottom: solid 1px #f1f1f1;
    text-decoration: none;
}

.cm-culb figcaption {
    font-size: 17px;
    font-weight: 600;
}

.comon-items-div h5 {
    font-family: var(--roboto);
    font-weight: 700;
    font-size: 28px;
    color: var(--red);
}

.cm-culb figcaption {
    font-size: 17px;
    font-weight: 600;
}

.me-2 {
    color: var(--black);
}

.ltest-divbm p {
    font-family: "Roboto", sans-serif;
    font-size: 15px;
    color: #999;
    margin-top: 15px;
}

.logo-latest-results {
    width: 31px;
    height: 40px;
}

.cm-culb figure {
    margin: 0;
}

.row-calendairo-resultados {
    margin: 4rem 0;
}

.btn.all-cm-btn {
    display: flex;
    background: var(--red);
    align-items: center;
    gap: 1rem;
}

.container-home .container {
    max-width: 1250px;
}

@media (max-width: 992px) {
    .matches-div-home .contain-logo-result {
        justify-content: center !important;
        gap: 2rem;
    }

    .matches-div-home .contain-logo-result figure {
        width: 80px;
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: center !important;
    }
}
</style>

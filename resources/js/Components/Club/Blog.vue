<template>
    <div class="contain-max">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-4">
                    <h2 class="text-left">Actualidad</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- CARD 1 -->
                <div class="col-md-4">
                    <a href="www.google.com" class="card-link">
                        <div class="card shadow-sm">
                            <img
                                :src="notice1"
                                alt="Noticia 1"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h3 class="card-title">
                                    Sem Porta Mollis Parturient
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
                            <!-- Botón separado fuera del enlace de la card -->
                            <div class="text-center contain-btn">
                                <a
                                    href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/sem-porta-mollis-parturient/"
                                    class="btn btn-escobedo w-100"
                                    >Saber más</a
                                >
                            </div>
                        </div>
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-4">
                    <a href="www.google.com" class="card-link">
                        <div class="card shadow-sm">
                            <img
                                :src="notice2"
                                alt="Noticia 1"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h3 class="card-title">
                                    Sem Porta Mollis Parturient
                                </h3>
                                <div class="card-meta mb-2">
                                    <span class="text-muted me-3">
                                        <i class="fa fa-calendar me-1"></i> 21
                                        Noviembre 2024
                                    </span>
                                    
                                </div>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisici elit, sed eiusmod tempor incidunt
                                    ut labore et dolore magna aliqua...
                                </p>
                            </div>
                            <!-- Botón separado fuera del enlace de la card -->
                            <div class="text-center contain-btn">
                                <a
                                    href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/sem-porta-mollis-parturient/"
                                    class="btn btn-escobedo w-100"
                                    >Saber más</a
                                >
                            </div>
                        </div>
                    </a>
                </div>

                <!-- CARD 3 -->
                <div class="col-md-4">
                    <a href="www.google.com" class="card-link">
                        <div class="card shadow-sm">
                            <img
                                :src="notice3"
                                alt="Noticia 1"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h3 class="card-title">
                                    Sem Porta Mollis Parturient
                                </h3>
                                <div class="card-meta mb-2">
                                    <span class="text-muted me-3">
                                        <i class="fa fa-calendar me-1"></i> 21
                                        Noviembre 2024
                                    </span>
                                    
                                </div>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisici elit, sed eiusmod tempor incidunt
                                    ut labore et dolore magna aliqua...
                                </p>
                            </div>
                            <!-- Botón separado fuera del enlace de la card -->
                            <div class="text-center contain-btn">
                                <a
                                    href="https://demo.goodlayers.com/realsoccer/demo2/2014/03/21/sem-porta-mollis-parturient/"
                                    class="btn btn-escobedo w-100"
                                    >Saber más</a
                                >
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import notice1 from "@images/noticias/notice1.jpg";
import notice2 from "@images/noticias/notice2.jpeg";
import notice3 from "@images/noticias/notice3.jpg";


</script>

<style scoped>
/* Estilos personalizados para mejorar el diseño de la card */
.contain-max .container {
    max-width: 1250px;
    padding: 50px 0;
}

.card-img-top {
    max-height: 200px;
}

.card-link {
    text-decoration: none;
    color: inherit;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}

.card-meta {
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.card-text {
    font-size: 0.8rem;
    color: var(--gray-real);
}

.card {
    cursor: pointer;
    transition: box-shadow 0.3s ease;
    max-width: 350px;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.contain-btn {
    padding: 16px;
}

a {
    text-decoration: none;
}

.card-meta {
    font-size: 12px;
}

.card-meta span {
    color: #bababa !important;
}
</style>

<template>
    <div class="contain-max">
        <div class="our-history-div full-width mx-auto">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#home"
                            type="button"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                        >
                            <i class="fas fa-calendar-alt"></i> Nuestra Misión
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#profile"
                            type="button"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                        >
                            <i class="fas fa-flag-checkered"></i> Nuestra Visión
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="contact-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#contact"
                            type="button"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                        >
                            <i class="far fa-eye"></i> Nuestros Valores
                        </button>
                    </li>
                </ul>
            </div>

            <div class="tab-content mna-bg" id="myTabContent">
                <div class="container">
                    <!-- Misión -->
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div
                            class="comon-fild-ads1 d-lg-flex align-items-start"
                        >
                            <figure>
                                <img
                                    :src="equipo_3"
                                    alt="Equipo"
                                    class="Nuestra Historia - Equipo"
                                />
                            </figure>
                            <div class="left-history">
                                <h2>Misión</h2>
                                <p>
                                    La Unión Montañesa Escobedo tiene como
                                    misión promover y desarrollar el fútbol en
                                    nuestra comunidad, fomentando el amor por
                                    este deporte desde las bases hasta el nivel
                                    profesional. Nos comprometemos a formar a
                                    jóvenes talentos en un entorno de respeto,
                                    disciplina y trabajo en equipo, mientras
                                    mantenemos viva la tradición y el legado
                                    histórico que nos ha definido desde 1917.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Visión -->
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <div
                            class="comon-fild-ads1 d-lg-flex align-items-start"
                        >
                            <figure>
                                <img
                                    :src="equipo_3"
                                    alt="Equipo"
                                    class="Nuestra Historia - Equipo"
                                />
                            </figure>
                            <div class="left-history">
                                <h2>Visión</h2>
                                <p>
                                    Ser un club referente en el fútbol regional
                                    y nacional, reconocidos por nuestra
                                    capacidad de formar jugadores comprometidos
                                    con los valores del deporte y nuestra
                                    comunidad. Aspiramos a consolidar nuestro
                                    lugar en categorías superiores,
                                    representando con orgullo a Escobedo y a
                                    toda Cantabria en competiciones de alto
                                    nivel.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Valores -->
                    <div
                        class="tab-pane fade"
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <div
                            class="comon-fild-ads1 d-lg-flex align-items-start"
                        >
                            <figure>
                                <img
                                    :src="equipo_3"
                                    alt="Equipo"
                                    class="Nuestra Historia - Equipo"
                                />
                            </figure>
                            <div class="left-history">
                                <div class="values-list container">
                                    <ul class="value-items nuestros-valores">
                                        <!-- Tradición y Legado -->
                                        <li class="value-item">
                                            <div class="icon-container">
                                                <i class="fas fa-landmark"></i>
                                            </div>
                                            <div class="text-container">
                                                <h3>Tradición y Legado</h3>
                                                <p>
                                                    Valoramos y respetamos
                                                    nuestra rica historia,
                                                    construida sobre más de un
                                                    siglo de esfuerzo y
                                                    dedicación al fútbol.
                                                </p>
                                            </div>
                                        </li>

                                        <!-- Compromiso Comunitario -->
                                        <li class="value-item">
                                            <div class="icon-container">
                                                <i class="fas fa-handshake"></i>
                                            </div>
                                            <div class="text-container">
                                                <h3>Compromiso Comunitario</h3>
                                                <p>
                                                    Mantenemos una conexión
                                                    estrecha con nuestra
                                                    comunidad, promoviendo la
                                                    inclusión y el apoyo mutuo.
                                                </p>
                                            </div>
                                        </li>

                                        <!-- Desarrollo Integral -->
                                        <li class="value-item">
                                            <div class="icon-container">
                                                <i class="fas fa-users-cog"></i>
                                            </div>
                                            <div class="text-container">
                                                <h3>Desarrollo Integral</h3>
                                                <p>
                                                    Nos enfocamos en el
                                                    desarrollo deportivo y
                                                    personal de nuestros
                                                    jugadores, fomentando la
                                                    educación, la disciplina y
                                                    el trabajo en equipo.
                                                </p>
                                            </div>
                                        </li>

                                        <!-- Espíritu Competitivo -->
                                        <li class="value-item">
                                            <div class="icon-container">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <div class="text-container">
                                                <h3>Espíritu Competitivo</h3>
                                                <p>
                                                    Competimos con integridad y
                                                    determinación, buscando
                                                    siempre superar nuestros
                                                    propios límites y alcanzar
                                                    nuevos logros.
                                                </p>
                                            </div>
                                        </li>

                                        <!-- Resiliencia -->
                                        <li class="value-item">
                                            <div class="icon-container">
                                                <i class="fas fa-seedling"></i>
                                            </div>
                                            <div class="text-container">
                                                <h3>Resiliencia</h3>
                                                <p>
                                                    Hemos superado adversidades
                                                    a lo largo de nuestra
                                                    historia y nos mantenemos
                                                    firmes en nuestra convicción
                                                    de continuar avanzando hacia
                                                    el futuro.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import equipo_3 from "@images/equipo/equipo_3.jpg";
</script>

<style scoped>
.contain-max {
    background-color: #f2f2f2;
}

.our-history-div{
    max-width: 1250px;
    padding: 50px 0;
}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
    color: var(--white) !important;
    background-color: var(--red) !important;
}

.our-history-div .nav-pills .nav-link,
.matech-div-main .nav-pills .nav-link {
    color: var(--red);
    text-transform: uppercase;
}

.our-history-div .nav-tabs .nav-link {
    font-family: var(--barlow);
    font-size: 26px;
    font-weight: 500;
    color: #071f40 !important;
    align-items: center;
    display: flex;
}

.our-history-div .nav-tabs .nav-link i {
    font-size: 20px;
    margin-right: 10px;
}

.our-history-div .nav-tabs .nav-item.show .nav-link,
.our-history-div .nav-tabs .nav-link.active {
    background: #f2f2f2;
    border: none !important;
    color: #ee1d36 !important;
}

.our-history-div .mna-bg {
    display: inline-block;
    width: 100%;
    background: #f2f2f2;
    padding: 50px 0;
}

.comon-fild-ads1 figure {
    width: 40%;
    height: 250px;
    overflow: hidden;
    border-radius: 8px;
    margin: 0;
}

.left-history {
    width: 60%;
    padding-left: 30px;
}

/* Ajuste para ocultar el espacio sobrante */
.tab-pane {
    display: none;
    height: 0;
    overflow: hidden;
}

.tab-pane.show {
    display: block;
    height: auto;
    overflow: visible;
}

.value-item {
    display: flex;
    gap: 0.5rem;
}

.text-container h3 {
    font-size: 1.2rem;
    padding: 0;
    margin: 0 !important;
}

.text-container p {
    margin-bottom: 0.5rem;
}

.icon-container i {
    color: var(--red);
}

.nuestros-valores .text-container p{
    font-size: 15px;
}


</style>

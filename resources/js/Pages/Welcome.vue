<template>
    <GuestLayout>
        <div class="content container-home w-100">
            <div class="container container-bg px-0">
                <div class="row row-info-bg">
                    <div class="bg-home"></div>
                    <div class="col col-bg-info">
                        <!-- INFO DESC TOP -->
                        <div class="content-top">
                            <div
                                class="slider-content d-flex flex-column align-items-start"
                            >
                                <h3 class="text-white">
                                    Bienvenido al Club Escobedo
                                </h3>
                                <h2 class="text-white text-left title">
                                    Somos profesionales
                                    <span class="d-block">Club de Fútbol</span>
                                </h2>
                                <p class="text-white text-left">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Quisque non velit sed urna
                                    dapibus condimentum. Nulla facilisi. Morbi
                                    auctor risus nec ligula posuere,
                                </p>
                                <button
                                    type="button"
                                    class="btn text-white btn-escobedo"
                                    name="button"
                                >
                                    Acerca del Club
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-arrow-right"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- SIGUIENTES PARTIDOS  -->
                        <div class="next-match-banner">
                            <a class="top-next-mc text-center">
                                <h5 class="mn-mc-titel">Próximo Partido</h5>
                                <hr />
                                <h4 class="next-match">
                                    2023-2024 UEFA Champions League
                                </h4>
                                <div
                                    class="d-flex align-items-center justify-content-center mt-2"
                                >
                                    <figure>
                                        <img
                                            :src="escobedo_logo"
                                            alt="Logo Image"
                                            class="img-logo"
                                        />
                                    </figure>
                                    <div class="mc-details-top text-center">
                                        <p class="time">19:20pm</p>
                                        <h5 class="date">24/ 11/ 2024</h5>
                                        <p class="location-mc">
                                            Estadio El Malecón, Cantabria
                                        </p>
                                    </div>

                                    <figure>
                                        <img
                                            :src="escobedo_logo"
                                            alt="Logo Image"
                                            class="img-logo"
                                        />
                                    </figure>
                                </div>
                            </a>

                            <a class="top-mc-starts mt-4">
                                <h5 class="mn-mc-titel text-center">
                                    Inicio de LaLiga 2024
                                </h5>
                                <hr />

                                <ul
                                    class="d-flex flex-column justify-content-center w-100 p-0 list-assis"
                                >
                                    <li
                                        class="d-flex align-items-center justify-content-between w-100"
                                    >
                                        <span
                                            class="ct-2 d-flex align-items-center"
                                        >
                                            <i class="far fa-futbol"></i> Goals
                                        </span>
                                        <span>12 </span>
                                    </li>

                                    <li
                                        class="d-flex align-items-center justify-content-between"
                                    >
                                        <span class="ct-2">
                                            <i class="fas fa-mitten"></i>
                                            Assists
                                        </span>
                                        <span>54 </span>
                                    </li>

                                    <li
                                        class="d-flex align-items-center justify-content-between"
                                    >
                                        <span class="ct-2">
                                            <i class="fas fa-running"></i>
                                            Apperarences
                                        </span>
                                        <span>34 </span>
                                    </li>
                                </ul>
                            </a>
                        </div>

                        <!-- BANNER PRINCIPAL (ÚLTIMAS NOVEDADES)-->
                        <div class="latest-news-div">
                            <div class="row row-one m-0">
                                <div class="col-lg-5 container-black">
                                    <h2
                                        class="py-3"
                                        style="z-index: 4; position: relative"
                                    >
                                        Últimas novedades
                                    </h2>
                                </div>
                                <div class="col-lg-7 contain-red">
                                    <div class="latest-news"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CALENDARIO Y RESULTADOS -->
                <div class="row row-calendairo-resultados">
                    <div class="col">
                        <div class="container">
                            <div class="row gx-lg-5">
                                <div class="col-lg-7 col-xl-8">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <h2 class="comon-heading m-0">
                                            Calendario y Resultado
                                        </h2>
                                        <a href="#" class="btn all-cm-btn">
                                            Todos los Partidos

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-arrow-right"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                                ></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="row row-cols-1 row-cols-lg-2 gy-5 g-lg-4 mt-0 mt-lg-0"
                                    >
                                        <div class="col">
                                            <a href="#" class="items-matchs">
                                                <figure class="m-0 bg-mc-1">
                                                    <img
                                                        :src="bg_1"
                                                        alt="bg-ms"
                                                    />
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
                                                        class="d-flex align-items-center justify-content-between"
                                                    >
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />
                                                            <figcaption>
                                                                Istanbul
                                                            </figcaption>
                                                        </figure>
                                                        <h4>VS</h4>
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo_results"
                                                            />
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
                                                    <img
                                                        :src="bg_2"
                                                        alt="bg-ms"
                                                    />
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
                                                        class="d-flex align-items-center justify-content-between"
                                                    >
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />
                                                            <figcaption>
                                                                Rayal FC
                                                            </figcaption>
                                                        </figure>
                                                        <h4>VS</h4>
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />
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
                                                    <img
                                                        :src="bg_3"
                                                        alt="bg-ms"
                                                    />
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
                                                        class="d-flex align-items-center justify-content-between"
                                                    >
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />
                                                            <figcaption>
                                                                DC Unfo.
                                                            </figcaption>
                                                        </figure>
                                                        <h4>VS</h4>
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />
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
                                                    <img
                                                        :src="bg_4"
                                                        alt="bg-ms"
                                                    />
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
                                                        class="d-flex align-items-center justify-content-between"
                                                    >
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />

                                                            <figcaption>
                                                                Istanbul
                                                            </figcaption>
                                                        </figure>
                                                        <h4>VS</h4>
                                                        <figure>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                            />

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
                                <div class="col-lg-5 col-xl-4">
                                    <div class="latest-result-div mt-5 mt-lg-0">
                                        <div
                                            class="d-flex align-items-center justify-content-between"
                                        >
                                            <h2 class="comon-heading mt-0">
                                                Últimos Resultados
                                            </h2>
                                            <a href="#" class="btn viw-btn">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-arrow-up-right-square-fill"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z"
                                                    ></path>
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="ltest-divbm mt-4">
                                            <a href="#" class="comon-items-div">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                >
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Escobedo
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <h5 class="m-0">1 - 2</h5>
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Leioa
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <i
                                                        class="fas fa-map-marker-alt"
                                                    ></i>
                                                    Nov 1, 2024/Santander,
                                                    Catanbria
                                                </p>
                                            </a>

                                            <a href="#" class="comon-items-div">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                >
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Escobedo.
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <h5 class="m-0">2 - 0</h5>
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Leioa
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <i
                                                        class="fas fa-map-marker-alt"
                                                    ></i>
                                                    Nov 2, 2024/Santander,
                                                    Catanbria
                                                </p>
                                            </a>

                                            <a href="#" class="comon-items-div">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                >
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Escobedo
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <h5 class="m-0">1 - 0</h5>
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Leioa
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <i
                                                        class="fas fa-map-marker-alt"
                                                    ></i>
                                                    Nov 2, 2024/Santander,
                                                    Catanbria
                                                </p>
                                            </a>

                                            <a href="#" class="comon-items-div">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                >
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Escobedo
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <h5 class="m-0">1 - 0</h5>
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Leioa
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <i
                                                        class="fas fa-map-marker-alt"
                                                    ></i>
                                                    Nov 2, 2024/Santander,
                                                    Catanbria
                                                </p>
                                            </a>

                                            <a href="#" class="comon-items-div">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                >
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Escobedo
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                    <h5 class="m-0">1 - 0</h5>
                                                    <div class="cm-culb">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <figcaption
                                                                class="me-2"
                                                            >
                                                                Leioa
                                                            </figcaption>
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="cl2"
                                                                class="logo-latest-results"
                                                            />
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <i
                                                        class="fas fa-map-marker-alt"
                                                    ></i>
                                                    Nov 2, 2024/Santander,
                                                    Catanbria
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NUESTRA HISTORIA  -->
                <div class="home-about-part">
                    <div class="container">
                        <h5>Nuestra Historia</h5>
                        <h2 class="comon-heading m-0">
                            Sobre el Club Escobedo
                        </h2>

                        <p class="col-lg-7 my-4 text-left text-about">
                            Nuestra pasión se remonta a 1917 , fecha en la que
                            se fundó el club, y tiempos donde el deporte inundó
                            el barrio de Arenas de Escobedo. Si bien a lo largo
                            de estos años hemos cambiado de nombre varias veces,
                            lo que no ha cambiado en nosotros -ni un ápice- es
                            nuestro espíritu y perseverancia en el campo. Hemos
                            logrado crecer y ascender en el fútbol,
                            posicionándonos en segunda RFEF este año 2024.
                            Estamos listos para luchar mucho más, ¿quieres
                            formar parte de nuestra historia?
                        </p>
                        <a href="#" class="btn all-cm-btn">
                            Más Información
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-arrow-right"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                ></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- TABLE DE POSICIONES-->
                <div class="table-ag-div py-5">
                    <div class="container">
                        <h2 class="comon-heading m-0 text-left">
                            Tabla de posiciones &amp; Calendario
                        </h2>

                        <div class="row g-lg-5">
                            <div class="col-lg-5">
                                <div class="table-div-left mt-4">
                                    <h4 class="text-left">Serie A</h4>

                                    <div
                                        id="seri1_wrapper"
                                        class="dataTables_wrapper"
                                    >
                                        <div class="dataTables_scroll">
                                            <div
                                                class="dataTables_scrollHead"
                                                style="
                                                    overflow: hidden;
                                                    position: relative;
                                                    border: 0px;
                                                    width: 100%;
                                                "
                                            >
                                                <div
                                                    class="dataTables_scrollHeadInner"
                                                    style="
                                                        box-sizing: content-box;
                                                        width: 466px;
                                                        padding-right: 17px;
                                                    "
                                                >
                                                    <table
                                                        class="display dataTable"
                                                        style="
                                                            width: 466px;
                                                            margin-left: 0px;
                                                        "
                                                    >
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="sorting sorting_asc"
                                                                    tabindex="0"
                                                                    aria-controls="seri1"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 168.922px;
                                                                    "
                                                                    aria-sort="ascending"
                                                                    aria-label="Club: activate to sort column descending"
                                                                >
                                                                    Club
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri1"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 56.6562px;
                                                                    "
                                                                    aria-label="W: activate to sort column ascending"
                                                                >
                                                                    W
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri1"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 49.6875px;
                                                                    "
                                                                    aria-label="D: activate to sort column ascending"
                                                                >
                                                                    D
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri1"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 46.7344px;
                                                                    "
                                                                    aria-label="L: activate to sort column ascending"
                                                                >
                                                                    L
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div
                                                class="dataTables_scrollBody"
                                                style="
                                                    position: relative;
                                                    overflow: auto;
                                                    max-height: 200px;
                                                    width: 100%;
                                                "
                                            >
                                                <table
                                                    id="seri1"
                                                    class="display dataTable"
                                                    style="width: 100%"
                                                    aria-describedby="seri1_info"
                                                >
                                                    <thead>
                                                        <tr style="height: 0px">
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri1"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 168.922px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Club
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri1"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 56.6562px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    W
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri1"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 49.6875px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    D
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri1"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 46.7344px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    L
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="height: 0px">
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 184.922px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Club
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 72.6562px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    W
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 65.6875px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    D
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 62.7344px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    L
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                <div
                                                                    class="comon-ft-cl"
                                                                >
                                                                    <figure
                                                                        class="d-flex align-items-center"
                                                                    >
                                                                        <img
                                                                            :src="
                                                                                escobedo_logo
                                                                            "
                                                                            alt="fbn"
                                                                            class="img-tabla-posiciones"
                                                                        />
                                                                        <figcaption>
                                                                            Escobedo
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td>13</td>
                                                            <td>01</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                <div
                                                                    class="comon-ft-cl"
                                                                >
                                                                    <figure
                                                                        class="d-flex align-items-center"
                                                                    >
                                                                        <img
                                                                            :src="
                                                                                escobedo_logo
                                                                            "
                                                                            alt="fbn"
                                                                            class="img-tabla-posiciones"
                                                                        />
                                                                        <figcaption>
                                                                            Escobedo
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td>12</td>
                                                            <td>20</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                <div
                                                                    class="comon-ft-cl"
                                                                >
                                                                    <figure
                                                                        class="d-flex align-items-center"
                                                                    >
                                                                        <img
                                                                            :src="
                                                                                escobedo_logo
                                                                            "
                                                                            alt="fbn"
                                                                            class="img-tabla-posiciones"
                                                                        />
                                                                        <figcaption>
                                                                            Escobedo
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td>25</td>
                                                            <td>36</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                <div
                                                                    class="comon-ft-cl"
                                                                >
                                                                    <figure
                                                                        class="d-flex align-items-center"
                                                                    >
                                                                        <img
                                                                            :src="
                                                                                escobedo_logo
                                                                            "
                                                                            alt="fbn"
                                                                            class="img-tabla-posiciones"
                                                                        />
                                                                        <figcaption>
                                                                            Escobedo
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td>25</td>
                                                            <td>36</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                <div
                                                                    class="comon-ft-cl"
                                                                >
                                                                    <figure
                                                                        class="d-flex align-items-center"
                                                                    >
                                                                        <img
                                                                            :src="
                                                                                escobedo_logo
                                                                            "
                                                                            alt="fbn"
                                                                            class="img-tabla-posiciones"
                                                                        />
                                                                        <figcaption>
                                                                            Escobedo
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td>12</td>
                                                            <td>36</td>
                                                            <td>61</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                class="dataTables_scrollFoot"
                                                style="
                                                    overflow: hidden;
                                                    border: 0px;
                                                    width: 100%;
                                                "
                                            >
                                                <div
                                                    class="dataTables_scrollFootInner"
                                                    style="
                                                        width: 466px;
                                                        padding-right: 17px;
                                                    "
                                                >
                                                    <table
                                                        class="display dataTable"
                                                        style="
                                                            width: 466px;
                                                            margin-left: 0px;
                                                        "
                                                    >
                                                        <tfoot>
                                                            <tr>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 184.922px;
                                                                    "
                                                                >
                                                                    Club
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 72.6562px;
                                                                    "
                                                                >
                                                                    W
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 65.6875px;
                                                                    "
                                                                >
                                                                    D
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 62.7344px;
                                                                    "
                                                                >
                                                                    L
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="dataTables_info"
                                            id="seri1_info"
                                            role="status"
                                            aria-live="polite"
                                        >
                                            Showing 1 to 5 of 5 entries
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="table-div-left mt-4">
                                    <h4 class="text-left">Serie A</h4>

                                    <div
                                        id="seri2_wrapper"
                                        class="dataTables_wrapper"
                                    >
                                        <div class="dataTables_scroll">
                                            <div
                                                class="dataTables_scrollHead"
                                                style="
                                                    overflow: hidden;
                                                    position: relative;
                                                    border: 0px;
                                                    width: 100%;
                                                "
                                            >
                                                <div
                                                    class="dataTables_scrollHeadInner"
                                                    style="
                                                        box-sizing: content-box;
                                                        width: 690px;
                                                        padding-right: 17px;
                                                    "
                                                >
                                                    <table
                                                        class="display dataTable"
                                                        style="
                                                            width: 690px;
                                                            margin-left: 0px;
                                                        "
                                                    >
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="sorting sorting_asc"
                                                                    tabindex="0"
                                                                    aria-controls="seri2"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 134.734px;
                                                                    "
                                                                    aria-sort="ascending"
                                                                    aria-label="Date: activate to sort column descending"
                                                                >
                                                                    Date
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri2"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 187.609px;
                                                                    "
                                                                    aria-label="Event: activate to sort column ascending"
                                                                >
                                                                    Event
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri2"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 89.8594px;
                                                                    "
                                                                    aria-label="Time: activate to sort column ascending"
                                                                >
                                                                    Time
                                                                </th>
                                                                <th
                                                                    class="sorting"
                                                                    tabindex="0"
                                                                    aria-controls="seri2"
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 133.797px;
                                                                    "
                                                                    aria-label="Venue: activate to sort column ascending"
                                                                >
                                                                    Venue
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div
                                                class="dataTables_scrollBody"
                                                style="
                                                    position: relative;
                                                    overflow: auto;
                                                    max-height: 200px;
                                                    width: 100%;
                                                "
                                            >
                                                <table
                                                    id="seri2"
                                                    class="display dataTable"
                                                    style="width: 100%"
                                                    aria-describedby="seri2_info"
                                                    ref="table1"
                                                >
                                                    <thead>
                                                        <tr style="height: 0px">
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri2"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 134.734px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Date
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri2"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 187.609px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Event
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri2"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 89.8594px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Time
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="sorting"
                                                                aria-controls="seri2"
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    width: 133.797px;
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Venue
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="height: 0px">
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 150.734px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Date
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 203.609px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Event
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 105.859px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Time
                                                                </div>
                                                            </th>
                                                            <th
                                                                rowspan="1"
                                                                colspan="1"
                                                                style="
                                                                    padding-top: 0px;
                                                                    padding-bottom: 0px;
                                                                    border-top-width: 0px;
                                                                    border-bottom-width: 0px;
                                                                    height: 0px;
                                                                    width: 149.797px;
                                                                "
                                                            >
                                                                <div
                                                                    class="dataTables_sizing"
                                                                    style="
                                                                        height: 0px;
                                                                        overflow: hidden;
                                                                    "
                                                                >
                                                                    Venue
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 10, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>12:00</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 11, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>14:00</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 12, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>14:30</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 14, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>15:30</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                        <tr class="odd">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 15, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>19:30</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td
                                                                class="sorting_1"
                                                            >
                                                                Nov 15, 2024
                                                            </td>
                                                            <td>
                                                                Royal FC
                                                                <span>vs</span>
                                                                GS FC
                                                            </td>
                                                            <td>19:30</td>
                                                            <td>GST Stadium</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                class="dataTables_scrollFoot"
                                                style="
                                                    overflow: hidden;
                                                    border: 0px;
                                                    width: 100%;
                                                "
                                            >
                                                <div
                                                    class="dataTables_scrollFootInner"
                                                    style="
                                                        width: 690px;
                                                        padding-right: 17px;
                                                    "
                                                >
                                                    <table
                                                        class="display dataTable"
                                                        style="
                                                            width: 690px;
                                                            margin-left: 0px;
                                                        "
                                                    >
                                                        <tfoot>
                                                            <tr>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 150.734px;
                                                                    "
                                                                >
                                                                    Date
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 203.609px;
                                                                    "
                                                                >
                                                                    Event
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 105.859px;
                                                                    "
                                                                >
                                                                    Time
                                                                </th>
                                                                <th
                                                                    rowspan="1"
                                                                    colspan="1"
                                                                    style="
                                                                        width: 149.797px;
                                                                    "
                                                                >
                                                                    Venue
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="dataTables_info"
                                            id="seri2_info"
                                            role="status"
                                            aria-live="polite"
                                        >
                                            Showing 1 to 6 of 6 entries
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plantilla de Jugadores -->
                <div class="team-div-1"></div>

                <!-- Forma parte de un gran equipo -->
                <div class="join-us-div">
                    <div class="container">
                        <div class="d-lg-flex justify-content-between">
                            <h1 class="comon-heading m-0">
                                Forma parte de un gran equipo
                            </h1>
                            <a href="#" class="btn all-cm-btn mt-4 mt-lg-0">
                                únete a nosotros
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-up-short"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Nuestra tienda del equipo -->
                <div class="team-products py-5">
                    <div class="container">
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <h1 class="comon-heading m-0">
                                Nuestra tienda del equipo
                            </h1>
                            <a href="#" class="btn all-cm-btn">
                                Ver todos
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-right"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                    ></path>
                                </svg>
                            </a>
                        </div>

                        <ul
                            class="nav nav-pills my-4"
                            id="pills-tab"
                            role="tablist"
                        >
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="pills-home-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-home"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-home"
                                    aria-selected="true"
                                >
                                    Nuevo
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-profile-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false"
                                >
                                    Merchandising
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="pills-home"
                                role="tabpanel"
                                aria-labelledby="pills-home-tab"
                            >
                                <div
                                    class="news-slid owl-carousel owl-theme owl-loaded owl-drag"
                                >
                                    <div class="owl-stage-outer">
                                        <div
                                            class="owl-stage d-flex"
                                            style="
                                                transform: translate3d(
                                                    0px,
                                                    0px,
                                                    0px
                                                );
                                                transition: all;
                                                width: 1326px;
                                            "
                                        >
                                            <div
                                                class="owl-item active"
                                                style="
                                                    width: 301.5px;
                                                    margin-right: 30px;
                                                "
                                            >
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            :src="product01"
                                                            alt="products"
                                                        />
                                                        <figcaption>
                                                            - 10%
                                                        </figcaption>
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>Camiseta</h6>
                                                    <h5>Camiseta de Fútbol</h5>
                                                    <h4>45 €</h4>
                                                </a>
                                            </div>
                                            <div
                                                class="owl-item active"
                                                style="
                                                    width: 301.5px;
                                                    margin-right: 30px;
                                                "
                                            >
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            :src="product02"
                                                            alt="products"
                                                        />

                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6 class="text-left">
                                                        Botas
                                                    </h6>
                                                    <h5 class="text-left">
                                                        Botas de fútbol
                                                    </h5>
                                                    <h4 class="text-left">
                                                        15 €
                                                    </h4>
                                                </a>
                                            </div>
                                            <div
                                                class="owl-item active"
                                                style="
                                                    width: 301.5px;
                                                    margin-right: 30px;
                                                "
                                            >
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            :src="product03"
                                                            alt="products"
                                                        />
                                                        <figcaption>
                                                            - 5%
                                                        </figcaption>
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>Guantes</h6>
                                                    <h5>Guantes de fútbol</h5>
                                                    <h4>45 €</h4>
                                                </a>
                                            </div>
                                            <div
                                                class="owl-item active"
                                                style="
                                                    width: 301.5px;
                                                    margin-right: 30px;
                                                "
                                            >
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            :src="product04"
                                                            alt="products"
                                                        />
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>Camiseta</h6>
                                                    <h5>Camiseta de Fútbol</h5>
                                                    <h4>25 €</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled">
                                        <button
                                            type="button"
                                            role="presentation"
                                            class="owl-prev"
                                        >
                                            <span aria-label="Previous"
                                                >‹</span
                                            ></button
                                        ><button
                                            type="button"
                                            role="presentation"
                                            class="owl-next"
                                        >
                                            <span aria-label="Next">›</span>
                                        </button>
                                    </div>
                                    <div class="owl-dots disabled">
                                        <button
                                            role="button"
                                            class="owl-dot active"
                                        >
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-profile"
                                role="tabpanel"
                                aria-labelledby="pills-profile-tab"
                            >
                                <div
                                    class="news-slid owl-carousel owl-theme owl-loaded owl-drag"
                                >
                                    <div class="owl-stage-outer">
                                        <div
                                            class="owl-stage"
                                            style="
                                                transform: translate3d(
                                                    0px,
                                                    0px,
                                                    0px
                                                );
                                                transition: all;
                                            "
                                        >
                                            <div class="owl-item">
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            src="images/product01.jpg"
                                                            alt="products"
                                                        />
                                                        <figcaption>
                                                            10% Off
                                                        </figcaption>
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>T-shirt</h6>
                                                    <h5>soccer jersey</h5>
                                                    <h4>$45</h4>
                                                </a>
                                            </div>
                                            <div class="owl-item">
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            src="images/product02.webp"
                                                            alt="products"
                                                        />

                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>Shoes</h6>
                                                    <h5>soccer jersey</h5>
                                                    <h4>$15</h4>
                                                </a>
                                            </div>
                                            <div class="owl-item">
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            src="images/product-13-copyright-393x426.webp"
                                                            alt="products"
                                                        />
                                                        <figcaption>
                                                            5% Off
                                                        </figcaption>
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>Gloves</h6>
                                                    <h5>soccer jersey</h5>
                                                    <h4>$45</h4>
                                                </a>
                                            </div>
                                            <div class="owl-item">
                                                <a href="#" class="items-shop">
                                                    <figure>
                                                        <img
                                                            src="images/4.jpg"
                                                            alt="products"
                                                        />
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-heart-fill"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button
                                                                    class="btn save"
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-cart3"
                                                                        viewBox="0 0 16 16"
                                                                    >
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                                        ></path>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <h6>t-shirt</h6>
                                                    <h5>soccer jersey</h5>
                                                    <h4>$25</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled">
                                        <button
                                            type="button"
                                            role="presentation"
                                            class="owl-prev"
                                        >
                                            <span aria-label="Previous"
                                                >‹</span
                                            ></button
                                        ><button
                                            type="button"
                                            role="presentation"
                                            class="owl-next"
                                        >
                                            <span aria-label="Next">›</span>
                                        </button>
                                    </div>
                                    <div class="owl-dots disabled">
                                        <button
                                            role="button"
                                            class="owl-dot active"
                                        >
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <span color="red"></span>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";

import GuestLayout from "@/Layouts/GuestLayout.vue";
import escobedo_logo from "@images/logo-escobedo.png";
import bg_1 from "@images/bg-1.jpg";
import bg_2 from "@images/bg-2.jpeg";
import bg_3 from "@images/bg-3.jpeg";
import bg_4 from "@images/bg-4.jpg";
import product01 from "@images/producto01.jpg";
import product02 from "@images/product02.webp";
import product03 from "@images/producto03.webp";
import product04 from "@images/producto04.jpg";
</script>

<style scoped>

.bg-home{
    background: url("@images/homev1.jpg") no-repeat center center;
    background-size: cover;
    height: 100vh;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: -1;
}

.content.container-home {
    height: 100%;
}

.container-bg {
    width: 100%;
    max-width: unset !important;
}

.row-info-bg {
    width: 100%;
}

.row-info-bg .col-bg-info {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    height: 80vh;
}



.container-home .container {
    max-width: 1250px;
}

html,
body,
#app {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}

.content {
    text-align: center;
}

p {
    margin: 0;
}

.owl-stage-outer,
.owl-stage {
    width: 100% !important;
}

.latest-news-div {
    width: 100%;
    background: gray;
    position: absolute;
    bottom: 0;
    left: 0;
}

.latest-news-div .container {
    max-width: unset;
    padding: 0;
}

.latest-news-div .container .row-one {
    width: 100%;
    margin-left: 0;
    margin-right: 0;
}

.container-black {
    background-color: var(--black);
    color: var(--white);
}
.contain-red {
    background-color: var(--red);
}

.img-logo {
    width: 3.4rem;
}

.next-match-banner {
    position: absolute;
    right: 8%;
    transform: translateY(-50%);
    top: 50%;
    width: 24%;
}

.top-next-mc,
.top-mc-starts {
    text-decoration: none;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 8px;
    display: grid;
    align-content: center;
    padding: 19px 10px;
}

.time {
    color: var(--red);
}

.next-match {
    font-size: 19px;
    margin-top: 0 !important;
}

.mn-mc-titel {
    font-family: var(--roboto) !important;
    margin: 0 !important;
}

.top-next-mc .date,
.top-next-mc .location-mc {
    font-family: var(--roboto) !important;
}
.top-next-mc .date {
    font-weight: 700;
}

.ct-2 {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.ct-2 i {
    color: var(--red);
}

.list-assis {
    font-size: 19px;
    display: flex;
    gap: 0.5rem;
}

.btn-escobedo {
    background-color: var(--red);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    box-shadow: 0px 14px 80px rgb(252 56 56 / 40%);
    font-size: 20px;
    margin-top: 25px;
    background: #ee1d36;
    padding: 10px 35px;
}

.slider-content {
    max-width: 450px;
}

.title {
    font-size: 3rem;
    text-transform: uppercase;
    font-weight: 600;
}

.content-top .slider-content {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

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
    background-color: rgba(7, 31, 64, 0.5);
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

ltest-divbm figure {
    margin: 0;
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

.home-about-part {
    display: grid;
    align-content: center;
    background: #1c2334 url("@images/about-bg.jpg") no-repeat;
    background-size: cover;
    width: 100%;
    padding: 50px 0;
    min-height: 484px;
    margin-top: 80px;
}

.home-about-part h5 {
    font-size: 30px;
}

.home-about-part h5,
.home-about-part h2 {
    color: var(--white);
}

.home-about-part .comon-heading {
    font-size: 40px;
}

.home-about-part p {
    color: var(--gray);
}

.all-cm-btn {
    border: solid 2px var(--red);
    background: var(--red);
    color: var(--white);
    transition: all 0.5s;
    font-size: 16px;
    font-weight: 500;
    padding: 6px 21px;
}

.home-about-part .container {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}

.text-about {
    font-size: 17px;
}

/* TABLA DE POSICIONES & CALENDARIO */
.table-ag-div {
    display: inline-block;
    width: 100%;
}

.comon-heading {
    font-weight: 600;
    color: #071f40;
    font-size: 35px;
}

.table-div-left h4 {
    background: #ee1d36;
    padding: 8px 10px 8px 20px;
    color: #fff;
}

.table-div-left td {
    font-size: 14px;
}

.img-tabla-posiciones {
    width: 31px;
    height: 40px;
    object-fit: cover;
}

/* Para navegadores basados en WebKit (Chrome, Safari) */
.dataTables_scrollBody::-webkit-scrollbar {
    width: 8px; /* Ancho de la barra de scroll */
}

.dataTables_scrollBody::-webkit-scrollbar-thumb {
    background-color: black;
    border-radius: 10px;
}

.dataTables_scrollBody::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    border-radius: 10px;
}

/* Para Firefox */
.dataTables_scrollBody {
    scrollbar-color: var(--red) #f1f1f1;
    scrollbar-width: thin;
}

/* SECCIÓN - FORMA PARTE DE UN GRAN EQUIPO */
.join-us-div {
    display: inline-block;
    width: 100%;
    padding: 30px 0;
    background: var(--red) url("@images/creat-bg.jpg") no-repeat;
    background-size: cover;
}

.join-us-div .comon-heading {
    color: var(--white);
}
.comon-heading {
    font-weight: 600;
    color: #071f40;
    font-size: 35px;
}

.join-us-div .all-cm-btn {
    background: var(--white);
    color: var(--red) !important;
    line-height: 36px;
    font-weight: 700;
    text-transform: uppercase;
    display: flex;
    align-items: center;
}

.join-us-div .all-cm-btn svg {
    transform: rotate(90deg);
    width: 30px;
    height: 30px;
}

/* Nuestra tienda del equipo */
.items-shop figure {
    height: 250px;
    position: relative;
    overflow: hidden;
    width: 100%;
    border-radius: 8px;
}

.owl-carousel .owl-item img {
    display: block;
    width: 100%;
}

.items-shop figure img {
    object-fit: cover;
    width: 100%;
    height: 100%;
    object-position: top;
}

.items-shop figcaption {
    background: var(--red);
    color: var(--white);
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 10px;
    border-radius: 8px;
}

.items-shop figure ul {
    position: absolute;
    top: 10px;
    right: 10px;
    visibility: visible;
    transition: all 0.5s;
    opacity: 0;
}

.items-shop figure ul li .btn {
    background: var(--red);
    color: var(--red);
    margin-bottom: 5px;
}

.items-shop h6 {
    color: var(--red);
}

.items-shop h5 {
    font-family: var(--roboto) !important;
    font-weight: 700;
    color: var(--black);
}

.items-shop h4 {
    color: var(--red);
    font-family: var(--roboto) !important;
    font-weight: 700;
    font-size: 30px;
}

.team-products .nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
    background: none;
    color: #ee1d36;
    border-bottom: solid 2px #ee1d36;
}

.team-products .nav-pills .nav-link {
    border-radius: 0;
    color: var(--black);
    font-weight: 600;
    font-size: 20px;
}


</style>

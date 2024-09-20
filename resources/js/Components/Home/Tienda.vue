<template>
    <!-- Nuestra tienda del equipo -->
    <div class="team-products py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="comon-heading m-0">Nuestra tienda del equipo</h1>
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

            <ul class="nav nav-pills my-4" id="pills-tab" role="tablist">
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
                        tabindex="-1"
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
                    <div class="row">
                        <!-- Producto 1 -->
                        <div class="col-md-3">
                            <a href="#" class="items-shop">
                                <figure>
                                    <img :src="product01" alt="products" />
                                    <figcaption>- 10%</figcaption>
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="btn save">
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
                                            <button class="btn save">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-cart3"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5z"
                                                    ></path>
                                                    <path
                                                        d="M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
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

                        <!-- Producto 2 -->
                        <div class="col-md-3">
                            <a href="#" class="items-shop">
                                <figure>
                                    <img :src="product02" alt="products" />
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="btn save">
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
                                            <button class="btn save">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-cart3"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5z"
                                                    ></path>
                                                    <path
                                                        d="M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </figure>
                                <h6>Botas</h6>
                                <h5>Botas de fútbol</h5>
                                <h4>15 €</h4>
                            </a>
                        </div>

                        <!-- Producto 3 -->
                        <div class="col-md-3">
                            <a href="#" class="items-shop">
                                <figure>
                                    <img :src="product03" alt="products" />
                                    <figcaption>- 5%</figcaption>
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="btn save">
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
                                            <button class="btn save">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-cart3"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5z"
                                                    ></path>
                                                    <path
                                                        d="M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </figure>
                                <h6>Guantes</h6>
                                <h5>Guantes de fútbol</h5>
                                <h4>35 €</h4>
                            </a>
                        </div>

                        <!-- Producto 4 -->
                        <div class="col-md-3">
                            <a href="#" class="items-shop">
                                <figure>
                                    <img :src="product04" alt="products" />
                                    <figcaption>- 5%</figcaption>
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="btn save">
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
                                            <button class="btn save">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-cart3"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5z"
                                                    ></path>
                                                    <path
                                                        d="M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
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
            </div>
        </div>
    </div>
</template>

<script setup>
import product01 from "@images/producto01.jpg";
import product02 from "@images/product02.webp";
import product03 from "@images/producto03.webp";
import product04 from "@images/producto04.jpg";
</script>

<style scope>
.container-home .container {
    max-width: 1250px;
}

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

@media (max-width: 992px) {
    .items-shop figure {
        max-height: 300px;
        height: 300px;
    }

    .items-shop figure img {
        object-position: center;
    }
}
</style>

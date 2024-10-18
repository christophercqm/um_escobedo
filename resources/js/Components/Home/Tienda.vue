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

            <div class="text-center my-4">
                <h2 class="text-muted">¡Próximamente!</h2>
                <p class="proximamente">
                    Estamos trabajando para ofrecerte los mejores productos.
                </p>
                <a
                    href="https://www.futbolemotion.com/es/categoria/colectivos/equipaciones-um-escobedo"
                    target="_blank"
                    class="btn btn-primary"
                >
                    Visitar nuestra tienda
                </a>
            </div>
        </div>
    </div>
</template>

<script setup></script>

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

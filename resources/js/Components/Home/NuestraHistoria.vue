<template>
    <div class="home-about-part">
        <div class="container">
            <h5>Nuestra Historia</h5>
            <h2 class="comon-heading m-0">Sobre el Club Escobedo</h2>

            <p class="col-lg-7 my-4 text-left text-about">
                Nuestra pasión se remonta a 1917 , fecha en la que se fundó el
                club, y tiempos donde el deporte inundó el barrio de Arenas de
                Escobedo. Si bien a lo largo de estos años hemos cambiado de
                nombre varias veces, lo que no ha cambiado en nosotros -ni un
                ápice- es nuestro espíritu y perseverancia en el campo. Hemos
                logrado crecer y ascender en el fútbol, posicionándonos en
                segunda RFEF este año 2024. Estamos listos para luchar mucho
                más, ¿quieres formar parte de nuestra historia?
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
</template>

<script setup>
</script>

<style scoped>
.container-home .container {
    max-width: 1250px;
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


@media (max-width: 992px) {
    .btn.all-cm-btn{
        display: flex;
        align-items: center;
        gap: 1rem;
    }
}


</style>

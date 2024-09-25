<template>
    <div class="contain-max">
        <div class="container">
            <div class="row">
                <div class="col col-junta">
                    <h2>Junta</h2>
                    <div class="row">
                        <div class="col-md-3" >
                            <!-- Columna para cada tarjeta -->
                            <div class="card">
                                <img
                                    :src=socio_1
                                    class="card-img-top"
                                    alt="Imagen 1"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Nombre 1</h5>
                                    <p class="card-text">Cargo 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img
                                    :src=socio_1
                                    class="card-img-top"
                                    alt="Imagen 2"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Nombre 2</h5>
                                    <p class="card-text">Cargo 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img
                                    :src="socio_1"
                                    class="card-img-top"
                                    alt="Imagen 3"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Nombre 3</h5>
                                    <p class="card-text">Cargo 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img
                                    :src="socio_1"
                                    class="card-img-top"
                                    alt="Imagen 4"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Nombre 4</h5>
                                    <p class="card-text">Cargo 4</p>
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
    import socio_1 from '@images/junta/socio1.jpg';
</script>

<style scoped>
.contain-max {
    padding: 2rem 0;
}

.card {
    width: 300px;
    max-width: 300px;
    min-width: 300px;
}

.card-body {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: start;
}

.card-body .card-text{
    font-size: 14px;
    color: var(--red);
    font-weight: 600;
}

.card-body .card-title {
    margin-bottom: 0 !important;
}

.card-body .card-title, .card-text{
    font-family: var(--roboto) !important;
}

.contain-max .container {
    max-width: 1250px;
}

.col-junta {
    text-align: left;
}
</style>

<template>
    <div class="contain-max">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-4">
                    <h2 class="text-left">Actualidad</h2>
                </div>
            </div>
            <div class="row justify-content-center contain-cards">
                <div
                    v-for="(noticia, index) in props.prensa"
                    :key="index"
                    class="col-md-4 container-card"
                >
                    <a :href="noticia.enlace" class="card-link">
                        <div class="card shadow-sm d-flex flex-column">
                            <img :src="`storage/${noticia.imagen}`" :alt="noticia.titulo" class="card-img-top" />
                            <div class="card-body flex-grow-1">
                                <h3 class="card-title">{{ noticia.titulo }}</h3>
                                <div class="card-meta mb-2">
                                    <span class="text-muted me-3">
                                        <i class="fa fa-calendar me-1"></i> {{ formatDate(noticia.fecha_creacion) }}
                                    </span>
                                </div>
                                <p class="card-text">
                                    {{ truncateText(100, noticia.descripcion) }}
                                </p>
                            </div>
                            <div class="text-center contain-btn">
                                <a :href="`/prensa-public/${noticia.id}`" class="btn btn-escobedo w-100">Saber más</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div v-if="props.prensa.length === 0" class="col-12 text-center">
                    <p>No hay noticias disponibles en esta categoría.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

// Recibiendo las props de prensa
const props = defineProps({
    prensa: {
        type: Array,
        default: () => []
    }
});

// Función para truncar el texto
const truncateText = (number, text) => {
    if (text.length <= number) {
        return text;
    }
    return text.slice(0, number) + "...";
};

// Función para formatear la fecha
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('es-ES', options); // Cambia 'es-ES' a tu idioma preferido
};
</script>

<style scoped>
/* Estilos personalizados para mejorar el diseño de la card */
.contain-max .container {
    max-width: 1250px;
    padding-top: 50px;
    padding-bottom: 50px;
}

.card-img-top {
    max-height: 200px;
    object-fit: cover; /* Asegura que la imagen cubra el espacio de la tarjeta */
}

.card-link {
    text-decoration: none;
    color: inherit;
}

.card {
    cursor: pointer;
    transition: box-shadow 0.3s ease;
    display: flex; /* Utiliza flexbox para las tarjetas */
    flex-direction: column; /* Las tarjetas se alinean verticalmente */
    height: 100%; /* Asegura que las tarjetas llenen el espacio */
}

.card-body {
    flex-grow: 1; /* Permite que el cuerpo de la tarjeta crezca y ocupe espacio */
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

@media (max-width: 600px) {
    .container-club .card {
        max-width: 100%;
    }

    .contain-cards .container-card {
        margin-bottom: 2rem;
    }

    .contain-max .container {
        padding-right: 12px;
        padding-left: 12px;
    }
}
</style>

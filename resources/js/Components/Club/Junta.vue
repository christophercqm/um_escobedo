<template>
    <div class="contain-max">
        <div class="container">
            <div class="row row-junta">
                <div class="col col-junta">
                    <h2>Junta</h2>
                    <!-- Contenedor para los miembros -->
                    <div class="logos">
                        <div class="logos-slide bg-white" :style="{
                            animationPlayState: isHovered
                                ? 'paused'
                                : 'running',
                        }">
                            <div v-for="miembro in props.miembros" :key="miembro.id" class="logo-item bg-white">
                                <div class="card">
                                    <img :src="`/storage/${miembro.foto_url}`" class="card-img-top"
                                        :alt="`Imagen de ${miembro.nombre}`" />
                                    <div class="card-body">
                                        <h5 class="card-title text-white">
                                            {{ miembro.nombre }}
                                        </h5>
                                        <p class="card-text">
                                            {{ miembro.cargo }}
                                        </p>
                                    </div>
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
import { defineProps, ref, onMounted } from "vue";

// Prop que recibe los miembros
const props = defineProps({
    miembros: {
        type: Array,
        required: true,
    },
});

// Estado para pausar la animación al pasar el mouse
const isHovered = ref(false);

// Pausar la animación en hover
const handleMouseEnter = () => {
    isHovered.value = true;
};

const handleMouseLeave = () => {
    isHovered.value = false;
};

// Añadir eventos de mouse enter y leave
onMounted(() => {
    const logos = document.querySelector(".logos");
    logos.addEventListener("mouseenter", handleMouseEnter);
    logos.addEventListener("mouseleave", handleMouseLeave);
});
</script>

<style scoped>
/* ANIMACIONES */
.logos {
    overflow: hidden;
    padding: 40px 0;
    background: white;
    white-space: nowrap;
    position: relative;
}

.logos:before,
.logos:after {
    position: absolute;
    top: 0;
    width: 250px;
    height: 100%;
    content: "";
    z-index: 2;
}

.logos:before {
    left: 0;
    background: linear-gradient(to left, rgba(255, 255, 255, 0), white);
}

.logos:after {
    right: 0;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
}

.logos-slide {
    display: inline-block;
    animation: slide 35s infinite linear;
    /* Duración por defecto */
}

@keyframes slide {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-100%);
    }
}

.logo-item {
    display: inline-block;
    margin: 0 40px;
}

/* FIN - ANIMACION SLIDER */

.card {
    background-color: var(--black);
    max-width: 300px;
    height: 350px;
    max-height: 350px;
    position: relative;
}

.card-body {
    position: absolute;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    background-color: var(--bg-black);
}

.card-body .card-text {
    font-size: 14px;
    color: var(--red);
    font-weight: 500;
}

.card-body .card-title {
    font-weight: 400;
}

.card-body .card-title,
.card-text {
    font-family: var(--roboto) !important;
}

.contain-max .container {
    max-width: 1250px;
}

.col-junta {
    text-align: left;
}

/* Ajustes para móviles */
@media (max-width: 600px) {
    .logo-item {
        max-width: 300px;
        width: 300px;
    }

    .logos:before,
    .logos:after {
        width: 10px;
    }

    .logos-slide {
        animation: slide 25s infinite linear;
        /* Ajuste de duración para pantallas pequeñas */
    }
}

@media (max-width: 768px) {
    .logos-slide {
        animation: slide 30s infinite linear;
        /* Ajuste de duración para pantallas medianas */
    }

    .col-junta .card {
        width: 100%;
        max-width: 100%;
        min-width: 100%;
    }
}

.row-junta {
    padding-top: 50px;
    padding-bottom: 50px;
}
</style>

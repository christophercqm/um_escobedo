<template>
    <GuestLayout>
      <div class="content container-primer-equipo w-100">
        <div class="container px-0 max-width">
          <div class="row row-1 row-jugadores">
            <div class="col">
              <h1>Jugadores</h1>
              <div class="container-jugadores row">
                <div 
                  v-for="jugador in jugadores" 
                  :key="jugador.id" 
                  class="jugador-card col-md-4 mb-4"
                >
                  <div class="card text-center">
                    <img 
                      :src="jugador.foto_url" 
                      alt="Foto de {{ jugador.nombre }}" 
                      class="card-img-top card-img-jugador"
                    />
                    <div class="card-body">
                      <h2 class="number text-white">{{ jugador.numero_camiseta }}</h2>
                      <h5 class="card-title">{{ jugador.nombre }} {{ jugador.apellido }}</h5>
                      <p class="card-text jugador-posicion">{{ jugador.posicion }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  </template>
  
  <script setup>
  import GuestLayout from "@/Layouts/GuestLayout.vue";
  import { defineProps, onMounted } from 'vue';
  
  const props = defineProps({
    jugadores: Array,
  });
  
  // Esto te permitirá ver en la consola del navegador si se están recibiendo los datos correctamente
  onMounted(() => {
    console.log(props.jugadores);
  });
  </script>
  
  <style scoped>

  .container-jugadores {
    display: flex;
    flex-wrap: wrap;
  }

  .card {
    background-color: var(--black); 
    color: var(--white); 
  }
  
  img.card-img-jugador {
    max-height: 300px;
    object-fit: cover; 
    margin: 0 auto;
  } 
  
  .number {
    font-size: 2rem;
    font-weight: bold; 
    margin: 10px 0;
  }
  

  .card-text {
    margin-top: 0;
  }

  .jugador-posicion {
    color: var(--red);
  }
  </style>
  
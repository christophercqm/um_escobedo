<template>
    <div>
      <h2 class="text-uppercase llamanos">Llámanos</h2>
      <h2 class="title-contact">Datos de contacto</h2>
      <p class="mt-3 mb-5 desc-contact">
        Para información comercial, contacto con el equipo de prensa o colaboraciones, a continuación se muestran nuestros datos de contacto.
      </p>
      <div class="data-contact">
        <!-- EMAIL -->
        <div class="email d-flex gap-3">
          <span>
            <i class="bi bi-envelope-at-fill icon"></i>
          </span>
          <div class="email-info">
            <h3 class="m-0 label-name">Correo electrónico</h3>
            <a href="mailto:comunicacion@umescobedo.com" class="info">comunicacion@umescobedo.com</a>
          </div>
        </div>
  
        <!-- TELÉFONO -->
        <div class="tel d-flex gap-3">
          <span>
            <i class="bi bi-telephone-fill icon"></i>
          </span>
          <div class="tel-info">
            <h3 class="m-0 label-name">Teléfonos</h3>
            <span class="info">
              <a href="tel:+52645946150" class="info">645 946 150</a> -
              <a href="tel:+52664448096" class="info">664 448 096</a>
            </span>
          </div>
        </div>
  
        <!-- UBICACIÓN -->
        <div class="ubicacion d-flex gap-3">
          <span>
            <i class="bi bi-geo-alt-fill icon"></i>
          </span>
          <div class="ubicacion-info">
            <h3 class="m-0 label-name">Ubicación</h3>
            <a href="https://maps.app.goo.gl/o1wGkmfNrhaYWMzM6" target="_blank" class="info">
              Barranco arenas, s/n, 39609 Camargo (Cantabria), España
            </a>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  </script>


<style scope>

.icon {
    color: var(--red);
    font-size: 25px;
    line-height: normal;
}

.llamanos {
    font-size: 1.5rem;
    font-weight: 600;
}

.title-contact {
    font-size: 2.5rem;
    font-weight: 600;
}

.desc-contact {
    font-size: 0.9rem;
}

.data-contact {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

</style>
  
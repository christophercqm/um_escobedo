<template>
  <form @submit.prevent="submitAcreditacion">
    <div class="mb-3">
      <label class="form-label label-acreditacion-title">Seleccione el tipo de acreditación:</label>
      <div class="container-radio-buttons d-flex gap-3">
        <div class="form-check">
          <input type="radio" class="form-check-input p-0" id="arbitro" value="arbitro" v-model="acreditacionData.tipo_acreditacion" required />
          <label class="form-check-label name-label" for="arbitro">Árbitro</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input p-0" id="prensa" value="prensa" v-model="acreditacionData.tipo_acreditacion" required />
          <label class="form-check-label name-label" for="prensa">Prensa</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input p-0" id="cuerpo-tecnico" value="cuerpo_tecnico" v-model="acreditacionData.tipo_acreditacion" required />
          <label class="form-check-label name-label" for="cuerpo-tecnico">Cuerpo Técnico</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input p-0" id="cuerpo-directivo" value="cuerpo_directivo" v-model="acreditacionData.tipo_acreditacion" required />
          <label class="form-check-label name-label" for="cuerpo-directivo">Cuerpo Directivo</label>
        </div>
      </div>
    </div>

    <div v-if="isCuerpoTecnicoODirectivo">
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Nombre" v-model="acreditacionData.nombre" required />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Apellido" v-model="acreditacionData.apellido" required />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="DNI" v-model="acreditacionData.dni" required />
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" placeholder="Correo Electrónico" v-model="acreditacionData.correo" required />
      </div>
      <div class="mb-3">
        <input type="tel" class="form-control" placeholder="Teléfono" v-model="acreditacionData.telefono" required />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Equipo que pertenece" v-model="acreditacionData.equipo_pertenece" required />
      </div>
      <div class="mb-3">
        <textarea class="form-control" placeholder="Asunto" v-model="acreditacionData.asunto" required></textarea>
      </div>
    </div>

    <div class="mb-3">
      <input type="file" class="form-control ipt-file" @change="handleFileUpload" />
    </div>

    <button type="submit" class="btn-public w-100">Enviar</button>
  </form>
</template>

<script setup>
import { ref, computed } from 'vue';
import Swal from 'sweetalert2';

// Datos del formulario
const acreditacionData = ref({
  tipo_acreditacion: '',
  nombre: '',
  apellido: '',
  dni: '',
  correo: '',
  telefono: '',
  asunto: '',
  archivo: null,
  equipo_pertenece: ''
});

// Computed property para verificar el tipo de acreditación
const isCuerpoTecnicoODirectivo = computed(() => {
  return acreditacionData.value.tipo_acreditacion === 'cuerpo_tecnico' || acreditacionData.value.tipo_acreditacion === 'cuerpo_directivo';
});

// Manejar la carga de archivos
const handleFileUpload = (event) => {
  acreditacionData.value.archivo = event.target.files[0];
};

// Emitir evento para enviar los datos al componente padre
const emit = defineEmits(['submit-form']);

const submitAcreditacion = async () => {
  // Mostrar el modal de SweetAlert2 con un spinner
  const swal = Swal.fire({
    title: 'Enviando...',
    html: 'Por favor espera.',
    didOpen: () => {
      Swal.showLoading();
    },
    allowOutsideClick: false,
  });

  const formData = new FormData();
  for (const key in acreditacionData.value) {
    formData.append(key, acreditacionData.value[key]);
  }

  try {
    // Simulación de una solicitud HTTP (puedes reemplazar esto con tu lógica real)
    await new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve(); // Simula una respuesta exitosa
      }, 2000);
    });

    // Cerrar el modal de SweetAlert2
    swal.close();

    // Mostrar éxito
    Swal.fire('¡Listo!', 'Tu solicitud ha sido enviada.', 'success');

    // Emitir el evento con el tipo de formulario
    emit('submit-form', { tipo: 'acreditacion', data: formData });
  } catch (error) {
    // Manejar el error y mostrar un mensaje
    swal.close();
    Swal.fire('Error', 'Hubo un problema al enviar tu solicitud.', 'error');
  }
};
</script>

<style setup>

form input,
.ipt-file
  {
  font-size: 15px;
}

/* Aquí van tus estilos previos y los nuevos para el spinner */
.privacidad {
    color: var(--grayv2) !important;
    text-decoration: none !important;
}

.label-name {
    line-height: 1;
}

.contain-privacidad {
    display: flex;
    align-items: start;
    gap: 1rem;
    font-size: 14px;
}

.label-acreditacion-title {
    color: var(--black);
    font-weight: 500;
}

.container-radio-buttons .name-label {
    font-size: 14px;
    color: var(--black);
}




/* ESTILOS SWEETALERT - SPINNER */
.swal2-title,
.swal2-content,
.swal2-confirm,
.swal2-cancel {
    font-family: var(--roboto) !important;
}

</style>

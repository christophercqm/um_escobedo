<template>
  <form @submit.prevent="submitAcreditacion">
    <div class="mb-3">
      <label class="form-label label-acreditacion-title">Seleccione el tipo de acreditación:</label>
      <div class="container-radio-buttons d-flex gap-3">
        <!-- Radios para el tipo de acreditación -->
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

    <!-- Resto del formulario -->
    <div v-if="isCuerpoTecnicoODirectivo">
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Nombre" v-model="acreditacionData.nombre" required />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Apellidos" v-model="acreditacionData.apellido" required />
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

      <!-- Dropdown para elegir equipo -->
      <div v-if="isCuerpoTecnicoODirectivo" class="mb-3">
        <div class="dropdown">
          <button
            class="btn-public w-100 dropdown-toggle d-flex align-items-center"
            type="button"
            id="dropdownEquipo"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img v-if="selectedEquipo.logo_local" :src="`/storage/${selectedEquipo.logo_local}`" alt="Logo Local" class="w-5 h-5 me-2" />
            <span>{{ selectedEquipo.nombre ? selectedEquipo.nombre : 'Selecciona un equipo' }}</span>
          </button>
          <ul class="dropdown-menu w-100" aria-labelledby="dropdownEquipo" style="max-height: 300px; overflow-y: auto; border: 1px solid #ee1d36;">
            <li v-for="partido in partidos" :key="partido.id">
              <a
                class="dropdown-item d-flex align-items-center justify-content-around"
                href="#"
                @click.prevent="selectEquipo(partido)"
              >
                <img :src="`/storage/${partido.equipo_local.logo}`" alt="Logo Local" class="w-5 h-5 me-2" />
                {{ partido.equipo_local.nombre }} 
                <span class="mx-3 partido-fecha">{{ formatFecha(partido.fecha_hora) }}</span>
                {{ partido.equipo_visitante.nombre }}
                <img :src="`/storage/${partido.equipo_visitante.logo}`" alt="Logo Visitante" class="w-5 h-5 ms-2" />
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mb-3">
        <textarea class="form-control" placeholder="Asunto" v-model="acreditacionData.asunto" required rows="3"></textarea>
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

// Recibir la prop de partidos del componente padre
const props = defineProps({
  partidos: Array,
});

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
  proximo_encuentro: '',
  partido_id: ''
});

// Computed property para verificar el tipo de acreditación
const isCuerpoTecnicoODirectivo = computed(() => {
  return acreditacionData.value.tipo_acreditacion === 'cuerpo_tecnico' || acreditacionData.value.tipo_acreditacion === 'cuerpo_directivo';
});

// Manejar la selección de equipo
const selectedEquipo = ref({}); // Equipo seleccionado por defecto

// Función para seleccionar un equipo
const selectEquipo = (partido) => {
  selectedEquipo.value = {
    nombre: `${partido.equipo_local.nombre} vs ${partido.equipo_visitante.nombre}`,
    logo_local: partido.equipo_local.logo,
    logo_visitante: partido.equipo_visitante.logo,
  };
  acreditacionData.value.proximo_encuentro = selectedEquipo.value.nombre; // Guarda el nombre del equipo en el data
  acreditacionData.value.partido_id = partido.id; // Guarda el id del partido
};

// Manejar la carga de archivos
const handleFileUpload = (event) => {
  acreditacionData.value.archivo = event.target.files[0];
};

// Emitir evento para enviar los datos al componente padre
const emit = defineEmits(['submit-form']);

// Formatear la fecha para mostrarla adecuadamente
const formatFecha = (fechaHora) => {
  const options = { day: '2-digit', month: 'short' };
  return new Date(fechaHora).toLocaleDateString('es-ES', options).toUpperCase(); 
};

const submitAcreditacion = async () => {
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
    await new Promise((resolve) => {
      setTimeout(() => {
        resolve();
      }, 2000);
    });

    swal.close();
    Swal.fire('¡Listo!', 'Tu solicitud ha sido enviada.', 'success');
    emit('submit-form', { tipo: 'acreditacion', data: formData });
  } catch (error) {
    swal.close();
    Swal.fire('Error', 'Hubo un problema al enviar tu solicitud.', 'error');
  }
};
</script>


<style setup>
form input,
.ipt-file {
  font-size: 15px;
}

.label-acreditacion-title {
  color: var(--black);
  font-weight: 500;
}

.container-radio-buttons .name-label {
  font-size: 14px;
  color: var(--black);
}

/* Estilos para el dropdown */
.dropdown-menu {
  z-index: 1000; 
}

.dropdown-item {
  cursor: pointer;
  color: var(--grayv2) !important;
}

.w-5 {
  width: 20px;
  height: 20px; 
  height: auto; 
}

/* Estilo del dropdown */
.dropdown-menu { 
    overflow-y: auto; 
}

.dropdown-menu li{
  font-size: 15px;
}

/* Estilo del scroll */
.dropdown-menu::-webkit-scrollbar {
    width: 8px; 
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background-color: var(--red); 
    border-radius: 10px; 
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background-color: var(--red);
} 

.partido-fecha {
  font-size: 13px;
  color: var(--grayv2);
  font-weight: 500;
}


/* Efecto hover para las opciones del dropdown */
.dropdown-item:hover {
  background-color: rgba(0, 0, 0, .1); 
  color: white; 
}




</style>

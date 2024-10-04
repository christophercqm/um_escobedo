<template>
  <form @submit.prevent="submitAcreditacion">
    <div class="mb-3">
      <label class="form-label">Seleccione el tipo de acreditación:</label>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="arbitro" value="arbitro" v-model="acreditacionData.tipo" />
        <label class="form-check-label" for="arbitro">Árbitro</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="prensa" value="prensa" v-model="acreditacionData.tipo" />
        <label class="form-check-label" for="prensa">Prensa</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="cuerpo-tecnico" value="cuerpo_tecnico" v-model="acreditacionData.tipo" />
        <label class="form-check-label" for="cuerpo-tecnico">Cuerpo Técnico</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="cuerpo-directivo" value="cuerpo_directivo" v-model="acreditacionData.tipo" />
        <label class="form-check-label" for="cuerpo-directivo">Cuerpo Directivo</label>
      </div>
    </div>

    <!-- Mostrar campos específicos según el tipo de acreditación -->
    <div v-if="acreditacionData.tipo === 'arbitro'" class="mb-3">
      <input type="text" class="form-control" placeholder="Nombre del Árbitro" v-model="acreditacionData.nombre" required />
    </div>

    <div v-if="acreditacionData.tipo === 'prensa'" class="mb-3">
      <input type="text" class="form-control" placeholder="Nombre del Periodista" v-model="acreditacionData.nombre" required />
    </div>

    <div v-if="acreditacionData.tipo === 'cuerpo_tecnico'" class="mb-3">
      <input type="text" class="form-control" placeholder="Nombre del Miembro del Cuerpo Técnico" v-model="acreditacionData.nombre" required />
    </div>

    <div v-if="acreditacionData.tipo === 'cuerpo_directivo'" class="mb-3">
      <input type="text" class="form-control" placeholder="Nombre del Miembro del Cuerpo Directivo" v-model="acreditacionData.nombre" required />
    </div>

    <button type="submit" class="btn-public">Enviar</button>
  </form>
</template>

<script setup>
import { ref } from 'vue';

// Datos del formulario
const acreditacionData = ref({
  tipo: '',
  nombre: ''
});

// Definir la función emit para enviar eventos a componentes padres
const emit = defineEmits(['submit-acreditacion']);

const submitAcreditacion = () => {
  emit('submit-acreditacion', acreditacionData.value);
};
</script>

<style setup>
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
</style>
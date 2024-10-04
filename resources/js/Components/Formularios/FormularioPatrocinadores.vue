<template>
    <form @submit.prevent="submitPatrocinadores">
      <input type="hidden" name="tipo" value="patrocinadores" />
      <div class="mb-3">
        <input type="text" class="form-control" v-model="formData.empresa" required placeholder="Empresa" />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" v-model="formData.nombreRepresentante" required placeholder="Nombre del Representante" />
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" v-model="formData.email" required placeholder="Correo Electrónico" />
      </div>
      <div class="mb-3">
        <input type="tel" class="form-control" v-model="formData.telefono" required placeholder="Teléfono" />
      </div>
      <div class="mb-3">
        <textarea class="form-control" v-model="formData.asunto" required placeholder="Escribe tu mensaje" rows="3"></textarea>
      </div>
      <div class="form-check mb-3 contain-privacidad">
        <input type="checkbox" class="form-check-input" id="privacidad" v-model="formData.privacidad" required />
        <label class="form-check-label privacidad" for="privacidad">
          He leído y acepto la <a href="#">Política de Privacidad</a> y del <a href="#">Tratamiento de Formularios</a>
        </label>
      </div>
      <button type="submit" class="btn-public w-100" :disabled="!formData.privacidad">Enviar</button>
    </form>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Definir el objeto formData que contiene los datos del formulario
  const formData = ref({
    empresa: '',
    nombreRepresentante: '',
    email: '',
    telefono: '',
    asunto: '',
    privacidad: false,
  });
  
  // Usar defineEmits para emitir eventos al componente padre
  const emit = defineEmits(['submit-form']);
  
  // Definir la función submitPatrocinadores para emitir el evento y pasar los datos del formulario
  const submitPatrocinadores = () => {
    emit('submit-form', { tipo: 'patrocinadores', ...formData.value });
  };
  </script>
  
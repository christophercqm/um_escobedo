<template>
  <form @submit.prevent="submitPatrocinadores">
    <input type="hidden" name="tipo" value="patrocinadores" />
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        v-model="formData.empresa"
        required
        placeholder="Empresa"
        name="empresa"
      />
    </div>
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        v-model="formData.nombreRepresentante"
        required
        placeholder="Nombre del Representante"
        name="nombreRepresentante"
      />
    </div>
    <div class="mb-3">
      <input
        type="email"
        class="form-control"
        v-model="formData.email"
        required
        placeholder="Correo Electrónico"
        name="email"
      />
    </div>
    <div class="mb-3">
      <input
        type="tel"
        class="form-control"
        v-model="formData.telefono"
        required
        placeholder="Teléfono"
        name="telefono"
      />
    </div>
    <div class="mb-3">
      <textarea
        class="form-control"
        v-model="formData.mensaje"
        required
        placeholder="Escribe tu mensaje"
        rows="3"
        name="mensaje"
      ></textarea>
    </div>
    <div class="form-check mb-3 contain-privacidad">
      <input
        type="checkbox"
        class="form-check-input"
        id="privacidad"
        v-model="formData.privacidad"
        required
        name="privacidad"
      />
      <label class="form-check-label privacidad" for="privacidad">
        He leído y acepto la <a href="#">Política de Privacidad</a> y del <a href="#">Tratamiento de Formularios</a>
      </label>
    </div>
    <button
      type="submit"
      class="btn-public w-100"
      :disabled="!formData.privacidad"
    >
      Enviar
    </button>
  </form>
</template>

<script setup>
import { ref } from 'vue';
import Swal from 'sweetalert2'; // Importar SweetAlert2

const formData = ref({
  empresa: '',
  nombreRepresentante: '',
  email: '',
  telefono: '',
  mensaje: '',
  privacidad: false,
});

// Emitir evento al componente padre
const emit = defineEmits(['submit-form']);

const submitPatrocinadores = () => {
  console.log("submitPatrocinadores llamado"); // Depuración

  // Validar que los campos requeridos estén completos
  const valid = validateForm();

  if (!valid) {
      console.log("Formulario no válido"); // Depuración
      return; // No enviar el formulario si no es válido
  }

  console.log("Formulario válido, enviando datos:", formData.value); // Depuración

  // Emitir el evento con los datos del formulario
  emit("submit-form", { tipo: "patrocinadores", ...formData.value });

  // Mostrar mensaje de éxito después de que se haya enviado el formulario
  Swal.fire({
      title: "Éxito",
      text: "Mensaje enviado correctamente!",
      icon: "success",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#28a745",
      timer: 2000, // El modal se cierra automáticamente después de 2 segundos
      customClass: {
          confirmButton: 'swal-button-ok'
      }
  });

  // Reiniciar el formulario
  resetForm();
};

const validateForm = () => {
  const valid =
      formData.value.empresa &&
      formData.value.nombreRepresentante &&
      formData.value.email &&
      formData.value.mensaje;

  if (!valid) {
      alert("Por favor completa todos los campos requeridos."); // Mensaje de error
  }

  return valid;
};

// Función para reiniciar el formulario después del envío exitoso
const resetForm = () => {
  formData.value = {
      empresa: '',
      nombreRepresentante: '',
      email: '',
      telefono: '',
      mensaje: '',
      privacidad: false,
  };
};
</script>

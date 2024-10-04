<template>
    <form @submit.prevent="submitContactar">
      <input type="hidden" name="tipo" value="contactar" />
      <div class="mb-3">
        <input
          type="text"
          class="form-control"
          v-model="formData.nombre"
          placeholder="Nombre"
          name="nombre"
          required
        />
      </div>
      <div class="mb-3">
        <input
          type="text"
          class="form-control"
          v-model="formData.apellidos"
          placeholder="Apellidos"
          name="apellidos"
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
  import { ref } from "vue";
  import Swal from "sweetalert2"; // Importar SweetAlert2
  
  const formData = ref({
    nombre: "",
    apellidos: "",
    email: "",
    telefono: "",
    mensaje: "",
    privacidad: false,
  });
  
  // El segundo parámetro de setup contiene "emit"
  const emit = defineEmits(["submit-form"]);
  
  const submitContactar = () => {
    console.log("submitContactar llamado"); // Depuración
  
    // Validar que los campos requeridos estén completos
    const valid = validateForm();
  
    if (!valid) {
      console.log("Formulario no válido"); // Depuración
      return; // No enviar el formulario si no es válido
    }
  
    console.log("Formulario válido, enviando datos:", formData.value); // Depuración
  
    // Emitir el evento con los datos del formulario
    emit("submit-form", { tipo: "contactar", ...formData.value });
  
    // Aquí puedes mostrar un mensaje de éxito después de que se haya enviado el formulario
    Swal.fire({
      title: "Éxito",
      text: "Mensaje enviado correctamente!",
      icon: "success",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#ee1d36", 
      customClass: {
        confirmButton: 'swal-button-ok' 
      }
    });
  
    // Reiniciar el formulario
    resetForm();
  };
  
  const validateForm = () => {
    const valid =
      formData.value.nombre &&
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
      nombre: "",
      apellidos: "",
      email: "",
      telefono: "",
      mensaje: "",
      privacidad: false,
    };
  };
  </script>


<style setup>

.swal-button-ok {
  background-color: #28a745; 
  border: none; 
  color: white; 
  padding: 10px 20px; 
  border-radius: 5px; 
  font-size: 16px;
  cursor: pointer; 
}
input::placeholder,
textarea::placeholder {
    color: rgba(0, 0, 0, 0.5) !important;
    opacity: 1;
    font-size: 14px;
}

form input:not([type="checkbox"]) {
    padding: 14px;
}

.privacidad a {
    color: #0d6efd !important;
    text-decoration: none !important;
}

.button-group button.active {
    background-color: var(--red);
    color: white;
}
</style>

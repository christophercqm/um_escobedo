<template>
    <form @submit.prevent="submitContactar">
        <input type="hidden" name="tipo" value="contactar" />
        <div class="mb-3">
            <input
                type="text"
                class="form-control"
                v-model="formData.nombre"
                required
                placeholder="Nombre"
                name="nombre"
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
                He leído y acepto la <a href="#">Política de Privacidad</a> y
                del <a href="#">Tratamiento de Formularios</a>
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
    emit("submit-form", { tipo: "contactar", ...formData.value });
};
</script>

<style setup>
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

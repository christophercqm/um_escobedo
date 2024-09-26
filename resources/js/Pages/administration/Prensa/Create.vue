<template>
    <AuthenticatedLayout>
        <div class="container mt-5 max-width">
            <h1>Añadir Nueva Prensa</h1>
            <form @submit.prevent="submit">
                <!-- Campo Título -->
                <div class="mb-3">
                    <InputLabel for="titulo" value="Título" />
                    <input
                        type="text"
                        id="titulo"
                        v-model="form.titulo"
                        class="form-control"
                        required
                    />
                    <InputError
                        :message="form.errors.titulo"
                        class="text-danger"
                    />
                </div>

                <!-- Campo Descripción Breve -->
                <div class="mb-3">
                    <InputLabel for="descripcion_breve" value="Descripción Breve" />
                    <textarea
                        id="descripcion_breve"
                        v-model="form.descripcion_breve"
                        class="form-control"
                        rows="3"
                        required
                    ></textarea>
                    <InputError
                        :message="form.errors.descripcion_breve"
                        class="text-danger"
                    />
                </div>

                <!-- Campo Descripción Completa -->
                <div class="mb-3">
                    <InputLabel for="descripcion" value="Descripción Completa" />
                    <textarea
                        id="descripcion"
                        v-model="form.descripcion"
                        class="form-control"
                        rows="5"
                        required
                    ></textarea>
                    <InputError
                        :message="form.errors.descripcion"
                        class="text-danger"
                    />
                </div>

                <!-- Campo Imagen -->
                <div class="mb-3">
                    <InputLabel for="imagen" value="Seleccionar Imagen" />
                    <input
                        type="file"
                        id="imagen"
                        @change="handleImageUpload"
                        class="form-control"
                        accept="image/*"
                        required
                    />
                    <InputError
                        :message="form.errors.imagen"
                        class="text-danger"
                    />
                </div>

                <!-- Vista Previa de la Imagen -->
                <div class="mb-3" v-if="imagePreview">
                    <InputLabel for="preview" value="Vista Previa de la Imagen" />
                    <div class="img-prev">
                        <img
                            :src="imagePreview"
                            alt="Vista Previa"
                            class="img-fluid mt-2"
                        />
                    </div>
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="btn-admin" :disabled="form.processing">
                    Crear Prensa
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import Swal from 'sweetalert2';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

// Inicializa el formulario
const form = useForm({
    titulo: "",
    descripcion_breve: "",
    descripcion: "",
    imagen: null,
});

// Estado para la vista previa de la imagen
const imagePreview = ref(null);

// Manejar la subida de imagen
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        // Crea un objeto URL para la vista previa
        imagePreview.value = URL.createObjectURL(file);
        // Agrega la imagen a los datos del formulario
        form.imagen = file;
    } else {
        imagePreview.value = null; // Reinicia la vista previa si no hay archivo
    }
};

// Función para enviar el formulario
const submit = async () => {
    try {
        const response = await form.post(route("admin.prensa.store"));

        // Mostrar mensaje de éxito al crear
        Swal.fire({
            title: 'Éxito!',
            text: 'Prensa creada exitosamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar',
        }).then(() => {
            // Redirigir al índice después de aceptar el mensaje
            window.location.href = route("admin.prensa"); // Cambia esto si tienes otra forma de redirigir
        });

    } catch (errors) {
        // Mostrar mensaje de error
        Swal.fire({
            title: 'Error!',
            text: 'Ocurrió un error al crear la prensa.',
            icon: 'error',
            confirmButtonText: 'Aceptar',
        });
    }
};
</script>

<style scoped>
.container {
    max-width: 800px; /* Opcional: limitar el ancho del contenedor */
}
.img-fluid {
    max-width: 100%;
    height: auto;
}

.img-prev {
    width: 200px;
}
</style>

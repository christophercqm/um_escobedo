<template>
    <AuthenticatedLayout>
        <Head title="Crear Artículo" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Artículo
            </h2>
        </template>
        <div class="container mt-5 max-width">
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
                <button
                    type="submit"
                    class="btn-admin"
                    :disabled="form.processing"
                >
                    Crear Prensa
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from "vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
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
function submit() {
    // Confirma la acción de creación
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Estás a punto de crear un nuevo artículo.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, crear artículo!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            form.post(route("admin.prensa.store"), {
                onSuccess: () => {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Artículo creado con éxito.",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(() => {
                        // Redireccionar manualmente si necesitas que vuelva a cargar la página o cambie a otra vista
                        window.location.href = route("admin.prensa"); // Puedes cambiar a la ruta que desees
                    });
                },
                onError: () => {
                    const errorMessages = Object.values(form.errors).flat().join(", ");
                    Swal.fire({
                        title: "Error",
                        text: errorMessages || "Ocurrió un error inesperado.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
            });
        }
    });
}
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

<template>
    <AuthenticatedLayout>
        <Head title="Crear Equipo" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Equipo
            </h2>
        </template>

        <div class="container mt-5 max-width">
            <form @submit.prevent="submit">
                <!-- Campo Nombre -->
                <div class="mb-3">
                    <InputLabel for="nombre" value="Nombre del Equipo *" />
                    <input
                        type="text"
                        id="nombre"
                        v-model="form.nombre"
                        class="form-control"
                        required
                    />
                    <InputError
                        :message="form.errors.nombre"
                        class="text-danger"
                    />
                </div>

                <!-- Campo Ciudad -->
                <div class="mb-3">
                    <InputLabel for="ciudad" value="Ciudad" />
                    <input
                        type="text"
                        id="ciudad"
                        v-model="form.ciudad"
                        class="form-control"
                    />
                    <InputError
                        :message="form.errors.ciudad"
                        class="text-danger"
                    />
                </div>

                <!-- Campo País -->
                <div class="mb-3">
                    <InputLabel for="pais" value="País" />
                    <input
                        type="text"
                        id="pais"
                        v-model="form.pais"
                        class="form-control"
                    />
                    <InputError
                        :message="form.errors.pais"
                        class="text-danger"
                    />
                </div>

                <!-- Campo Logo -->
                <div class="mb-3">
                    <InputLabel for="logo" value="Subir Logo *" />
                    <input
                        type="file"
                        id="logo"
                        @change="handleLogoUpload"
                        class="form-control"
                        accept="image/*"
                        required
                    />
                    <InputError
                        :message="form.errors.logo"
                        class="text-danger"
                    />
                </div>

                <!-- Vista Previa del Logo -->
                <div class="mb-3" v-if="imagePreview">
                    <InputLabel for="preview" value="Vista Previa del Logo" />
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
                    Crear Equipo
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
    nombre: "",
    ciudad: "",
    pais: "",
    logo: null,
});

// Estado para la vista previa de la imagen
const imagePreview = ref(null);

// Manejar la subida de logo
const handleLogoUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        // Crea un objeto URL para la vista previa
        imagePreview.value = URL.createObjectURL(file);
        // Agrega la imagen a los datos del formulario
        form.logo = file;
    } else {
        imagePreview.value = null; // Reinicia la vista previa si no hay archivo
    }
};

// Función para enviar el formulario
function submit() {
    // Confirmación de creación
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Estás a punto de crear un nuevo equipo.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, crear equipo!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            form.post(route("equipos.store"), {
                onSuccess: () => {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Equipo creado con éxito.",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                },
                onError: () => {
                    const errorMessages = Object.values(form.errors)
                        .flat()
                        .join(", ");
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
    max-width: 800px; /* Limitar el ancho del contenedor */
}
.img-fluid {
    max-width: 100%;
    height: auto;
}

.img-prev {
    width: 200px;
}
</style>

<template>
    <AuthenticatedLayout>
        <Head title="Crear Miembro de la Junta" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Miembro de la Junta
            </h2>
        </template>

        <div class="container mt-5 max-width">
            <form @submit.prevent="submit">
                <!-- Campo Nombre -->
                <div class="mb-3">
                    <InputLabel for="nombre" value="Nombre *" />
                    <input type="text" id="nombre" v-model="form.nombre" class="form-control" required />
                    <InputError :message="form.errors.nombre" class="text-danger" />
                </div>

                <!-- Campo Cargo -->
                <div class="mb-3">
                    <InputLabel for="cargo" value="Cargo *" />
                    <input type="text" id="cargo" v-model="form.cargo" class="form-control" required />
                    <InputError :message="form.errors.cargo" class="text-danger" />
                </div>

                <!-- Campo Estado -->
                <div class="mb-3">
                    <InputLabel for="estado" value="Estado *" />
                    <select id="estado" v-model="form.estado" class="form-control" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <InputError :message="form.errors.estado" class="text-danger" />
                </div>

                <!-- Campo Foto -->
                <div class="mb-3">
                    <InputLabel for="foto_url" value="Subir Foto *" />
                    <input type="file" id="foto_url" @change="handleImageUpload" class="form-control" accept="image/*" required />
                    <InputError :message="form.errors.foto_url" class="text-danger" />
                </div>

                <!-- Vista Previa de la Foto -->
                <div class="mb-3" v-if="imagePreview">
                    <InputLabel for="preview" value="Vista Previa de la Foto" />
                    <div class="img-prev">
                        <img :src="imagePreview" alt="Vista Previa" class="img-fluid mt-2" />
                    </div>
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="btn-admin" :disabled="form.processing">
                    Crear Miembro de la Junta
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
    cargo: "",
    estado: "Activo", // Valor por defecto
    foto_url: null,
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
        form.foto_url = file;
    } else {
        imagePreview.value = null; // Reinicia la vista previa si no hay archivo
    }
};

// Función para enviar el formulario
function submit() {
    // Confirmación de creación
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Estás a punto de crear un nuevo miembro de la junta.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, crear miembro!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            form.post(route("admin.junta.store"), { 
                onSuccess: () => {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Miembro de la junta creado con éxito.",
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
    max-width: 800px;
    /* Limitar el ancho del contenedor */
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.img-prev {
    width: 200px;
}
</style>

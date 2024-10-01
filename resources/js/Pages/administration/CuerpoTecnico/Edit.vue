<template>
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 space-y-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Cuerpo Técnico
            </h2>

            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <!-- Nombres -->
                <div class="mb-4">
                    <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
                    <input
                        v-model="form.nombres"
                        id="nombres"
                        type="text"
                        class="mt-1 block w-full"
                        :class="errors.nombres ? 'border-red-500' : ''"
                    />
                    <span v-if="errors.nombres" class="text-red-500 text-sm">{{ errors.nombres }}</span>
                </div>

                <!-- Apellidos -->
                <div class="mb-4">
                    <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input
                        v-model="form.apellidos"
                        id="apellidos"
                        type="text"
                        class="mt-1 block w-full"
                        :class="errors.apellidos ? 'border-red-500' : ''"
                    />
                    <span v-if="errors.apellidos" class="text-red-500 text-sm">{{ errors.apellidos }}</span>
                </div>

                <!-- Rol -->
                <div class="mb-4">
                    <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                    <input
                        v-model="form.rol"
                        id="rol"
                        type="text"
                        class="mt-1 block w-full"
                        :class="errors.rol ? 'border-red-500' : ''"
                    />
                    <span v-if="errors.rol" class="text-red-500 text-sm">{{ errors.rol }}</span>
                </div>

                <!-- Estado -->
                <div class="mb-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select v-model="form.estado" id="estado" class="mt-1 block w-full" :class="errors.estado ? 'border-red-500' : ''">
                        <option value="">Selecciona el estado</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <span v-if="errors.estado" class="text-red-500 text-sm">{{ errors.estado }}</span>
                </div>

                <!-- Foto -->
                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input
                        type="file"
                        id="foto"
                        @change="handleFileUpload"
                        class="mt-1 block w-full"
                        :class="errors.foto ? 'border-red-500' : ''"
                    />
                    <span v-if="errors.foto" class="text-red-500 text-sm">{{ errors.foto }}</span>
                </div>

                <!-- Vista previa de la imagen -->
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700">Vista previa de la imagen:</h3>
                    <img
                        :src="imagePreview || getFullPath(form.fotoUrl)" 
                        alt="Vista previa"
                        v-if="imagePreview || form.fotoUrl"
                        class="mt-2 w-40 h-40 object-cover border img-prev"
                    />
                </div>

                <!-- Botón de Enviar -->
                <div class="mt-6">
                    <button type="submit" class="btn-escobedo btn-admin">
                        Actualizar Cuerpo Técnico
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    cuerpoTecnico: {
        type: Object,
        required: true,
    }
});

const form = ref({
    nombres: '',
    apellidos: '',
    rol: '',
    estado: '',
    foto: null,
    fotoUrl: props.cuerpoTecnico.foto, // URL de la foto existente
});

const errors = ref({});
const imagePreview = ref(null);

// Cargar datos del cuerpo técnico al montar el componente
onMounted(() => {
    form.value.nombres = props.cuerpoTecnico.nombres;
    form.value.apellidos = props.cuerpoTecnico.apellidos;
    form.value.rol = props.cuerpoTecnico.rol;
    form.value.estado = props.cuerpoTecnico.estado;
});

// Función para obtener la ruta completa de la imagen
const getFullPath = (path) => {
    if (path) {
        return `${window.location.origin}/storage/${path}`;
    }
    return null;
};

// Manejar la carga de archivos
const handleFileUpload = (event) => {
    const file = event.target.files[0];
    form.value.foto = file;

    // Crear un objeto URL para mostrar la vista previa
    if (file) {
        imagePreview.value = URL.createObjectURL(file);
    } else {
        imagePreview.value = null;
    }
};

const submitForm = () => {
    const formData = new FormData();
    formData.append('nombres', form.value.nombres);
    formData.append('apellidos', form.value.apellidos);
    formData.append('rol', form.value.rol);
    formData.append('estado', form.value.estado);
    if (form.value.foto) {
        formData.append('foto', form.value.foto);
    }

    // Realizar la solicitud de actualización
    Inertia.put(route('cuerpo-tecnico.update', props.cuerpoTecnico.id), formData, {
        onError: (err) => {
            errors.value = err;
        },
        onSuccess: () => {
            // Reiniciar el formulario si es exitoso
            form.value.nombres = '';
            form.value.apellidos = '';
            form.value.rol = '';
            form.value.estado = '';
            form.value.foto = null;
            imagePreview.value = null; // Reiniciar vista previa
        }
    });
};
</script>

<style>
.img-fluid {
    max-width: 100%;
    height: auto;
}

.img-prev {
    width: 200px;
}
</style>

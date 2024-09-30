<template>
    <AuthenticatedLayout>
        <Head title="Editar Artículo" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Artículo
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
                    <InputError :message="form.errors.titulo" class="text-danger" />
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
                    <InputError :message="form.errors.descripcion_breve" class="text-danger" />
                </div>

                <!-- Campo Descripción Completa -->
                <div class="mb-3">
                    <InputLabel for="descripcion" value="Descripción Completa" />
                    <div ref="editor" class="quill-editor"></div>
                    <InputError :message="form.errors.descripcion" class="text-danger" />
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
                    />
                    <InputError :message="form.errors.imagen" class="text-danger" />
                </div>

                <!-- Vista Previa de la Imagen (si existe o se sube una nueva) -->
                <div class="mb-3" v-if="imagePreview || form.imagen_url">
                    <InputLabel for="preview" value="Vista Previa de la Imagen" />
                    <div class="img-prev">
                        <img
                            :src="imagePreview || form.imagen_url"
                            alt="Vista Previa"
                            class="img-fluid mt-2 img-articulo"
                        />
                    </div>
                </div>

                <!-- Campo Estado -->
                <div class="mb-3">
                    <InputLabel for="estado" value="Estado" />
                    <select id="estado" v-model="form.estado" class="form-control" required>
                        <option value="1">Publicar</option>
                        <option value="0">Ocultar</option>
                    </select>
                    <InputError :message="form.errors.estado" class="text-danger" />
                </div>

                <!-- Campo Categoría -->
                <div class="mb-3">
                    <InputLabel for="categoria" value="Categoría" />
                    <select id="categoria" v-model="form.categoria" class="form-control" required>
                        <option value="actualidad">Actualidad</option>
                        <option value="cronicas">Crónicas</option>
                    </select>
                    <InputError :message="form.errors.categoria" class="text-danger" />
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="btn-admin" :disabled="form.processing">
                    Guardar cambios
                </button>
            </form>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Quill from "quill"; // Importar Quill
import "quill/dist/quill.snow.css"; // Importar estilos de Quill

const props = defineProps({
    articulo: Object, // Datos del artículo cargado para editar
});

// Inicializa el formulario con los datos del artículo
const form = useForm({
    titulo: props.articulo.titulo,
    descripcion_breve: props.articulo.descripcion_breve,
    descripcion: props.articulo.descripcion, // Iniciar con HTML si es necesario
    imagen: null,
    estado: props.articulo.estado.toString(),
    categoria: props.articulo.categoria,
});

// Estado para la vista previa de la imagen
const imagePreview = ref(null);

// Si existe una URL de la imagen en el artículo, la inicializamos
if (props.articulo.imagen) {
    form.imagen_url = `/storage/${props.articulo.imagen}`;
    imagePreview.value = form.imagen_url; // Inicializamos la vista previa
}

// Inicializa el editor Quill
const editor = ref(null);
let quill; // Variable para almacenar la instancia de Quill

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: "snow",
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }], // Agrega un menú para encabezados (1 y 2) o 'false' para párrafos
                ["bold", "italic", "underline"],
                ["blockquote", "code-block"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["link", "image"],
                ["clean"], // Botón para eliminar formato
            ],
        },
    });

    // Cargar contenido existente en el editor
    quill.root.innerHTML = cleanDescription(form.descripcion);

    // Manejar el cambio de texto en el editor
    quill.on("text-change", () => {
        form.descripcion = quill.root.innerHTML; // Guardamos el contenido cada vez que cambia
    });
});

// Limpiar la descripción de párrafos vacíos y <br> innecesarios
function cleanDescription(html) {
    // Crear un contenedor temporal para manipular el HTML
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;

    // Eliminar <br> innecesarios
    tempDiv.querySelectorAll('br').forEach((br) => {
        if (br.nextSibling === null || br.nextSibling.nodeName === 'BR') {
            br.remove();
        }
    });

    // Eliminar párrafos vacíos
    tempDiv.querySelectorAll('p').forEach((p) => {
        if (p.innerHTML.trim() === '') {
            p.remove();
        }
    });

    return tempDiv.innerHTML;
}

// Manejar la subida de imagen
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        imagePreview.value = URL.createObjectURL(file);
        form.imagen = file;
    } else {
        imagePreview.value = null; // Reinicia la vista previa si no hay archivo
    }
};

// Función para enviar el formulario
function submit() {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Estás a punto de actualizar este artículo.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, actualizar!",
    }).then(({ isConfirmed }) => {
        if (isConfirmed) {
            form.put(route("admin.prensa.update", props.articulo.id), {
                onSuccess: () => {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Artículo actualizado con éxito.",
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
.quill-editor {
    height: 300px; /* Ajusta la altura según lo necesites */
}

.img-articulo {
    width: 200px; /* Ajusta el tamaño de la imagen previa */
}
</style>

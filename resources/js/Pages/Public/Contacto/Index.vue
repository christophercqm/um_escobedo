<template>
    <GuestLayout>
        <div class="contacto-index padding-container">
            <div class="container max-width">
                <div class="row row-detail-notice d-flex justify-content-md-between">
                    <div class="col-12 col-md-5">
                        <div class="contain-info mb-5 mb-md-0 fade-in">
                            <!-- Información de contacto -->
                            <InfoContacto />
                        </div>
                    </div>

                    <div class="col-md-5">
                        <!-- Botones para seleccionar el formulario -->
                        <div class="button-group mb-3">
                            <button
                                :class="[
                                    'btn-contactar',
                                    { active: selectedForm === 'contactar' },
                                ]"
                                @click="selectedForm = 'contactar'"
                            >
                                Contactar
                            </button>
                            <button
                                :class="[
                                    'btn-contactar',
                                    { active: selectedForm === 'acreditacion' },
                                ]"
                                @click="selectedForm = 'acreditacion'"
                            >
                                Acreditación
                            </button>
                            <button
                                :class="[
                                    'btn-contactar',
                                    { active: selectedForm === 'patrocinadores' },
                                ]"
                                @click="selectedForm = 'patrocinadores'"
                            >
                                Patrocinadores
                            </button>
                        </div>

                        <!-- Mostrar el formulario según la selección -->
                        <div
                            v-if="selectedForm === 'contactar'"
                            :class="{ 'fade-in': selectedForm === 'contactar' }"
                        >
                            <FormularioContactar
                                @submit-form="handleSubmitForm"
                            />
                        </div>
                        <div
                            v-if="selectedForm === 'acreditacion'"
                            :class="{ 'fade-in': selectedForm === 'acreditacion' }"
                        >
                            <FormularioAcreditacion
                                :partidos="partidos"
                                @submit-form="handleSubmitForm"
                            />
                        </div>
                        <div
                            v-if="selectedForm === 'patrocinadores'"
                            :class="{ 'fade-in': selectedForm === 'patrocinadores' }"
                        >
                            <FormularioPatrocinadores
                                @submit-form="handleSubmitForm"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="partido in partidos" :key="partido.id">
                <pre>{{ partido }}</pre> 
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InfoContacto from "@/Components/Contacto/InfoContacto.vue";
import FormularioContactar from "@/Components/Formularios/FormularioContactar.vue";
import FormularioAcreditacion from "@/Components/Formularios/FormularioAcreditacion.vue";
import FormularioPatrocinadores from "@/Components/Formularios/FormularioPatrocinadores.vue";

// Estado del formulario seleccionado
const selectedForm = ref("contactar");
const partidos = ref([]); // Declaración de la lista de partidos

// Propiedades recibidas
const props = defineProps({
    partidos: Array, 
});

// Inicializar la lista de partidos a partir de las props
onMounted(() => {
    partidos.value = props.partidos; // Asigna los partidos recibidos desde las props
});

// Manejar el envío del formulario
const handleSubmitForm = (formData) => {
    if (formData.tipo === "contactar") {
        Inertia.post(route("contactar.store"), formData);
    } else if (formData.tipo === "acreditacion") {
        Inertia.post(route("formulario.acreditacion"), formData.data);
    } else if (formData.tipo === "patrocinadores") {
        Inertia.post(route("patrocinadores.store"), formData);
    }
};
</script>

<style scoped>
.button-group button {
    padding: 10px;
    margin: 5px;
    border: var(--red);
    cursor: pointer;
    border-radius: var(--border);
}

.btn-contactar {
    margin-left: 0 !important;
    border: 1px solid var(--red) !important;
    color: var(--red);
}
</style>

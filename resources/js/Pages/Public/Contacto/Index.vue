<template>
    <GuestLayout>
        <div class="contacto-index padding-container">
            <div class="container max-width">
                <div class="row row-detail-notice d-flex justify-content-md-between">
                    <div class="col-12 col-md-5">
                        <div class="contain-info mb-5 mb-md-0">
                            <!-- Información de contacto -->
                            <InfoContacto />
                        </div>  
                    </div>

                    <div class="col-md-5">
                        <!-- Botones para seleccionar el formulario -->
                        <div class="button-group mb-3">
                            <button 
                                :class="['btn-contactar', { active: selectedForm === 'contactar' }]" 
                                @click="selectedForm = 'contactar'"
                            >
                                Contactar
                            </button>
                            <button 
                                :class="['btn-contactar', { active: selectedForm === 'acreditacion' }]" 
                                @click="selectedForm = 'acreditacion'"
                            >
                                Acreditación
                            </button>
                            <button 
                                :class="['btn-contactar', { active: selectedForm === 'patrocinadores' }]" 
                                @click="selectedForm = 'patrocinadores'"
                            >
                                Patrocinadores
                            </button>
                        </div>

                        <!-- Mostrar el formulario según la selección -->
                        <div :class="{ 'fade-in': selectedForm === 'contactar' }" v-if="selectedForm === 'contactar'">
                            <FormularioContactar @submit-form="handleSubmitForm" />
                        </div>
                        <div :class="{ 'fade-in': selectedForm === 'acreditacion' }" v-if="selectedForm === 'acreditacion'">
                            <FormularioAcreditacion @submit-form="handleSubmitForm" />
                        </div>
                        <div :class="{ 'fade-in': selectedForm === 'patrocinadores' }" v-if="selectedForm === 'patrocinadores'">
                            <FormularioPatrocinadores @submit-form="handleSubmitForm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InfoContacto from '@/Components/Contacto/InfoContacto.vue';
import FormularioContactar from '@/Components/Formularios/FormularioContactar.vue';
import FormularioAcreditacion from '@/Components/Formularios/FormularioAcreditacion.vue';
import FormularioPatrocinadores from '@/Components/Formularios/FormularioPatrocinadores.vue';

// Estado del formulario seleccionado
const selectedForm = ref('contactar');

const handleSubmitForm = (formData) => {
    // Envío de datos utilizando Inertia a la ruta "contactar.store"
    if (formData.tipo === 'contactar') {
        Inertia.post(route('contactar.store'), formData);
    } else if (formData.tipo === 'acreditacion') {
        Inertia.post(route('formulario.acreditacion'), formData);
    } else if (formData.tipo === 'patrocinadores') {
        Inertia.post(route('patrocinadores.store'), formData);
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

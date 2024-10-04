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
                            <button :class="['btn-contactar', { active: selectedForm === 'contactar' }]" @click="selectedForm = 'contactar'">Contactar</button>
                            <button :class="['btn-contactar', { active: selectedForm === 'acreditacion' }]" @click="selectedForm = 'acreditacion'">Acreditación</button>
                            <button :class="['btn-contactar', { active: selectedForm === 'patrocinadores' }]" @click="selectedForm = 'patrocinadores'">Patrocinadores</button>
                        </div>
                      

                         <!-- Mostrar el formulario según la selección -->
                        <FormularioContactar v-if="selectedForm === 'contactar'" @submit-form="handleSubmitForm" />
                        <FormularioAcreditacion v-if="selectedForm === 'acreditacion'" @submit-form="handleSubmitForm" />
                        <FormularioPatrocinadores v-if="selectedForm === 'patrocinadores'" @submit-form="handleSubmitForm" />

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

// Importar información de Contacto
import InfoContacto from '@/Components/Contacto/InfoContacto.vue';

// Importar los componentes del formulario
import FormularioContactar from '@/Components/Formularios/FormularioContactar.vue';
import FormularioAcreditacion from '@/Components/Formularios/FormularioAcreditacion.vue';
import FormularioPatrocinadores from '@/Components/Formularios/FormularioPatrocinadores.vue';

// Estado del formulario seleccionado
const selectedForm = ref('contactar');

const handleSubmitForm = (formData) => {
  // Envío de datos utilizando Inertia
  if (formData.tipo === 'acreditacion') {
    Inertia.post(route('formulario.acreditacion'), formData.data);
  } else if (formData.tipo === 'contactar') {
    Inertia.post(route('contacto.enviar'), formData.data);
  } else if (formData.tipo === 'patrocinadores') {
    Inertia.post(route('contacto.enviar'), formData.data);
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

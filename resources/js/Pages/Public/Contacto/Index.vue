<template>
    <GuestLayout>
        <div class="prensa-show padding-container">
            <div class="container max-width">
                <div
                    class="row row-detail-notice d-flex justify-content-md-between"
                >
                    <div class="col-12 col-md-5">
                        <div class="contain-info">
                            <h2 class="text-uppercase llamanos">Llámanos</h2>
                            <h2 class="title-contact">Datos de contacto</h2>
                            <p class="mt-3 mb-5 desc-contact">
                                Si tienes alguna duda con alguno de nuestros
                                servicios, alguna incidencia o simplemente estás
                                valorando hacer alguna instalación de
                                fontanería, estos son nuestras formas de
                                contacto.
                            </p>

                            <div class="data-contact">
                                <!-- EMAIL -->
                                <div class="email d-flex gap-3">
                                    <span>
                                        <i
                                            class="bi bi-envelope-at-fill icon"
                                        ></i>
                                    </span>
                                    <div class="email-info">
                                        <h3 class="m-0 label-name">
                                            Correo electrónico
                                        </h3>
                                        <span class="info"
                                            >comunicacion@umescobedo.com</span
                                        >
                                    </div>
                                </div>

                                <!-- TELEFONO -->
                                <div class="tel d-flex gap-3">
                                    <span>
                                        <i
                                            class="bi bi-telephone-fill icon"
                                        ></i>
                                    </span>
                                    <div class="tel-info">
                                        <h3 class="m-0 label-name">
                                            Teléfonos
                                        </h3>
                                        <span class="info">123456789</span>
                                    </div>
                                </div>

                                <!-- UBICACIÓN -->
                                <div class="ubicacion d-flex gap-3">
                                    <span>
                                        <i class="bi bi-geo-alt-fill icon"></i>
                                    </span>
                                    <div class="ubicacion-info">
                                        <h3 class="m-0 label-name">
                                            Ubiacación
                                        </h3>
                                        <span class="info">Bº ARENAS S/N</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- Botones para seleccionar el formulario -->
                        <div class="button-group">
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
                                :class="{
                                    active: selectedForm === 'acreditacion',
                                }"
                                @click="selectedForm = 'acreditacion'"
                            >
                                Acreditación
                            </button>
                            <button
                                :class="{
                                    active: selectedForm === 'patrocinadores',
                                }"
                                @click="selectedForm = 'patrocinadores'"
                            >
                                Patrocinadores
                            </button>
                        </div>

                        <!-- Formulario dinámico basado en el botón seleccionado -->
                        <div class="form-container">
                            <form
                                v-if="selectedForm === 'contactar'"
                                class="d-flex flex-column"
                                @submit.prevent="submitContactar"
                            >
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="contactarData.nombre"
                                        required
                                        placeholder="Nombre"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="contactarData.apellidos"
                                        required
                                        placeholder="Apellidos"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="email"
                                        class="form-control"
                                        v-model="contactarData.email"
                                        required
                                        placeholder="Correo Electrónico"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="tel"
                                        class="form-control"
                                        v-model="contactarData.telefono"
                                        required
                                        placeholder="Teléfono"
                                    />
                                </div>

                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        v-model="contactarData.mensaje"
                                        required
                                        placeholder="Escribe tu mensaje"
                                    ></textarea>
                                </div>

                                <div class="form-check mb-3 contain-privacidad">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="privacidad"
                                        v-model="contactarData.privacidad"
                                        required
                                    />
                                    <label
                                        class="form-check-label privacidad"
                                        for="privacidad"
                                    >
                                        He leído y acepto la
                                        <a href="#">Política de Privacidad</a>
                                        y del
                                        <a href="#"
                                            >Tratamiento de Formularios</a
                                        >
                                    </label>
                                </div>

                                <button
                                    type="submit"
                                    class="btn-public"
                                    :disabled="!contactarData.privacidad"
                                >
                                    Enviar
                                </button>
                            </form>
                            <form
                                v-if="selectedForm === 'acreditacion'"
                                @submit.prevent="submitAcreditacion"
                            >
                                <input
                                    type="text"
                                    placeholder="Campo Acreditación"
                                    v-model="acreditacionData.campo"
                                />
                                <button type="submit">Enviar</button>
                            </form>
                            <form
                                v-if="selectedForm === 'patrocinadores'"
                                class="d-flex flex-column"
                                @submit.prevent="submitPatrocinadores"
                            >
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="patrocinadoresData.empresa"
                                        required
                                        placeholder="Empresa"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="
                                            patrocinadoresData.nombreRepresentante
                                        "
                                        required
                                        placeholder="Nombre del Representante"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="email"
                                        class="form-control"
                                        v-model="patrocinadoresData.email"
                                        required
                                        placeholder="Correo Electrónico"
                                    />
                                </div>

                                <div class="mb-3">
                                    <input
                                        type="tel"
                                        class="form-control"
                                        v-model="patrocinadoresData.telefono"
                                        required
                                        placeholder="Teléfono"
                                    />
                                </div>

                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        v-model="patrocinadoresData.asunto"
                                        required
                                        placeholder="Asunto"
                                        rows="3"
                                    ></textarea>
                                </div>

                                <div class="form-check mb-3 contain-privacidad">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="privacidadPatrocinadores"
                                        v-model="patrocinadoresData.privacidad"
                                        required
                                    />
                                    <label
                                        class="form-check-label privacidad"
                                        for="privacidadPatrocinadores"
                                    >
                                        He leído y acepto la
                                        <a href="#">Política de Privacidad</a>
                                        y del
                                        <a href="#"
                                            >Tratamiento de Formularios</a
                                        >
                                    </label>
                                </div>

                                <button type="submit" class="btn-public">
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue"; // Importa 'ref' para manejar datos reactivos
import GuestLayout from "@/Layouts/GuestLayout.vue";

// Manejo del formulario seleccionado
const selectedForm = ref("contactar");

// Datos de los diferentes formularios
const contactarData = ref({ campo: "" });
const acreditacionData = ref({ campo: "" });
const patrocinadoresData = ref({ campo: "" });

// Funciones para manejar el envío de formularios
const submitContactar = () => {
    console.log("Formulario Contactar:", contactarData.value);
};

const submitAcreditacion = () => {
    console.log("Formulario Acreditación:", acreditacionData.value);
};

const submitPatrocinadores = () => {
    console.log("Formulario Patrocinadores:", patrocinadoresData.value);
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

.button-group button.active {
    background-color: var(--red);
    color: white;
}

.form-container {
    margin-top: 20px;
}

input {
    display: block;
    margin-bottom: 10px;
    padding: 5px;
}

.icon {
    color: var(--red);
    font-size: 25px;
    line-height: normal;
}

.label-name {
    line-height: 1;
}

.data-contact {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.llamanos {
    font-size: 1.5rem;
    font-weight: 600;
}

.title-contact {
    font-size: 2.5rem;
    font-weight: 600;
}

.desc-contact {
    font-size: 0.9rem;
}

form label {
    color: var(--black);
}

form input:not([type="checkbox"]) {
    padding: 14px;
}

input::placeholder,
textarea::placeholder {
    color: rgba(0, 0, 0, 0.5);
    opacity: 1;
    font-size: 15px;
}

.btn-contactar {
    margin-left: 0 !important;
}
.privacidad {
    color: var(--grayv2) !important;
    text-decoration: none !important;
}

.privacidad a {
    color: #0d6efd !important;
    text-decoration: none !important;
}

.contain-privacidad {
    display: flex;
    align-items: start;
    gap: 1rem;
    font-size: 14px;
}
</style>

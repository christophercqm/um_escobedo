<template>
    <form @submit.prevent="submitAcreditacion">
        <!-- Selección del tipo de acreditación -->
        <div class="mb-3">
            <label class="form-label label-acreditacion-title"
                >Seleccione el tipo de acreditación:</label
            >
            <div class="container-radio-buttons d-flex gap-3">
                <!-- Radios para el tipo de acreditación -->
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input p-0"
                        id="arbitro"
                        value="arbitro"
                        v-model="acreditacionData.tipo_acreditacion"
                        required
                        @change="applyFadeIn"
                    />
                    <label class="form-check-label name-label" for="arbitro"
                        >Árbitro</label
                    >
                </div>
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input p-0"
                        id="prensa"
                        value="prensa"
                        v-model="acreditacionData.tipo_acreditacion"
                        required
                        @change="applyFadeIn"
                    />
                    <label class="form-check-label name-label" for="prensa"
                        >Prensa</label
                    >
                </div>
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input p-0"
                        id="cuerpo-tecnico"
                        value="cuerpo_tecnico"
                        v-model="acreditacionData.tipo_acreditacion"
                        required
                        @change="applyFadeIn"
                    />
                    <label
                        class="form-check-label name-label"
                        for="cuerpo-tecnico"
                        >Cuerpo Técnico</label
                    >
                </div>
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input p-0"
                        id="cuerpo-directivo"
                        value="cuerpo_directivo"
                        v-model="acreditacionData.tipo_acreditacion"
                        @change="applyFadeIn"
                        required
                    />
                    <label
                        class="form-check-label name-label"
                        for="cuerpo-directivo"
                        >Cuerpo Directivo</label
                    >
                </div>
            </div>
        </div>

        <!-- Campos adicionales si es Cuerpo Técnico o Directivo -->
        <div
            v-if="isCuerpoTecnicoODirectivo"
            :class="{ 'fade-in': fadeInActive }"
        >
            <div class="mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Nombre"
                    v-model="acreditacionData.nombre"
                    required
                />
            </div>
            <div class="mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Apellidos"
                    v-model="acreditacionData.apellido"
                    required
                />
            </div>
            <div class="mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="DNI"
                    v-model="acreditacionData.dni"
                    required
                />
            </div>
            <div class="mb-3">
                <input
                    type="email"
                    class="form-control"
                    placeholder="Correo Electrónico"
                    v-model="acreditacionData.correo"
                    required
                />
            </div>
            <div class="mb-3">
                <input
                    type="tel"
                    class="form-control"
                    placeholder="Teléfono"
                    v-model="acreditacionData.telefono"
                    required
                />
            </div>

            <!-- DROPDOWN - SELECCIONAR CLUB AL QUE PERTENECE -->
            <div class="mb-3">
                <div class="dropdown">
                    <button
                        class="btn-public w-100 dropdown-toggle d-flex align-items-center dropdown-partidos"
                        type="button"
                        id="dropdownClub"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <!-- Aquí se muestran tanto el logo como el nombre del club seleccionado -->
                        <img
                            v-if="selectedClub && selectedClub.logo"
                            :src="`/storage/${selectedClub.logo}`"
                            alt="Logo"
                            class="w-5 h-5 me-2"
                        />
                        <span>{{
                            selectedClub
                                ? selectedClub.nombre
                                : "Seleccione el club al que pertenece"
                        }}</span>
                    </button>

                    <ul
                        class="dropdown-menu w-100"
                        aria-labelledby="dropdownClub"
                        style="
                            max-height: 300px;
                            overflow-y: auto;
                            border: 1px solid #ee1d36;
                        "
                    >
                        <li v-for="equipo in props.equipos" :key="equipo.id">
                            <a
                                class="dropdown-item d-flex"
                                href="#"
                                @click.prevent="selectClub(equipo)"
                            >
                                <!-- Mostrar el logo del equipo en el dropdown -->
                                <img
                                    v-if="equipo.logo"
                                    :src="`/storage/${equipo.logo}`"
                                    alt="Logo"
                                    class="w-5 h-5 me-2"
                                />
                                <span class="name-club">{{
                                    equipo.nombre
                                }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Dropdown para elegir equipo, agrupado por meses -->
            <div class="mb-3">
                <div class="dropdown">
                    <button
                        class="btn-public w-100 dropdown-toggle d-flex align-items-center dropdown-partidos"
                        type="button"
                        id="dropdownEquipoPrensa"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            v-if="selectedEquipo.logo_local"
                            :src="`/storage/${selectedEquipo.logo_local}`"
                            alt="Logo Local"
                            class="w-5 h-5 me-2"
                        />
                        <span>{{
                            selectedEquipo.nombre_local
                                ? selectedEquipo.nombre_local
                                : "Selecciona un partido"
                        }}</span>
                        <span class="mx-2">vs</span>
                        <img
                            v-if="selectedEquipo.logo_visitante"
                            :src="`/storage/${selectedEquipo.logo_visitante}`"
                            alt="Logo Visitante"
                            class="w-5 h-5 me-2"
                        />
                        <span>{{ selectedEquipo.nombre_visitante }}</span>
                    </button>

                    <ul
                        class="dropdown-menu w-100 p-0"
                        aria-labelledby="dropdownEquipoPrensa"
                        style="
                            max-height: 300px;
                            overflow-y: auto;
                            border: 1px solid #ee1d36;
                        "
                    >
                        <!-- Iterar por los meses -->
                        <li
                            v-for="(
                                partidosMes, mes
                            ) in partidosAgrupadosPorMes"
                            :key="mes"
                        >
                            <h6 class="dropdown-header">
                                {{ capitalizeFirstLetter(mes) }} -
                                {{ partidosMes.length }} partido(s)
                            </h6>
                            <ul>
                                <li
                                    v-for="partido in partidosMes"
                                    :key="partido.id"
                                >
                                    <a
                                        class="dropdown-item d-flex align-items-center justify-content-around"
                                        href="#"
                                        @click.prevent="selectEquipo(partido)"
                                    >
                                        <img
                                            :src="`/storage/${partido.equipo_local.logo}`"
                                            alt="Logo Local"
                                            class="w-5 h-5 me-2"
                                        />
                                        {{ partido.equipo_local.nombre }}
                                        <div
                                            class="fecha-hora-partido d-flex flex-column"
                                        >
                                            <span class="mx-3 partido-fecha">{{
                                                formatFecha(partido.fecha_hora)
                                            }}</span>
                                            <span class="mx-3 partido-hora">{{
                                                formatHora(partido.fecha_hora)
                                            }}</span>
                                        </div>
                                        {{ partido.equipo_visitante.nombre }}
                                        <img
                                            :src="`/storage/${partido.equipo_visitante.logo}`"
                                            alt="Logo Visitante"
                                            class="w-5 h-5 ms-2"
                                        />
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Campo para el asunto -->
            <div class="mb-3">
                <textarea
                    class="form-control"
                    placeholder="Asunto"
                    v-model="acreditacionData.asunto"
                    required
                    rows="3"
                ></textarea>
            </div>
        </div>

        <!-- Campos adicionales si es "Arbitro" -->

        <div :class="{ 'fade-in': fadeInActive }">
            <div v-if="acreditacionData.tipo_acreditacion === 'arbitro'">
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Nombre"
                        v-model="acreditacionData.nombre"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Apellidos"
                        v-model="acreditacionData.apellido"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="DNI"
                        v-model="acreditacionData.dni"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        v-model="acreditacionData.carnet_federacion"
                        class="form-control"
                        id="carnet_federacion"
                        placeholder="Introduce tu carnet de federación"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="tel"
                        class="form-control"
                        placeholder="Teléfono"
                        v-model="acreditacionData.telefono"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Correo Electrónico"
                        v-model="acreditacionData.correo"
                        required
                    />
                </div>

                <!-- Dropdown para elegir equipo, agrupado por meses -->
                <div class="mb-3">
                    <div class="dropdown">
                        <button
                            class="btn-public w-100 dropdown-toggle d-flex align-items-center dropdown-partidos"
                            type="button"
                            id="dropdownEquipoPrensa"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img
                                v-if="selectedEquipo.logo_local"
                                :src="`/storage/${selectedEquipo.logo_local}`"
                                alt="Logo Local"
                                class="w-5 h-5 me-2"
                            />
                            <span>{{
                                selectedEquipo.nombre_local
                                    ? selectedEquipo.nombre_local
                                    : "Selecciona un partido"
                            }}</span>
                            <span class="mx-2">vs</span>
                            <img
                                v-if="selectedEquipo.logo_visitante"
                                :src="`/storage/${selectedEquipo.logo_visitante}`"
                                alt="Logo Visitante"
                                class="w-5 h-5 me-2"
                            />
                            <span>{{ selectedEquipo.nombre_visitante }}</span>
                        </button>

                        <ul
                            class="dropdown-menu w-100"
                            aria-labelledby="dropdownEquipoPrensa"
                            style="
                                max-height: 300px;
                                overflow-y: auto;
                                border: 1px solid #ee1d36;
                            "
                        >
                            <!-- Iterar por los meses -->
                            <li
                                v-for="(
                                    partidosMes, mes
                                ) in partidosAgrupadosPorMes"
                                :key="mes"
                            >
                                <h6 class="dropdown-header">
                                    {{ capitalizeFirstLetter(mes) }} -
                                    {{ partidosMes.length }} partido(s)
                                </h6>
                                <ul>
                                    <li
                                        v-for="partido in partidosMes"
                                        :key="partido.id"
                                    >
                                        <a
                                            class="dropdown-item d-flex align-items-center justify-content-around"
                                            href="#"
                                            @click.prevent="
                                                selectEquipo(partido)
                                            "
                                        >
                                            <img
                                                :src="`/storage/${partido.equipo_local.logo}`"
                                                alt="Logo Local"
                                                class="w-5 h-5 me-2"
                                            />
                                            {{ partido.equipo_local.nombre }}
                                            <div
                                                class="fecha-hora-partido d-flex flex-column"
                                            >
                                                <span
                                                    class="mx-3 partido-fecha"
                                                    >{{
                                                        formatFecha(
                                                            partido.fecha_hora
                                                        )
                                                    }}</span
                                                >
                                                <span
                                                    class="mx-3 partido-hora"
                                                    >{{
                                                        formatHora(
                                                            partido.fecha_hora
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                            {{
                                                partido.equipo_visitante.nombre
                                            }}
                                            <img
                                                :src="`/storage/${partido.equipo_visitante.logo}`"
                                                alt="Logo Visitante"
                                                class="w-5 h-5 ms-2"
                                            />
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea
                        class="form-control"
                        placeholder="Asunto"
                        v-model="acreditacionData.asunto"
                        required
                        rows="3"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Campos adicionales para Prensa -->
        <div :class="{ 'fade-in': fadeInActive }">
            <div v-if="acreditacionData.tipo_acreditacion === 'prensa'">
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Nombre"
                        v-model="acreditacionData.nombre"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Apellidos"
                        v-model="acreditacionData.apellido"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="DNI"
                        v-model="acreditacionData.dni"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="tel"
                        class="form-control"
                        placeholder="Teléfono"
                        v-model="acreditacionData.telefono"
                        required
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Correo Electrónico"
                        v-model="acreditacionData.correo"
                        required
                    />
                </div>

                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Medio al que pertenece"
                        v-model="acreditacionData.medio_al_que_pertenece"
                        required
                    />
                </div>

                <!-- Dropdown para elegir equipo, agrupado por meses -->
                <div class="mb-3">
                    <div class="dropdown">
                        <button
                            class="btn-public w-100 dropdown-toggle d-flex align-items-center dropdown-partidos"
                            type="button"
                            id="dropdownEquipoPrensa"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img
                                v-if="selectedEquipo.logo_local"
                                :src="`/storage/${selectedEquipo.logo_local}`"
                                alt="Logo Local"
                                class="w-5 h-5 me-2"
                            />
                            <span>{{
                                selectedEquipo.nombre_local
                                    ? selectedEquipo.nombre_local
                                    : "Selecciona un partido"
                            }}</span>
                            <span class="mx-2">vs</span>
                            <img
                                v-if="selectedEquipo.logo_visitante"
                                :src="`/storage/${selectedEquipo.logo_visitante}`"
                                alt="Logo Visitante"
                                class="w-5 h-5 me-2"
                            />
                            <span>{{ selectedEquipo.nombre_visitante }}</span>
                        </button>

                        <ul
                            class="dropdown-menu w-100"
                            aria-labelledby="dropdownEquipoPrensa"
                            style="
                                max-height: 300px;
                                overflow-y: auto;
                                border: 1px solid #ee1d36;
                            "
                        >
                            <!-- Iterar por los meses -->
                            <li
                                v-for="(
                                    partidosMes, mes
                                ) in partidosAgrupadosPorMes"
                                :key="mes"
                            >
                                <h6 class="dropdown-header">
                                    {{ capitalizeFirstLetter(mes) }} -
                                    {{ partidosMes.length }} partido(s)
                                </h6>
                                <ul>
                                    <li
                                        v-for="partido in partidosMes"
                                        :key="partido.id"
                                    >
                                        <a
                                            class="dropdown-item d-flex align-items-center justify-content-around"
                                            href="#"
                                            @click.prevent="
                                                selectEquipo(partido)
                                            "
                                        >
                                            <img
                                                :src="`/storage/${partido.equipo_local.logo}`"
                                                alt="Logo Local"
                                                class="w-5 h-5 me-2"
                                            />
                                            {{ partido.equipo_local.nombre }}
                                            <div
                                                class="fecha-hora-partido d-flex flex-column"
                                            >
                                                <span
                                                    class="mx-3 partido-fecha"
                                                    >{{
                                                        formatFecha(
                                                            partido.fecha_hora
                                                        )
                                                    }}</span
                                                >
                                                <span
                                                    class="mx-3 partido-hora"
                                                    >{{
                                                        formatHora(
                                                            partido.fecha_hora
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                            {{
                                                partido.equipo_visitante.nombre
                                            }}
                                            <img
                                                :src="`/storage/${partido.equipo_visitante.logo}`"
                                                alt="Logo Visitante"
                                                class="w-5 h-5 ms-2"
                                            />
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Campo para el asunto -->
                <div class="mb-3">
                    <textarea
                        class="form-control"
                        placeholder="Asunto"
                        v-model="acreditacionData.asunto"
                        required
                        rows="3"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Campo para cargar un archivo -->
        <div class="mb-3">
            <input
                type="file"
                class="form-control ipt-file"
                @change="handleFileUpload"
                required
            />
            <!-- Mostrar texto dinámico basado en el tipo de acreditación -->
            <small class="form-text text-muted">
                <!-- Texto para árbitro -->
                <template
                    v-if="acreditacionData.tipo_acreditacion === 'arbitro'"
                >
                    Por favor, sube una imagen clara de tu carnet de federación.
                </template>
                <!-- Texto para cualquier otro tipo de acreditación -->
                <template v-else>
                    Por favor, sube una imagen clara de tu DNI.
                </template>
            </small>
        </div>

        <!-- Checkbox de privacidad -->
        <div class="form-check mb-3">
            <input
                type="checkbox"
                class="form-check-input"
                id="privacidad"
                v-model="acreditacionData.privacidad"
                required
                name="privacidad"
            />
            <label class="form-check-label privacidad" for="privacidad">
                He leído y acepto la <a href="#">Política de Privacidad</a> y el
                <a href="#">Tratamiento de Formularios</a>
            </label>
        </div>

        <!-- Botón para enviar el formulario -->
        <button
            type="submit"
            class="btn-public w-100"
            :disabled="!acreditacionData.privacidad"
        >
            Enviar
        </button>
    </form>
</template>

<script setup>
import { ref, computed } from "vue";
import Swal from "sweetalert2";

// Props
const props = defineProps({
    partidos: Array,
    equipos: Array,
});

// Datos del formulario
const acreditacionData = ref({
    tipo_acreditacion: "",
    nombre: "",
    apellido: "",
    dni: "",
    club_pertenece: "",
    correo: "",
    telefono: "",
    asunto: "",
    medio_al_que_pertenece: "",
    carnet_federacion: "",
    archivo: null,
    proximo_encuentro: "",
    partido_id: "",
    privacidad: false,
});

// Variable reactiva para controlar la activación del efecto 'fade-in'
const fadeInActive = ref(false);

// Función para activar el 'fade-in' cuando se cambia el tipo de acreditación
const applyFadeIn = () => {
    fadeInActive.value = false; // Desactiva temporalmente para reiniciar la animación
    setTimeout(() => {
        fadeInActive.value = true; // Activa la clase 'fade-in' después de un pequeño retardo
    }, 10);
};

// Variables reactivas
const selectedEquipo = ref({});
const selectedClub = ref(null);

// Computed properties
const isCuerpoTecnicoODirectivo = computed(() => {
    return ["cuerpo_tecnico", "cuerpo_directivo"].includes(
        acreditacionData.value.tipo_acreditacion
    );
});

// Agrupar partidos por mes
const partidosAgrupadosPorMes = computed(() => {
    const partidosPorMes = {};
    props.partidos.forEach((partido) => {
        const mes = new Date(partido.fecha_hora).toLocaleString("default", {
            month: "long",
            year: "numeric",
        });
        if (!partidosPorMes[mes]) {
            partidosPorMes[mes] = [];
        }
        partidosPorMes[mes].push(partido);
    });
    return partidosPorMes;
});

// Funciones de selección
const selectEquipo = (partido) => {
    selectedEquipo.value = {
        nombre_local: partido.equipo_local.nombre,
        nombre_visitante: partido.equipo_visitante.nombre,
        logo_local: partido.equipo_local.logo,
        logo_visitante: partido.equipo_visitante.logo,
    };
    acreditacionData.value.proximo_encuentro = `${selectedEquipo.value.nombre_local} vs ${selectedEquipo.value.nombre_visitante}`;
    acreditacionData.value.partido_id = partido.id;
};

const selectClub = (equipo) => {
    selectedClub.value = equipo;
    acreditacionData.value.medio_al_que_pertenece = equipo.nombre;
    acreditacionData.value.club_pertenece = equipo.nombre;
};

// Formatear fecha y hora
const formatFecha = (fechaHora) =>
    new Date(fechaHora)
        .toLocaleDateString("es-ES", { day: "2-digit", month: "short" })
        .toUpperCase();
const formatHora = (fechaHora) =>
    new Date(fechaHora).toLocaleTimeString("es-ES", {
        hour: "2-digit",
        minute: "2-digit",
        hour12: false,
    });
const capitalizeFirstLetter = (string) =>
    string.charAt(0).toUpperCase() + string.slice(1);

const validarCorreo = (correo) => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(correo);
};

// Validaciones simples de formulario
const validarFormulario = () => {
    // Definir los campos obligatorios
    const requiredFields = [
        "tipo_acreditacion",
        "nombre",
        "apellido",
        "dni",
        "correo",
        "telefono",
        "asunto",
        "proximo_encuentro",
        "partido_id",
    ];

    // Agregar el campo 'medio_al_que_pertenece' si el tipo de acreditación es 'prensa'
    if (acreditacionData.value.tipo_acreditacion === "prensa") {
        requiredFields.push("medio_al_que_pertenece");
    }

    // Agregar el campo 'carnet_federacion' si el tipo de acreditación es 'arbitro'
    if (acreditacionData.value.tipo_acreditacion === "arbitro") {
        requiredFields.push("carnet_federacion");
    }

    // Validar que todos los campos obligatorios estén completos
    for (const field of requiredFields) {
        if (!acreditacionData.value[field]) {
            Swal.fire(
                "Error",
                `El campo ${capitalizeFirstLetter(
                    field.replace(/_/g, " ")
                )} es obligatorio.`,
                "error"
            );
            return false; // Detener la validación si hay un campo vacío
        }
    }

    // Validar el formato del correo electrónico
    if (!validarCorreo(acreditacionData.value.correo)) {
        Swal.fire("Error", "El correo electrónico no es válido.", "error");
        return false; // Detener la validación si el correo es inválido
    }

    // Si todas las validaciones son exitosas
    return true;
};

// Manejar la carga de archivos
const handleFileUpload = (event) => {
    const file = event.target.files[0];
    // Validación de archivo
    if (file && file.size > 2000000) {
        // 2 MB máximo
        Swal.fire("Error", "El archivo debe ser menor a 2 MB.", "error");
        return;
    }
    acreditacionData.value.archivo = file;
};

// Emitir evento para enviar los datos al componente padre
const emit = defineEmits(["submit-form"]);

const submitAcreditacion = async () => {
    if (!validarFormulario()) {
        return; // Si la validación falla, no se envía el formulario
    }

    // Mostrar un mensaje de "enviando..."
    const swal = Swal.fire({
        title: "Enviando...",
        text: "Por favor espera.",
        didOpen: () => {
            Swal.showLoading(); // Muestra el loader
        },
        allowOutsideClick: false, // Deshabilita el clic afuera
    });

    const formData = new FormData();
    Object.entries(acreditacionData.value).forEach(([key, value]) => {
        formData.append(key, value);
    });

    try {
        // Simulación de envío
        await new Promise((resolve) => {
            setTimeout(() => {
                resolve();
            }, 2000);
        });

        // Cierra el swal de "enviando"
        Swal.close();

        // Muestra el mensaje de éxito
        Swal.fire({
            title: "¡Listo!",
            text: "Tu solicitud ha sido enviada.",
            icon: "success",
            customClass: {
                confirmButton: "btn btn-success",
                popup: "swal-custom-green", // Clase personalizada para el popup
            },
            buttonsStyling: false, // Desactiva estilos por defecto de SweetAlert
        });

        emit("submit-form", { tipo: "acreditacion", data: formData });
    } catch (error) {
        // Cierra el swal de "enviando"
        Swal.close();

        // Muestra el mensaje de error
        Swal.fire("Error", "Hubo un problema al enviar tu solicitud.", "error");
    }
};
</script>

<style setup>
form input,
.ipt-file {
    font-size: 15px;
}

.label-acreditacion-title {
    color: var(--black);
    font-weight: 500;
}

.container-radio-buttons .name-label {
    font-size: 14px;
    color: var(--black);
}

/* Estilos para el dropdown */
.dropdown-menu {
    z-index: 1000;
}

.dropdown-item {
    cursor: pointer;
    color: var(--grayv2) !important;
}

.w-5 {
    width: 20px;
    height: 20px;
    height: auto;
}

/* Estilo del dropdown */
.dropdown-menu {
    overflow-y: auto;
}

.dropdown-menu li {
    font-size: 15px;
}

/* Estilo del scroll */
.dropdown-menu::-webkit-scrollbar {
    width: 8px;
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background-color: var(--red);
    border-radius: 10px;
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background-color: var(--red);
}

.partido-fecha {
    font-size: 13px;
    color: var(--grayv2);
    font-weight: 500;
}

/* Efecto hover para las opciones del dropdown */
.dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.1);
    color: var(--white);
}

.dropdown-header {
    background-color: var(--gray);
    color: var(--black);
    font-size: 15px;
}

.dropdown-partidos {
    background-color: var(--grayv2);
}

.dropdown-partidos:hover {
    background-color: #c11b30;
}

.partido-hora {
    color: var(--red);
    font-size: 12px;
    font-weight: bold;
    text-align: center;
}

.fecha-hora-partido {
    display: flex;
    justify-content: center;
    margin: 0 auto;
}
</style>

<template>
    <div
        class="container container-revisar-acreditacion d-flex justify-center align-items-center"
    >
        <div class="row max-width mx-auto row-container">
            <div class="col-md-6">
                <h2 class="mb-4 title">Revisar Solicitud de Acreditación</h2>

                <!-- Mensajes de éxito o error -->
                <div
                    v-if="successMessage"
                    class="alert alert-success text-center mt-3"
                >
                    <p>{{ successMessage }}</p>
                </div>
                <div
                    v-if="errorMessage"
                    class="alert alert-danger text-center mt-3"
                >
                    <p>{{ errorMessage }}</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-dark table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="encabezado">Descripción</th>
                                <th class="encabezado">Información</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="title-attribute">
                                    Tipo de Acreditación
                                </td>
                                <td>
                                    {{
                                        obtenerTipoAcreditacion(
                                            data.tipo_acreditacion
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="title-attribute">Nombre</td>
                                <td>{{ data.nombre }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">Apellido</td>
                                <td>{{ data.apellido }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">DNI</td>
                                <td>{{ data.dni }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">
                                    Correo Electrónico
                                </td>
                                <td>{{ data.correo }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">Teléfono</td>
                                <td>{{ data.telefono }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">
                                    Próximo Encuentro
                                </td>
                                <td>{{ data.proximo_encuentro }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">
                                    Fecha y Hora del Partido
                                </td>
                                <td>{{ data.fecha_hora_partido }}</td>
                            </tr>
                            <tr>
                                <td class="title-attribute">Archivo</td>
                                <td>
                                    <a
                                        :href="data.archivo"
                                        download=""
                                        class="btn btn-primary btn-sm d-flex align-items-center gap-2"
                                        style="font-size: 15px;"
                                        >
                                        <i
                                            class="bi bi-file-earmark-arrow-down"
                                        ></i>
                                        <span>Descargar Archivo</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button
                        @click="aprobar"
                        :disabled="isLoading"
                        class="btn btn-success d-flex align-items-center gap-2"
                    >
                        <i
                            class="bi bi-check2-circle"
                            style="font-size: 20px"
                        ></i>
                        <span>Aprobar Acreditación</span>
                    </button>
                    <button
                        @click="rechazar"
                        :disabled="isLoading"
                        class="btn btn-danger d-flex align-items-center gap-2"
                    >
                        <i class="bi bi-x-circle" style="font-size: 20px"></i>
                        <span>Rechazar Acreditación</span>
                    </button>
                </div>

                <div v-if="isLoading" class="text-center mt-3">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
            </div>

            <!-- MOSTRAR DOCUMENTO -->
            <div class="col-md-6">
                <h2 class="mb-4 title">Vista Previa del Documento</h2>
                <div class="border" style="height: 600px">
                    <iframe
                        v-if="data.archivo"
                        :src="data.archivo"
                        frameborder="0"
                        class="w-100 h-100"
                        style="height: 600px"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";

export default {
    props: {
        data: Object, // Información de la acreditación
        success: String, // Mensaje de éxito
        error: String, // Mensaje de error
    },
    setup({ data, success, error }) {
        const isLoading = ref(false); // Estado de carga
        const successMessage = ref(success); // Mensaje de éxito
        const errorMessage = ref(error); // Mensaje de error

        // Mapeo de tipos de acreditación a sus nombres legibles
        const tipoAcreditacionLegible = {
            cuerpo_tecnico: "Cuerpo Técnico",
            cuerpo_directivo: "Cuerpo Directivo",
            arbitro: "Árbitro",
            prensa: "Prensa",
        };

        // Obtener la descripción legible del tipo de acreditación
        const obtenerTipoAcreditacion = (tipo) =>
            tipoAcreditacionLegible[tipo] || tipo;

        // Aprobar la acreditación
        const aprobar = async () => {
            isLoading.value = true;
            successMessage.value = null;
            errorMessage.value = null;

            // Mostrar un SweetAlert mientras se procesa la solicitud
            Swal.fire({
                title: "Procesando...",
                text: "Estamos aprobando la acreditación, por favor espera.",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });

            try {
                await Inertia.post(`/aprobar-acreditacion/${data.token}`); // Usamos el token aquí

                // Mostrar SweetAlert de éxito al aprobar la acreditación
                Swal.fire({
                    title: "Acreditación Aprobada",
                    text: "La acreditación ha sido aprobada exitosamente y se ha enviado un correo al solicitante.",
                    icon: "success",
                    confirmButtonColor: "#28a745",
                    timer: 3000,
                    confirmButtonText: "Aceptar",
                });
                successMessage.value = "Acreditación aprobada correctamente.";
            } catch (error) {
                // Mostrar SweetAlert en caso de error
                Swal.fire({
                    title: "Error",
                    text:
                        error.response?.data?.error ||
                        "Hubo un problema al aprobar la acreditación.",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
                errorMessage.value =
                    "Hubo un problema al aprobar la acreditación.";
                console.error(error);
            } finally {
                isLoading.value = false;
            }
        };

        // Rechazar la acreditación
        const rechazar = async () => {
            isLoading.value = true;
            successMessage.value = null;
            errorMessage.value = null;

            try {
                await Inertia.post(`/rechazar-acreditacion/${data.token}`);

                // Mostrar SweetAlert cuando se rechace correctamente
                Swal.fire({
                    title: "Acreditación rechazada",
                    text: "Se ha rechazado la acreditación y se ha enviado un correo al solicitante.",
                    icon: "success",
                    confirmButtonColor: "#28a745",
                    timer: 5000,
                    confirmButtonText: "Aceptar",
                });
            } catch (error) {
                // Mostrar SweetAlert en caso de error
                Swal.fire({
                    title: "Error",
                    text:
                        error.response?.data?.error ||
                        "Hubo un problema al rechazar la acreditación.",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
                console.error(error);
            } finally {
                isLoading.value = false;
            }
        };

        return {
            isLoading,
            successMessage,
            errorMessage,
            aprobar,
            rechazar,
            obtenerTipoAcreditacion,
        };
    },
};
</script>

<style scoped>
.container-revisar-acreditacion {
    background-color: var(--bg-black);
    max-width: unset;
    height: 100%;
}

.encabezado {
    color: var(--red);
}

.title-attribute {
    color: var(--whitev2);
    font-weight: 600;
}

/* MEDIA QUERYS */
@media (max-width: 768px) {
    p {
        font-size: 15px;
    }
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: var(--barlow) !important;
    margin: 0 !important;
    margin: 10px 0 !important;
    color: var(--whitev2);
}

body {
    font-family: var(--roboto) !important;
    color: var(--gray);
}

.row-container {
    width: 1000px;
    max-width: 1000px;
}
</style>

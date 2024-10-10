<template>
    <div class="container container-revisar-acreditacion mt-4">
        <div class="row">
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
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Descripción</th>
                                <th>Información</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>{{ data.nombre }}</td>
                            </tr>
                            <tr>
                                <td>Apellido</td>
                                <td>{{ data.apellido }}</td>
                            </tr>
                            <tr>
                                <td>DNI</td>
                                <td>{{ data.dni }}</td>
                            </tr>
                            <tr>
                                <td>Correo Electrónico</td>
                                <td>{{ data.correo }}</td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td>{{ data.telefono }}</td>
                            </tr>
                            <tr>
                                <td>Tipo de Acreditación</td>
                                <td>
                                    {{
                                        obtenerTipoAcreditacion(
                                            data.tipo_acreditacion
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Próximo Encuentro</td>
                                <td>{{ data.proximo_encuentro }}</td>
                            </tr>
                            <tr>
                                <td>Fecha y Hora del Partido</td>
                                <td>{{ data.fecha_hora_partido }}</td>
                            </tr>
                            <tr>
                                <td>Archivo</td>
                                <td>
                                    <a
                                        :href="data.archivo"
                                        target="_blank"
                                        class="btn btn-primary btn-sm"
                                        >Descargar Archivo</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button
                        @click="aprobar"
                        :disabled="isLoading"
                        class="btn btn-success"
                    >
                        Aprobar Acreditación
                    </button>
                    <button
                        @click="rechazar"
                        :disabled="isLoading"
                        class="btn btn-danger"
                    >
                        Rechazar Acreditación
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
                <div class="border" style="height: 600px;">
                    <iframe
                        v-if="data.archivo"
                        :src="data.archivo"
                        frameborder="0"
                        class="w-100 h-100"
                        style="height: 600px;"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        data: Object, // Recibe la información de la solicitud como prop
        success: String, // Mensaje de éxito
        error: String, // Mensaje de error
    },
    setup(props) {
        const isLoading = ref(false); // Estado de carga
        const successMessage = ref(props.success); // Mensaje de éxito
        const errorMessage = ref(props.error); // Mensaje de error

        // Mapeo de tipos de acreditación
        const tipoAcreditacionLegible = {
            cuerpo_tecnico: "Cuerpo Técnico",
            cuerpo_directivo: "Cuerpo Directivo",
            arbitro: "Árbitro",
            prensa: "Prensa",
        };

        // Función para obtener la descripción legible del tipo de acreditación
        const obtenerTipoAcreditacion = (tipo) => {
            return tipoAcreditacionLegible[tipo] || tipo; // Devuelve el tipo legible o el mismo si no se encuentra
        };

        const aprobar = async () => {
            isLoading.value = true; // Activar el estado de carga
            successMessage.value = null; // Resetear el mensaje de éxito
            errorMessage.value = null; // Resetear el mensaje de error
            try {
                await Inertia.post(`/aprobar-acreditacion/${data.id}`); // Acceder a props directamente sin "this"
                successMessage.value = "Acreditación aprobada correctamente."; // Mensaje de éxito
            } catch (error) {
                errorMessage.value =
                    "Hubo un problema al aprobar la acreditación."; // Manejar error
                console.error(error); // Opcional: ver el error en la consola
            } finally {
                isLoading.value = false; // Desactivar el estado de carga
            }
        };

        const rechazar = async () => {
            isLoading.value = true; // Activar el estado de carga
            successMessage.value = null; // Resetear el mensaje de éxito
            errorMessage.value = null; // Resetear el mensaje de error
            try {
                // Enviando la solicitud para rechazar la acreditación
                console.log("Enviando solicitud para rechazar la acreditación");
                await Inertia.post(`/rechazar-acreditacion/${props.data.id}`);
                // No necesitas manejar la respuesta aquí ya que Inertia se encargará de redirigir
            } catch (error) {
                console.error("Error al rechazar la acreditación:", error); // Manejar error
                errorMessage.value =
                    error.response?.data?.error ||
                    "Hubo un problema al rechazar la acreditación.";
            } finally {
                isLoading.value = false; // Desactivar el estado de carga
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

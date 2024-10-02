<template>
    <div>
      <h1>Nuevo Mensaje de Contacto</h1>
      <p><strong>Nombre:</strong> {{ data.nombre }}</p>
      <p><strong>Apellidos:</strong> {{ data.apellidos }}</p>
      <p><strong>Email:</strong> {{ data.email }}</p>
      <p><strong>Teléfono:</strong> {{ data.telefono }}</p>
      <p><strong>Mensaje:</strong> {{ data.mensaje }}</p>
      <p><strong>Privacidad Aceptada:</strong> {{ data.privacidad_aceptada ? 'Sí' : 'No' }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      data: Object,
    },
  };
  </script>
  
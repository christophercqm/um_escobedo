<template>
    <GuestLayout>
        <CustomCursor />

        <div class="content container-home w-100">
            <p>This is some content inside the GuestLayout.</p>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import customCursor from "@/Components/CustomCursor.vue";
</script>

<style scoped>
.container-home {
    position: absolute;
    top: 0;
}

html, body, #app {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}

.content {
    background-image: url('@images/homev1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

p {
    margin: 0;
}


</style>

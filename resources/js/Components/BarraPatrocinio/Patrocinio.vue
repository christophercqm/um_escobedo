<template>
    <div data-v-6e0fb345="" class="join-us-div">
        <div data-v-6e0fb345="" class="container">
            <div
                data-v-6e0fb345=""
                class="d-flex justify-content-between max-width class-name contain-info"
            >
                <h1 data-v-6e0fb345="" class="comon-heading m-0">
                    Forma parte de un gran equipo
                </h1>
                <NavLink
                    href="/contacto"
                    class="btn btn-socio"
                >
                    <span>
                        únete a nosotros
                    </span>
                    <svg
                        data-v-6e0fb345=""
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-arrow-up-short btn-icon-arrow"
                        viewBox="0 0 16 16"
                    >
                        <path
                            data-v-6e0fb345=""
                            fill-rule="evenodd"
                            d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"
                        ></path>
                    </svg>
                </NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";

</script>

<style scoped>
.max-width {
    max-width: 1250px;
    margin: 0 auto;
}

.join-us-div {
    display: inline-block;
    width: 100%;
    padding: 30px 0;
    background: var(--red) url("@images/creat-bg.jpg") no-repeat;
    background-size: cover;
}

.join-us-div .comon-heading {
    color: var(--white);
}

.join-us-div .all-cm-btn {
    background: var(--white);
    color: var(--red) !important;
    line-height: 36px;
    font-weight: 700;
    text-transform: uppercase;
    display: flex;
    align-items: center;
}

.join-us-div svg.btn-icon-arrow {
    transform: rotate(90deg) !important;
    width: 30px;
    height: 30px;
}

.btn-socio{
    display: flex;
    background-color: var(--white);
    color: var(--red) !important;
    text-transform: uppercase;
    font-family: var(--roboto);
    font-weight: 600;
    height: 100%;
}

.join-us-div .contain-info {
    display: flex;
    align-items: center;
}
</style>

import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Importar estilos de Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
// Importar funcionalidad JavaScript de Bootstrap
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import 'bootstrap-icons/font/bootstrap-icons.css';

// Importar jQuery y DataTables
import $ from 'jquery';
import 'datatables.net';

// Importar AOS
import AOS from 'aos';
import 'aos/dist/aos.css'; // Importar los estilos de AOS

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`,
        import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const inertiaApp = createApp({ render: () => h(App, props) });

        inertiaApp
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);

        // Inicializar AOS cuando la app esté completamente montada
        AOS.init({
            duration: 1000, // Duración de la animación
            once: true,     // Si quieres que la animación solo ocurra una vez
            offset: 100,    // Desplazamiento antes de que comience la animación
        });
    },
    progress: {
        color: '#4B5563',
    },
});

// Hacer jQuery globalmente accesible
window.$ = $; // Puedes acceder a jQuery en cualquier componente como $ o window.$

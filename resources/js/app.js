// import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp} from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress'

import DefaultLayout from './Layouts/DefaultLayout.vue';

InertiaProgress.init()

createInertiaApp({
    title: title => `${title} - DotnetDevs`,
    resolve: (name) => {
        let page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));

        page.then((module) => {
            module.default.layout = module.default.layout || DefaultLayout;
        });

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .mixin({ methods: {route}})
            .use(plugin)
            .mount(el)
    },
});

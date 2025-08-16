import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { createPinia} from "pinia";
import { useUserStore } from "./stores/user.js";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue') // 👈 ищем во всех подпапках
        return pages[`./Pages/${name}.vue`](); // 👈 используем имя как путь
    },
    setup({ el, App, props, plugin }) {
        const pinia = createPinia()

        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)

            const userStore = useUserStore()

            if (localStorage.getItem('token')) {
                userStore.fetchUser()
            }

            app.mount(el)
    },
})

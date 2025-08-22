import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { createPinia } from 'pinia'
import '../css/app.css'
import { useUserStore } from './stores/user.js'

// Убираем прямой createApp(App).mount('#app') — только Inertia
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        return pages[`./Pages/${name}.vue`]()
    },
    setup({ el, App, props, plugin }) {
        const pinia = createPinia()
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)

        // Подгружаем пользователя при наличии токена
        const userStore = useUserStore()
        if (localStorage.getItem('token')) {
            userStore.fetchUser()
        }

        app.mount(el)
    },
})

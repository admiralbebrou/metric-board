<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    email: '',
    password: '',
})

const submit = () => {
    form.post('/login')
}
</script>

<template>
    <div class="max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Вход в аккаунт</h1>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label>Email</label>
                <input v-model="form.email" type="email" class="w-full border p-2" />
                <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>
            </div>

            <div>
                <label>Пароль</label>
                <input v-model="form.password" type="password" class="w-full border p-2" />
                <div v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Войти</button>
        </form>
    </div>
</template>

<style scoped>

</style>

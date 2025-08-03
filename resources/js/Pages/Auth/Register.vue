<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3'
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
    })

function register()
    {
        form.post('/register')
    }
</script>

<template>
    <div class="max-w-md mx-auto mt-12">
        <h1 class="text-2xl font-bold mb-6">Account registration</h1>
        <form @submit.prevent="register">

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full mt-1 border p-2 rounded"
                />
                <div v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    v-model="form.email"
                    type="email"
                    class="w-full mt-1 border p-2 rounded"
                />
                <div v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    v-model="form.password"
                    type="password"
                    class="w-full mt-1 border p-2 rounded"
                />
                <div v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password }}</div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Confirm password</label>
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    class="w-full mt-1 border p-2 rounded"
                />
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded"
                :disabled="form.processing"
            >
                Registration
            </button>
        </form>
    </div>
</template>

<style scoped>

</style>

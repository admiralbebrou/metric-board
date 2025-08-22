<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from "@inertiajs/inertia"

const form = useForm({
    name: ''
})

const submit = () => {
    form.post('/projects', {
        onSuccess: () => {
            Inertia.visit('/') // можно перенаправлять на главную или список проектов
        }
    })
}
</script>

<template>
    <div class="page">
        <h1>Create Project</h1>
        <div class="card">
            <form @submit.prevent="submit">
                <div class="field">
                    <label>Project Name</label>
                    <input v-model="form.name" type="text" placeholder="My Awesome Project"/>
                    <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
                </div>

                <button type="submit" class="btn">Save</button>
            </form>

            <p class="note">
                <a href="/" class="back-link">← Back to Dashboard</a>
            </p>
        </div>
    </div>
</template>

<style scoped>
.page {
    min-height: 100vh;
    background: #111827;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 4rem;
    padding-inline: 1rem;
}
.page h1 {
    font-size: 2.25rem;
    font-weight: bold;
    color: white;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 6px rgba(0,0,0,0.6);
}
.card {
    width: 100%;
    max-width: 28rem;
    background: #1f2937;
    padding: 2.5rem;
    border-radius: 1rem;
    box-shadow: 0 8px 20px rgba(0,0,0,0.5);
}
.field {
    margin-bottom: 1.25rem;
}
label {
    display: block;
    margin-bottom: 0.25rem;
    color: #e5e7eb;
}
input {
    width: 100%;
    padding: 0.75rem;
    border-radius: 0.5rem;
    background: #374151;
    border: 1px solid #4b5563;
    color: white;
    outline: none;
}
input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px #3b82f6;
}
.error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
.btn {
    width: 100%;
    background: #2563eb;
    padding: 0.75rem;
    border-radius: 0.5rem;
    font-size: 1.125rem;
    font-weight: 600;
    transition: background 0.2s;
}
.btn:hover {
    background: #1e40af;
}
.note {
    margin-top: 1.5rem;
    text-align: center;
    color: #9ca3af;
}
.back-link {
    color: #60a5fa;
    text-decoration: none;
}
.back-link:hover {
    text-decoration: underline;
}
</style>

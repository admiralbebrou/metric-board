<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3'
import axiosClient from '../../axios.js'
import { Inertia } from "@inertiajs/inertia"

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

const submit = () => {
    axiosClient.post("/register", form)
        .then(response => {
            localStorage.setItem("token", response.data.token)
            Inertia.visit('/')
        })
}
</script>

<template>
    <div class="page">
        <h1>Register</h1>
        <div class="card">
            <form @submit.prevent="submit">
                <div class="field">
                    <label>Name</label>
                    <input v-model="form.name" type="text" placeholder="John Doe"/>
                    <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input v-model="form.email" type="email" placeholder="YourEmail@gmail.com"/>
                    <div v-if="form.errors.email" class="error">{{ form.errors.email }}</div>
                </div>

                <div class="field">
                    <label>Password</label>
                    <input v-model="form.password" type="password" placeholder="Enter your password"/>
                    <div v-if="form.errors.password" class="error">{{ form.errors.password }}</div>
                </div>

                <div class="field">
                    <label>Confirm Password</label>
                    <input v-model="form.password_confirmation" type="password" placeholder="Repeat your password"/>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <p class="note">
                Already have an account?
                <a href="/login">Login</a>
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
    border-color: #22c55e;
    box-shadow: 0 0 0 2px #22c55e;
}
.error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
.btn {
    width: 100%;
    background: #16a34a;
    padding: 0.75rem;
    border-radius: 0.5rem;
    font-size: 1.125rem;
    font-weight: 600;
    transition: background 0.2s;
}
.btn:hover {
    background: #15803d;
}
.note {
    margin-top: 1.5rem;
    text-align: center;
    color: #9ca3af;
}
.note a {
    color: #60a5fa;
    text-decoration: none;
}
.note a:hover {
    text-decoration: underline;
}
</style>

<script setup>
import axios from "axios";

const logout = async () => {
    try {
        await axios.post("/api/logout", {}, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`
            }
        });

        // Чистим токен из localStorage
        localStorage.removeItem('token');

        // Перенаправляем на страницу логина
        window.location.href = '/login';
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <h1>Inertia works</h1>
    <button @click="logout">Выйти</button>
</template>

<style scoped>

</style>

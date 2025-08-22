<script setup>
import { ref } from "vue";
import axios from "axios";

// Логика выхода
const logout = async () => {
    try {
        await axios.post("/api/logout", {}, {
            headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
        });
        localStorage.removeItem('token');
        window.location.href = '/login';
    } catch (error) {
        console.error(error);
    }
};

// Динамические блоки проектов
const projects = ref([]);

const createProject = () => {
    const id = projects.value.length + 1;
    projects.value.push({
        id,
        image: '/images/project-placeholder.png' // картинка нового проекта
    });
};

const openProject = (project) => {
    alert(`Open project ${project.id}`);
};
</script>

<template>
    <div class="page">
        <!-- Хедер с кнопкой выхода -->
        <header class="header">
            <button @click="logout" class="logout-btn">Logout</button>
        </header>

        <!-- Главная фотка с кнопкой Create Project -->
        <main class="content">
            <div class="image-container">
                <img src="/images/stats.png" alt="Main photo" class="hero-photo" />
                <button class="create-btn" @click="$inertia.visit('/projects/create')">
                    New project
                </button>
            </div>
        </main>
    </div>
</template>

<style scoped>
.image-container {
    position: relative; /* чтобы кнопка позиционировалась внутри */
    display: inline-block; /* чтобы контейнер подстраивался под размер картинки */
}
.create-btn {
    position: absolute;
    top: 50%;  /* по вертикали центр */
    left: 50%; /* по горизонтали центр */
    transform: translate(-50%, -50%); /* смещение в центр */
    background-color: white;
    color: black;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    transition: background 0.2s;
}

.create-btn:hover {
    background: #4266d1;
}
.page {
    min-height: 100vh;
    background: #111827;
    color: white;
    display: flex;
    flex-direction: column;
}

.header {
    display: flex;
    justify-content: flex-end;
    padding: 1.5rem;
}

.logout-btn {
    background: #ca1d1d;
    padding: 0.5rem 1.25rem;
    border-radius: 0.5rem;
    font-weight: 500;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
    transition: background 0.2s;
}
.logout-btn:hover {
    background: #930707;
}

.content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    text-align: center;
}
.hero-photo {
    filter: blur(30px);
    opacity: 30%;
    width: 100%;
    max-width: 800px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.create-btn {
    margin-top: 15px;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 6px;
    border: 1px solid #333;
    background-color: rgba(255,255,255,0.9);
    cursor: pointer;
}
</style>

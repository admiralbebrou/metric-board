import { defineStore } from "pinia";
import axiosClient from "../axios.js";
import { ref } from "vue";

export const useUserStore = defineStore('user', () => {
    const user = ref(null)

    function fetchUser() {
        return axiosClient.get('/user')
            .then(({data}) => {
                user.value = data
            })
    }

    return {
        user,
        fetchUser,
    }
})

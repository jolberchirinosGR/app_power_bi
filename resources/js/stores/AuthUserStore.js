import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useAuthUserStore = defineStore('AuthUserStore', () => {
    const user = ref({
        name: '',
        email: '',
        id_role: '',
        id_company: '',
        theme: '',
        permissions: [],
    });

    const getAuthUser = async () => {
        await axios.get('/web/profile').then((response) => {
            user.value = response.data;
            console.log(response.data);
        });
    };

    return { user, getAuthUser };
});

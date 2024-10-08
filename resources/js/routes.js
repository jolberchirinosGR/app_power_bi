import Dashboard from './components/Dashboard.vue';
import Login from './pages/auth/Login.vue';
import Users from './pages/user/UserList.vue';

export default [
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },

    {
        path: '/',
        name: 'Dashboard',
        component: Dashboard,
    },

    {
        path: '/users',
        name: 'Usuarios',
        component: Users,
    },
]

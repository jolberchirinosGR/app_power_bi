<template>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
          <li>
            <router-link to="/" class="navbar-brand">
              <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <font-awesome-icon :icon="['fas', 'home']" style="color: #6c727f;" />
                <span class="ms-3">Inicio</span>
              </a>
            </router-link>
          </li>
          <li v-if="visible">
            <router-link to="/users" class="navbar-brand">
              <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <font-awesome-icon :icon="['fas', 'users']" style="color: #6c727f;" />
                <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
              </a>
            </router-link>
          </li>
        </ul>
      </div>
    </aside>
  </template>
  
<script>
  import { mapState } from 'pinia';
  import { useAuthUserStore } from '../stores/AuthUserStore';
  import { initFlowbite } from 'flowbite';
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
  
  export default {
    name: 'Sidebar',
    components: {
      FontAwesomeIcon
    },
    data() {
      return {
        visible: false,
        admin: 2, // ID of the admin role in the database
        super_admin: 1 // ID of the super admin role in the database
      };
    },
    computed: {
      ...mapState(useAuthUserStore, ['user'])
    },
    mounted() {
      initFlowbite();
      this.checkVisibility();
    },
    methods: {
      checkVisibility() {
        this.visible = this.user.id_role === this.admin || this.user.id_role === this.super_admin;
      }
    }
  };
</script>
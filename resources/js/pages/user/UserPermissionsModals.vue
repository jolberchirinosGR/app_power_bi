<template>
    <fwb-modal v-if="isShowModal" @close="closeFormModal" persistent class="fixed top-0 left-0 right-0 z-50">

     <template #header>
       <div class="flex items-center text-lg text-gray-500 dark:text-white">
        <strong>
          Permisos del usuario
        </strong>
       </div>
     </template>

     <template #body>
        <!-- Obtener los permisos de este usuario -->
        <h5>Selecciona los permisos que tendra este usuario: </h5>
        <br>
        <div v-for="permission in permissionsAll" :key="permission.id">
            <label>
                <input
                    type="checkbox"
                    :value="permission.id"
                    v-model="permissionsUser"
                >
                {{ permission.description }}
            </label>
        </div>
     </template>

     <template #footer>
       <div class="flex justify-between">
         <fwb-button @click="closeFormModal" color="alternative">
          <font-awesome-icon :icon="['fas', 'times']"/>
           Cerrar
         </fwb-button>
         <fwb-button  @click="updateUserPermissions" color="green">
          <font-awesome-icon :icon="['fas', 'save']"/>
            Guardar
         </fwb-button>
       </div>
     </template>
  </fwb-modal>
 </template>
 
 <script>
 import axios from 'axios';
 import { debounce } from 'lodash';
 import UserListItem from './UserListItem.vue';
 import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
 import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../stores/Sweet.js';
 
 // Elementos del flowbite
 import {
   FwbModal,
   FwbButton,
 } from 'flowbite-vue'
 
 export default {
   emits: ['reload-table'], // Eventos que se generan en este componente
   components: {
     UserListItem,
     FwbButton,
     FwbModal,
   },
   data() {
     return {
      id: null,
      isShowModal: false,
      permissionsAll: [],
      permissionsUser: [],
     };
   },
   methods: {
    // Abrir modal de editar o crear usuario
      openFormModal(user) {
        this.id = user.id;
        this.getPermissonsId(user.id); // Obtener los permisos del usuario
        this.isShowModal = true;
      },
 
    // Cerrar modal de editar o crear usuario
      closeFormModal() {
        this.isShowModal = false;
      },

    //Obtener todas los permisos
      getPermissons(){
        axios.get('/web/permissions_unpaged').then((response) => {
          this.permissionsAll = response.data;
        });
      },

    //Obtener los permisos de un usuario espesifico
      getPermissonsId(id) {
        if (id !== 0) {
          axios.get(`/web/permissions_unpaged_id/${id}`).then((response) => {
            this.permissionsUser = response.data;
          })
        }
      },

    //ACTUALIZAR PERMISOS
      updateUserPermissions(){
          const data = {
              permissions_user: this.permissionsUser,
          };

          axios.put(`/web/permissions/${this.id}`, data).then(response => {
              this.closeFormModal();
              showSuccessMessage('¡Permisos del usuario actualizado exitosamente!');

          }).catch(error => {
              const errors = error.response.data.errors;
              showErrorGroupMessages(errors);
          });
      },
   },
   watch: {
 
   },
   created() {
    this.getPermissons();
   },
   mounted() {
   }
 };
 </script>
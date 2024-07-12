<template>
  <fwb-modal v-if="isShowUpdateModal" @close="closeUpdatedFormModal" persistent class="fixed top-0 left-0 right-0 z-50">
     <template #header>
       <div class="flex items-center text-lg text-gray-500 dark:text-white">
        <strong>
          Permisos del usuario
        </strong>
       </div>
     </template>

     <template #body>
      <h5>
        Selecciona los permisos que tendrá este usuario:          
        <fwb-button @click="selectAllPermissions" gradient="blue">
          <font-awesome-icon :icon="['fas', 'check-double']"/>
          Todos
        </fwb-button>
      </h5>
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
         <fwb-button @click="closeUpdatedFormModal" color="alternative">
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

  <fwb-modal v-if="isShowCreateModal" @close="closeCreatedFormModal" persistent class="fixed top-0 left-0 right-0 z-50">
     <template #header>
       <div class="flex items-center text-lg text-gray-500 dark:text-white">
        <strong>
          Creación de permisos
        </strong>
       </div>
     </template>

     <template #body>
      <form class="p-4 md:p-5">
          <div class="grid gap-4 mb-4 grid-cols-2">
              <div class="col-span-2">
                <label for="description" class="label-form-custom">
                  Descripción
                </label>
                <input type="text" name="description" id="description" v-model="permission.description" class="input-form-custom" placeholder="Descripción del permiso" autocomplete="off">
              </div>
              <div class="col-span-1">
                <label for="company" class="label-form-custom">
                  Empresa
                </label>
                <select v-model="permission.id_company" class="input-form-custom" required>
                  <option v-for="rol in companiesAll" :value="rol.id" :key="rol.id">{{ rol.razonsocial }}</option>
                </select>              
              </div>                            
          </div>
        </form>
     </template>

     <template #footer>
       <div class="flex justify-between">
         <fwb-button @click="closeCreatedFormModal" color="alternative">
          <font-awesome-icon :icon="['fas', 'times']"/>
           Cerrar
         </fwb-button>
         <fwb-button  @click="savePermission" color="green">
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
      permission: {
        description: '',
        id_company: '',
      },
      id: null,
      isShowUpdateModal: false,
      isShowCreateModal: false,
      permissionsAll: [],
      permissionsUser: [],
      companiesAll: [],
     };
   },
   methods: {
    //Limpiar el permiso
      clearForm() {
        this.permission = {
          description: '',
          id_company: '',
        };
      },
 
    // Abrir modal de editar o crear usuario
      openUpdatedFormModal(user) {
        this.id = user.id;
        this.getPermissonsId(user.id); // Obtener los permisos del usuario
        this.isShowUpdateModal = true;
      },
 
    // Cerrar modal de editar o crear usuario
      closeUpdatedFormModal() {
        this.isShowUpdateModal = false;
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

    //Obtener todas las compañias
      get_companies(){
        axios.get('/web/companies').then((response) => {
          this.companiesAll = response.data;
        })
      },

    //ACTUALIZAR PERMISOS
      updateUserPermissions(){
          const data = {
              permissions_user: this.permissionsUser,
          };

          axios.put(`/web/permissions/${this.id}`, data).then(response => {
              this.closeUpdatedFormModal();
              showSuccessMessage('¡Permisos del usuario actualizado exitosamente!');

          }).catch(error => {
              const errors = error.response.data.errors;
              showErrorGroupMessages(errors);
          });
      },

    //CREACION DE NUEVO PERMISO
      
      // Abrir modal de crear PERMISO
      openCreatedFormModal() {
        this.clearForm();
        this.isShowCreateModal = true;
      },

      // Cerrar modal de editar o crear usuario
      closeCreatedFormModal() {
        this.isShowCreateModal = false;
      },

      //Guardar el permiso
      savePermission(){
        const data = {
          description: this.permission.description,
          id_company: this.permission.id_company,
        };

        axios.post('/web/permissions', data).then(response => {
          this.isShowCreateModal = false;
          showSuccessMessage('¡Permiso creado exitosamente!');
          this.getPermissons();

        }).catch(error => {
          const errors = error.response.data.errors;
          showErrorGroupMessages(errors);
        });
      },

      // Método para seleccionar todos los permisos
      selectAllPermissions() {
        // Obtener los IDs de todos los permisos disponibles
        const allPermissionIds = this.permissionsAll.map(permission => permission.id);
        // Asignar todos los permisos al modelo `permissionsUser`
        this.permissionsUser = [...allPermissionIds];
      },
   },
   watch: {
 
   },
   created() {
    this.getPermissons();
    this.get_companies();
   },
   mounted() {
   }
 };
 </script>
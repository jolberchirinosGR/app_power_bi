<template>
  <div v-if="isAdmin || isSuperAdmin">
    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 md:rtl:space-x-reverse" style="margin-bottom: 2%;">
        <h1 class="text-gray dark:text-white text-xl font-bold">
            <font-awesome-icon :icon="['fas', 'users']"/>
            Listado de usuarios
        </h1>

        <fwb-button class="mr-2" gradient="green" @click="createModalUser()">
          <font-awesome-icon :icon="['fas', 'plus']"/>
          Nuevo usuario
        </fwb-button>

        <fwb-button class="mr-2" gradient="green" @click="permissionCreatedModalUser()" v-if="isSuperAdmin">
          <font-awesome-icon :icon="['fas', 'plus']"/>
          Nuevo permiso
        </fwb-button>

        <fwb-dropdown text="Paginación">
          <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200">
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="paginationNumber" value="10">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">10</label>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="paginationNumber" value="25">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">25</label>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="paginationNumber" value="50">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">50</label>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="paginationNumber" value="100">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">100</label>
              </div>
            </li>
          </ul>
        </fwb-dropdown>

        <fwb-dropdown text="Roles" v-if="isSuperAdmin">
          <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200">
            <li  v-for="(role, index) in roles">
              <div class="flex items-center">
                  <input type="radio" v-model="roleSearch" :value="role.id">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ role.name }}</label>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="roleSearch" value=null>
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Sin filtrar
                  </label>
              </div>
            </li>
          </ul>
        </fwb-dropdown>

        <fwb-dropdown text="Sedes">
          <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200">
            <li  v-for="(sede, index) in companies">
              <div class="flex items-center">
                  <input type="radio" v-model="companySearch" :value="sede.id">
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ sede.empresa }}</label>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                  <input type="radio" v-model="companySearch" value=null>
                  <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Sin filtrar
                  </label>
              </div>
            </li>
          </ul>
        </fwb-dropdown>

        <fwb-input #prefix v-model="inputSearch" placeholder="Buscador nombre o correo">
          <font-awesome-icon :icon="['fas', 'search']"/>
        </fwb-input>
    </div>

    <fwb-table>
      <fwb-table-head>
        <fwb-table-head-cell>Nombre</fwb-table-head-cell>
        <fwb-table-head-cell>Correo</fwb-table-head-cell>
        <fwb-table-head-cell>Sede</fwb-table-head-cell>
        <fwb-table-head-cell>Rol</fwb-table-head-cell>
        <fwb-table-head-cell>Creado</fwb-table-head-cell>
        <fwb-table-head-cell>Acciones</fwb-table-head-cell>
      </fwb-table-head>

      <fwb-table-body>
        <UserListItem v-for="(user, index) in users.data"
          :key="user.id"
          :user=user
          @open-update-user="updateModalUser"
          @open-delete-user="deleteModalUser"
          @open-permissions-user="permissionUpdatedModalUser"
        />
      </fwb-table-body>
    </fwb-table>

    <nav class="w-full flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
      <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        Viendo 
        <span class="font-semibold text-gray-900 dark:text-white">
          {{ users.from }}
          -
          {{ users.to }}
        </span> 
        de 
        <span class="font-semibold text-gray-900 dark:text-white">
          {{ users.total }}
        </span>
      </span>
      <fwb-pagination v-model="users.current_page" :total-pages="users.last_page" @page-changed="getUsers"  previous-label="<<<" next-label=">>>"></fwb-pagination>
    </nav>

    <!-- Modal -->
    <user-modals ref="userModals"
        @reload-table="reloadTable"
    />
    <user-permissions-modals ref="userPermissionsModals"
        @reload-table="reloadTable"
    />
  </div>
</template>

<script>
import axios from 'axios';
import { debounce } from 'lodash';
import UserListItem from './UserListItem.vue';
import UserModals from './UserModals.vue';
import UserPermissionsModals from './UserPermissionsModals.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { useAuthUserStore } from '../../stores/AuthUserStore.js';

//Elementos del flowbite
import {
  FwbA,
  FwbTable,
  FwbTableBody,
  FwbTableCell,
  FwbTableHead,
  FwbTableHeadCell,
  FwbTableRow,
  FwbButton,
  FwbPagination,
  FwbSelect,
  FwbDropdown,
  FwbInput,
} from 'flowbite-vue'

export default {
  components: {
    UserListItem,
    UserModals,
    UserPermissionsModals,
    FwbA,
    FwbTable,
    FwbTableBody,
    FwbTableCell,
    FwbTableHead,
    FwbTableHeadCell,
    FwbTableRow,
    FwbButton,
    FwbPagination,
    FwbSelect,
    FwbDropdown,
    FwbInput,
  },
  data() {
    return {
      userLogged: useAuthUserStore().user, // Accede al usuario desde el store
      isSuperAdmin: false, 
      isAdmin: false, 
      //Objeto para la edicion
      user: {
        id: '',
        name: '',
        lastname: '',
        dni: '',
        email: '',
        password: '',
        confirm_password: '',
        id_role: '',
      },
      //Modales y titulos
      id: 0,
      update: false,
      //Variables para comprobar los resultados y el total de los datos
      roles: [],
      companies: [],
      users: [],
      //Filtros para el listado
      inputSearch: null,
      roleSearch: null,
      dateSearch: null,
      companySearch: null,
      //Generales
      paginationNumber: 10,
      paginationSelect: [
        { value: '10', name: '10'},
        { value: '25', name: '25'},
        { value: '50', name: '50'},
        { value: '100', name: '100'},
      ],
      orderByColumn: 'id',
      orderByType: 'desc', // none, asc, desc
    };
  },
  methods: {
    //Obtener todas los Usuarios
      getUsers(page = 1) {
          axios.get(`/web/users?page=${page}`, {
              params: {
                  search: this.inputSearch,
                  role: this.roleSearch,
                  company: this.companySearch,
                  //Generales
                  pagination: this.paginationNumber,
                  order: this.orderByType,
                  column: this.orderByColumn,
              },
          }).then((response) => {
              this.users = response.data;
          });
      },

    //Obetener ordenación
      sortBy(column) {
        if (this.orderByColumn === column) {
            if (this.orderByType === 'none') {
                this.orderByType = 'asc';
            } else if (this.orderByType === 'asc') {
                this.orderByType = 'desc';
            } else {
                this.orderByType = 'none';
                this.orderByColumn = '';
            }
        } else {
            this.orderByColumn = column;
            this.orderByType = 'asc';
        }
      },

    // Método para abrir el modal de creación
      createModalUser() {
        this.$refs.userModals.openFormModal(null);
      },

    // Método para abrir el modal de creación
      updateModalUser(data) {
        this.$refs.userModals.openFormModal(data);
      },

    // Método para abrir el modal de creación
      permissionUpdatedModalUser(data) {
        this.$refs.userPermissionsModals.openUpdatedFormModal(data);
      },
    
    // Método para abrir el modal de creación
      permissionCreatedModalUser(data) {
        this.$refs.userPermissionsModals.openCreatedFormModal(data);
      },

    // Método para abrir el modal de creación
      deleteModalUser(data) {
        this.$refs.userModals.openDeleteModal(data);
      },

    //Funcion para recargar la tabla
      reloadTable(){
        this.getUsers();
      },

    //vaciar filtro de fecha
      dateSearchNull(){
        this.dateSearch = null;
      },

    //Obtener todas los Roles
      getRoles(){
        axios.get('/web/roles').then((response) => {
          this.roles = response.data;
        })
      },

    // Visible solo para ciertos usuarios
      checkAdmin() {
        this.isAdmin = (this.userLogged.id_role === 2) ? true : false;
      },

    // Visible solo para ciertos usuarios
      checkSuperAdmin() {
        this.isSuperAdmin = (this.userLogged.id_role === 1) ? true : false;
      },      

    //Obtener todas las compañias
      getCompanies(){
        axios.get('/web/companies').then((response) => {
          this.companies = response.data;
        })
      },
  },
  computed: {
  },
  watch: {
    inputSearch: debounce(function (newVal) {
      this.getUsers();
    }, 300),
    paginationNumber: debounce(function () {
      this.getUsers();
    }, 300),
    dateSearch: debounce(function () {
      this.getUsers();
    }, 300),
    roleSearch: debounce(function () {
      this.getUsers();
    }, 300),
    companySearch: debounce(function () {
      this.getUsers();
    }, 300),
    orderByType: debounce(function () {
      this.getUsers();
    }, 300),
  },
  created() {
    this.getUsers();
    this.getRoles();
    this.checkAdmin();
    this.checkSuperAdmin();
    this.getCompanies();
  },
  mounted() {
    initFlowbite();
  }
};
</script>

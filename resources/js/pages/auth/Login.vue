<template>
  <section class="bg-gray-50 dark:bg-gray-900" v-if="firstLogin">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-4xl font-semibold text-gray-900 dark:text-white">
            <img class="w-20 h-20 mr-2" src="logo.webp" alt="logo">
            <strong>Cuadros de Power BI </strong> 
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Crea una nueva contraseña de acceso
                </h1>
                <form class="space-y-4 md:space-y-6" @submit.prevent="changePassword">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          <font-awesome-icon :icon="['fas', 'lock']" />                          
                          Nueva contraseña
                        </label>
                        <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          <font-awesome-icon :icon="['fas', 'lock']" />                          
                          Confirma tu contraseña
                        </label>
                        <input v-model="form.confirm_password" type="password" name="confirm_password" id="confirm_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-white dark:text-black dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                      <font-awesome-icon :icon="['fas', 'save']" />                      
                      Cambiar Contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
  </section>

  <section class="bg-gray-50 dark:bg-gray-900" v-else>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-4xl font-semibold text-gray-900 dark:text-white">
            <img class="w-20 h-20 mr-2" src="logo.webp" alt="logo">
            <strong>Cuadros de Power BI </strong> 
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Iniciar Sesión
                </h1>
                <form class="space-y-4 md:space-y-6" @submit.prevent="checkUser">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          <font-awesome-icon :icon="['fas', 'at']" />
                          Tu correo
                        </label>
                        <input v-model="form.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          <font-awesome-icon :icon="['fas', 'lock']" />                          
                          Tu contraseña
                        </label>
                        <input v-model="form.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-white dark:text-black dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                      <font-awesome-icon :icon="['fas', 'arrow-right-to-bracket']" />                      
                      Inciar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
  </section>
</template>
  
<script>
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { showSuccessMessage, showErrorMessage, showInfoMessage } from '../../stores/Sweet.js';

import { useRouter } from 'vue-router';

export default {
  components: {
    FontAwesomeIcon
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
        confirm_password: '',
      },
      loading: false,
      firstLogin: false,
      errorMessage: '',
      router: useRouter(),
    };
  },
  methods: {

    login() {
      this.loading = true;
      this.errorMessage = '';

      axios.post('/login', this.form).then(() => {
        this.$router.push('/');
      }).catch((error) => {
        this.errorMessage = error.response.data.message;
      }).finally(() => {
        this.loading = false;
      });
    },

    //Comprobar que el usuario tenga un primer login
    checkUser() {
      this.loading = true;
      this.errorMessage = '';

      axios.post('/web/check_first_login', this.form).then((response) => {
        const userVerify = response.data.email_verified_at;

        if (!userVerify) {
          this.firstLogin = true;
          showInfoMessage('Tienes que cambiar tu contraseña...');
        } else {
          this.form.email = response.data.email;
          this.login();
        }
      }).catch((error) => {
        console.log(error.response);
        this.errorMessage = error.response.data.message;
      }).finally(() => {
        this.loading = false;
      });
    },


    changePassword() {
      this.loading = true;
      this.errorMessage = '';

      if (this.form.password === this.form.confirm_password) {
        axios.post('/web/change_password', this.form).then(() => {
          this.firstLogin = false;
          this.$router.push('/login');
          showSuccessMessage('Contraseña cambiada exitosamente');
        }).catch((error) => {
          this.errorMessage = error.response.data.message;
        }).finally(() => {
          this.loading = false;
        });
      } else {
        showErrorMessage('Contraseñas no coinciden...');
      }
    },
  },
};
</script>
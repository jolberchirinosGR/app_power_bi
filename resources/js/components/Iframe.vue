<template>
  <div class="min-h-screen bg-white dark:bg-gray-900 flex flex-col">
    <!-- Panel Superior -->
    <div class="shadow-md p-4 flex items-center justify-between bg-white dark:bg-gray-900">
      <button 
        @click="goBack" class="text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 font-semibold">
        <font-awesome-icon :icon="['fas', 'reply']"/>
        Regresar al inicio
      </button>
      <h1 class="text-xl font-bold text-gray-900 dark:text-white">
        {{ title }}
      </h1>
    </div>
    
    <!-- Contenido Principal -->
    <div class="flex-1 iframe-container mt-4">
      <iframe 
        :src="iframe"
        frameborder="0" 
        allowFullScreen="true" 
        class="w-full h-full"
      >
      </iframe>
    </div>
  </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

export default {    
  emits: ['clear-dashboard'], // Eventos que se generan en este componente

  props: {
    iframe: String,
    title: String,
  },
  methods: {
    goBack(){
      this.$emit('clear-dashboard');
    },
  },
  components: {
    FontAwesomeIcon,
  },
};
</script>

<style scoped>
  .iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 65.25%; /* Aspect ratio 16:9 */
    height: 0;
    overflow: hidden;
  }

  .iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
</style>

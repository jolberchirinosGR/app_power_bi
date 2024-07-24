<template>
  <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-4 gap-4 mb-4" v-if="!iframe">
    <fwb-card v-for="(item, index) in filteredData" :key="index" img-alt="Desk" :img-src="item.img" variant="image" @click="openFormModal(item)">
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ item.title }}
        </h5>
      </div>
    </fwb-card>
  </div>

  <DataModal ref="dataModal" @open-iframe="sendInfoToIframe"></DataModal>

  <Iframe v-if="iframe" :iframe="iframe.src" :title="iframe.title" @clear-dashboard="onClearDashboard"></Iframe>
</template>

<script>
import { useAuthUserStore } from '../stores/AuthUserStore';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { FwbCard, FwbModal, FwbButton } from 'flowbite-vue';
import data from '../stores/data.js';
import Iframe from './Iframe.vue';
import DataModal from './DataModal.vue';

export default {
  components: {
    FwbCard,
    FwbModal,
    FwbButton,
    FontAwesomeIcon,
    Iframe,
    DataModal,
  },
  data() {
    return {
      iframe: null,
      isShowModal: false,
      item: null,
      data,
      usserLogged: useAuthUserStore().user,
    };
  },
  computed: {
    filteredData() {
      return this.data.filter(item => this.checkPermission(item));
    }
  },
  methods: {
    sendInfoToIframe(info) {
      this.iframe = info;
      this.closeFormModal();
    },
    onClearDashboard() {
      this.iframe = false;
      this.title = '';
    },
    openFormModal(item) {
      this.$refs.dataModal.openFormModal(item);
    },
    closeFormModal() {
      this.$refs.dataModal.closeFormModal();
    },
    checkPermission(itemData) {

      let hasPermission = false; //Comienza sin permisos 

      itemData.cards.forEach(card => { //Recorre los permisos que necesita el card
        if (!!this.usserLogged.permissions.find(dataPermission => dataPermission.description === card.permission)) hasPermission = true; //Si el usuario logeado tiene el permiso hasPermission pasa a true
      });

      return hasPermission; //Devuelve la info si puede acceder al card o no
    }
  },
};
</script>

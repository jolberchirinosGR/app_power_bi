<template>
  <fwb-modal v-if="isShowModal" @close="closeFormModal" persistent class="fixed top-0 left-0 right-0 z-50">
    <template #header>
      <div class="flex items-center text-lg text-gray-500 dark:text-white">
        <strong>
          Datos de la empresa {{ item.title }}
        </strong>
      </div>
    </template>

    <template #body>
      <div class="space-y-2">
        <!-- Cards -->
        <fwb-card v-for="(card, cardIndex) in filteredCards" :key="cardIndex" @click="openIframe({ src: card.iframe, title: card.description })">
          <div class="p-3">
            <p class="text-2xl text-gray-700 dark:text-gray-400">
              <!-- <font-awesome-icon :icon="['fas', card.icon ]"/> -->
              <strong class="ml-2">
                {{ card.title }}
              </strong>
            </p>
          </div>
        </fwb-card>
        <!-- Card with Submenu -->
        <fwb-card v-for="(subitem, subIndex) in filteredCardWithSubItem" :key="subIndex" class="mb-2">
          <div class="p-3">
            <!-- Title dropmenu -->
            <p class="text-2xl text-gray-700 dark:text-gray-400 cursor-pointer" @click="toggleDropdown(subIndex)">
              {{ subitem.title }}
              <font-awesome-icon :icon="['fas', subitem.dropdownOpen ? 'chevron-up' : 'chevron-down']" />
            </p>
          </div>
          <!-- Dropdown menu -->
          <div v-if="subitem.dropdownOpen" class="relative">
            <div class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <div class="py-2" v-for="(final, finalIndex) in subitem.data" :key="finalIndex" @click="openIframe({ src: final.iframe, title: final.description })">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  <font-awesome-icon :icon="['fas', final.icon]"/>
                  {{ final.data }}
                </a>
              </div>
            </div>
          </div>
        </fwb-card>
      </div>
    </template>

    <template #footer>
      <div class="flex justify-between">
        <fwb-button @click="closeFormModal" color="alternative">
          <font-awesome-icon :icon="['fas', 'times']"/>
          Cerrar
        </fwb-button>
        <fwb-button  color="green">
          <font-awesome-icon :icon="['fas', 'save']"/>
          Guardar
        </fwb-button>
      </div>
    </template>
  </fwb-modal>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { FwbCard, FwbModal, FwbButton } from 'flowbite-vue';
import { useAuthUserStore } from '../stores/AuthUserStore';

export default {
  emits: ['open-iframe'],
  components: {
    FwbCard,
    FwbModal,
    FwbButton,
    FontAwesomeIcon,
  },
  data() {
    return {
      isShowModal: false,
      item: null,
    };
  },
  computed: {
    usserLogged() {
      return useAuthUserStore().user;
    },
    filteredCards() {
      if (!this.item) return [];
      return this.item.cards.filter(card => this.checkPermission(card.permission));
    },
    filteredCardWithSubItem() {
      if (!this.item) return [];
      return this.item.cardWithSubItem.filter(subitem => this.checkPermission(subitem.permission));
    }
  },
  methods: {
    openFormModal(item) {
      this.item = item;
      this.isShowModal = true;
    },
    closeFormModal() {
      this.item = null;
      this.isShowModal = false;
    },
    openIframe(iframe) {
      this.$emit('open-iframe', iframe);
    },
    toggleDropdown(subIndex) {
      this.item.cardWithSubItem[subIndex].dropdownOpen = !this.item.cardWithSubItem[subIndex].dropdownOpen;
    },
    checkPermission(permission) {
      if (!this.usserLogged || !this.usserLogged.permissions) return false;
      return !!this.usserLogged.permissions.find(dataPermission => dataPermission.description === permission);
    }
  },
};
</script>

<template>
  <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mb-4" v-if="!iframe">
    <fwb-card v-for="(item, index) in data" :key="index" img-alt="Desk" :img-src="item.img" variant="horizontal">
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ item.title }}
        </h5>
        <div class="space-y-2">
          <!-- Cards -->
          <fwb-card v-for="(card, cardIndex) in item.cards" :key="cardIndex" class="mb-2" @click="sendInfoToIframe({ src: card.iframe, title: card.description })">
            <div class="p-3">
              <p class="font-normal text-gray-700 dark:text-gray-400">
                {{ card.title }}
                <font-awesome-icon :icon="['fas', card.icon ]" />
              </p>
            </div>
          </fwb-card>
          <!-- Card with Submenu -->
          <fwb-card v-for="(subitem, subIndex) in item.cardWithSubItem" :key="subIndex" class="mb-2">
            <div class="p-3">
              <!-- Title dropmenu -->
              <p class="font-normal text-gray-700 dark:text-gray-400 cursor-pointer" @click="toggleDropdown(index, subIndex)">
                {{ subitem.title }}
                <font-awesome-icon :icon="['fas', subitem.dropdownOpen ? 'chevron-up' : 'chevron-down']" />
              </p>
            </div>
            <!-- Dropdown menu -->
            <div v-if="subitem.dropdownOpen" class="relative">
              <div class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="py-2" v-for="(final, finalIndex) in subitem.data" :key="finalIndex" @click="sendInfoToIframe({ src: final.iframe, title: final.description })">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    <font-awesome-icon :icon="['fas', final.icon]"/>
                    {{ final.data }}
                  </a>
                </div>
              </div>
            </div>
          </fwb-card>
        </div>
      </div>
    </fwb-card>
  </div>

  <Iframe v-if="iframe"
    :iframe="iframe.src"
    :title="iframe.title"
    @clear-dashboard="onClearDashboard"
  ></Iframe>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { FwbCard } from 'flowbite-vue';
import data from '../stores/data.js';
import Iframe from './Iframe.vue';

export default {
  components: {
    FwbCard,
    FontAwesomeIcon,
    Iframe,
  },
  data() {
    return {
      iframe: null,
      data,
    };
  },
  methods: {
    toggleDropdown(index, cardIndex) {
      this.data[index].cardWithSubItem[cardIndex].dropdownOpen = !this.data[index].cardWithSubItem[cardIndex].dropdownOpen;
    },
    sendInfoToIframe(info){
      this.iframe = info;
    },
    onClearDashboard(){
      this.iframe = false;
      this.title = '';
    },
  },
};
</script>

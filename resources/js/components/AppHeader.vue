<script setup>

import {
  BookOutline as BookIcon,
  HomeOutline as HomeIcon,
  PersonOutline as PersonIcon,
  WineOutline as WineIcon
} from "@vicons/ionicons5";

import {NLayoutHeader, NIcon, useMessage} from 'naive-ui'
import AppLogo from './AppLogo.vue'
import {defineComponent,h} from "vue";
import { RouterLink, useRoute } from 'vue-router'

function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}

const menuOptions = [
  {
    label: () => h(
      RouterLink,
      {
        to: {
          name: "dashboard",
          params: {
            lang: "en-US"
          }
        }
      },
      { default: () => "Dashboard" }
    ),
    key: "go-back-home",
    icon: renderIcon(HomeIcon)
  }
];


// const route = useRoute()
//
// function navItemIsCurrent(item) {
//   return route.path === item.href
// }

</script>

<template>
  <n-layout-header bordered class="nav" :style="style">
    <n-text tag="div" class="ui-logo" :depth="1" @click="handleLogoClick">
      <AppLogo/>
      <span v-if="!isMobile">Naive UI</span>
    </n-text>
  </n-layout-header>
  <n-layout-header>
    <n-menu mode="horizontal" :inverted="inverted" :options="menuOptions" bordered />
  </n-layout-header>
</template>

<style scoped>
.ui-logo {
  cursor: pointer;
  display: flex;
  align-items: center;
  font-size: 18px;
}

.ui-logo > svg {
  margin-right: 12px;
  padding: 0px 40px;
  height: 75px;
  width: 200px;
}
</style>

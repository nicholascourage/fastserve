<script setup>

import {NLayoutHeader, NIcon} from 'naive-ui'
import AppLogo from './AppLogo.vue'
import {h} from "vue";
import {RouterLink} from 'vue-router';
import ThemeModeSwitch from "./ThemeModeSwitch.vue";

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
          },
        }
      },
      { default: () => "Dashboard" }
    ),
    key: "dashboard",
  },
  {
    label: () => h(
      RouterLink,
      {
        to: {
          name: "tasks",
          params: {
            lang: "en-US"
          }
        }
      },
      { default: () => "Tasks" }
    ),
    key: "tasks",
  }
];
</script>

<template>
  <n-layout-header bordered class="nav" :style="style">
    <n-flex justify="space-between" class="items-center">
      <div class="ui-logo">
        <AppLogo/>
      </div>
      <div>
        <ThemeModeSwitch/>
      </div>
    </n-flex>
  </n-layout-header>
  <n-layout-header>
    <n-menu mode="horizontal" :inverted="inverted" :options="menuOptions" bordered  />
  </n-layout-header>
</template>

<style scoped>

.nav {
  padding: 0px 40px;
  align-items: center;
}
.ui-logo {

  cursor: pointer;

  font-size: 18px;
}


.ui-logo > svg {
  margin-right: 12px;

  height: 75px;
  width: 200px;
}
</style>

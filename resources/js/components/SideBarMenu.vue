<script setup>
import {
  BookOutline,  CartOutline , NavigateCircleOutline,
  PricetagsOutline,
} from "@vicons/ionicons5";
import {h} from "vue";
import {NIcon} from "naive-ui";

function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}

const menuOptions = [
  {
    label: "Food Menu(s)",
    key: "food-menus",
    icon: renderIcon(BookOutline),
    children: [
      {
        type: "group",
        label: "Manage",
        key: "manage",
        children: [
          {
            label: "Menu Overview",
            key: "menu-overview",
            icon: renderIcon(NavigateCircleOutline)
          },
          {
            label: "Categories",
            key: "categories",
            icon: renderIcon(PricetagsOutline)
          },
          {
            label: "Products",
            key: "products",
            icon: renderIcon(CartOutline)
          },

        ]
      },
    ]
  }
];
</script>
<template>
  <n-layout-sider
    bordered
    show-trigger
    collapse-mode="width"
    :inverted="inverted"
  >
    <n-menu
      :inverted="inverted"
      :collapsed-width="64"
      :collapsed-icon-size="22"
      :options="menuOptions"
    />
  </n-layout-sider>
</template>
<style scoped>

</style>

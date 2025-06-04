<script setup>
import {BookOutline as BookIcon, PersonOutline as PersonIcon} from "@vicons/ionicons5";
import {h} from "vue";
import {NIcon} from "naive-ui";

function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}

const menuOptions = [
  {
    label: "Food Menu(s)",
    key: "food-menu",
    icon: renderIcon(BookIcon),
    // children: [
    //   {
    //     type: "group",
    //     label: "People",
    //     key: "people",
    //     children: [
    //       {
    //         label: "Narrator",
    //         key: "narrator",
    //         icon: renderIcon(PersonIcon)
    //       },
    //       {
    //         label: "Sheep Man",
    //         key: "sheep-man",
    //         icon: renderIcon(PersonIcon)
    //       }
    //     ]
    //   },
    //
    //   {
    //     label: "Food",
    //     key: "food",
    //   },
    //   {
    //     label: "The past increases. The future recedes.",
    //     key: "the-past-increases-the-future-recedes"
    //   }
    // ]
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

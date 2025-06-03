<script>
import {
  BookOutline as BookIcon,
  PersonOutline as PersonIcon,
  WineOutline as WineIcon
} from "@vicons/ionicons5";
import AppHeader from './components/AppHeader.vue';
import { darkTheme, NIcon, } from 'naive-ui';
import { useLoadingBar } from 'naive-ui'

import { defineComponent, h,ref } from 'vue';
function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}
const menuOptions = [
  {
    label: "Hear the Wind Sing",
    key: "hear-the-wind-sing",
    icon: renderIcon(BookIcon)
  },
  {
    label: "Pinball 1973",
    key: "pinball-1973",
    icon: renderIcon(BookIcon),
  },
  {
    label: "A Wild Sheep Chase",
    key: "a-wild-sheep-chase",
    icon: renderIcon(BookIcon)
  },
  {
    label: "Dance Dance Dance",
    key: "Dance Dance Dance",
    icon: renderIcon(BookIcon),
    children: [
      {
        type: "group",
        label: "People",
        key: "people",
        children: [
          {
            label: "Narrator",
            key: "narrator",
            icon: renderIcon(PersonIcon)
          },
          {
            label: "Sheep Man",
            key: "sheep-man",
            icon: renderIcon(PersonIcon)
          }
        ]
      },

      {
        label: "Food",
        key: "food",
      },
      {
        label: "The past increases. The future recedes.",
        key: "the-past-increases-the-future-recedes"
      }
    ]
  }
];

export default defineComponent({
  components: {
    AppHeader
  },
  setup() {
    const theme = ref(darkTheme); // set to darkTheme by default; can be toggled


    return {
      theme,
      inverted: ref(false),
      menuOptions,
    };
  }
});
</script>

<template>
    <n-config-provider :theme="theme">


      <n-layout class="h-dvh" >
        <n-layout-header  bordered>
          <AppHeader/>
        </n-layout-header>
        <n-layout has-sider>
          <n-layout-sider
            bordered
            show-trigger
            collapse-mode="width"
            :collapsed-width="64"
            :width="240"
            :native-scrollbar="false"
            :inverted="inverted"

          >
            <n-menu
              :inverted="inverted"
              :collapsed-width="64"
              :collapsed-icon-size="22"
              :options="menuOptions"
            />
          </n-layout-sider>
          <n-layout content-style="padding: 24px;">
            <n-h1>{{ $route.meta.title }}</n-h1>
            <main>
              <RouterView />
            </main>
          </n-layout>
        </n-layout>
        <n-layout-footer :inverted="inverted" bordered>
          Footer Footer Footer
        </n-layout-footer>
      </n-layout>
  <!--    <div class="min-h-full">-->
  <!--      <AppHeader />-->
  <!--      <div class="py-10">-->
  <!--        <header>-->
  <!--          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">-->
  <!--            <h1 class="text-3xl font-bold tracking-tight">-->
  <!--              {{ $route.meta.title }}-->
  <!--            </h1>-->
  <!--          </div>-->
  <!--        </header>-->
  <!--        <main>-->
  <!--          <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">-->
  <!--            <RouterView />-->
  <!--          </div>-->
  <!--        </main>-->
  <!--      </div>-->
  <!--    </div>-->
    </n-config-provider>

</template>

<script>
import { useTheme } from '@/composables/useTheme'
import AppHeader from './components/AppHeader.vue';
import SideBarMenu from "./components/SideBarMenu.vue";
import { darkTheme, NIcon, } from 'naive-ui';
import { defineComponent, h,ref } from 'vue';
import AppFooter from "./components/AppFooter.vue";

export default defineComponent({
  components: {
    AppFooter,
    SideBarMenu,
    AppHeader
  },
  setup() {
    const { theme } = useTheme()
    return {
      theme,
      darkTheme,
      inverted: ref(false)
    }
  }
});
</script>

<template>
    <n-config-provider :theme="theme">
      <n-layout class="h-dvh" >
        <n-layout-header bordered>
          <AppHeader/>
        </n-layout-header>
        <n-layout has-sider>
          <SideBarMenu />
          <n-layout content-style="padding: 30px 40px;">
            <n-h1 prefix="bar" align-text>
              <n-text type="primary">
                {{ $route.meta.title }}
              </n-text>
            </n-h1>
            <main>
              <RouterView />
            </main>
          </n-layout>
        </n-layout>
        <n-layout-footer :inverted="inverted" bordered>
          <AppFooter/>
        </n-layout-footer>
      </n-layout>
    </n-config-provider>

</template>

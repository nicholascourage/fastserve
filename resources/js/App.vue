<script>
import AppHeader from './components/AppHeader.vue';
import SideBarMenu from "./components/SideBarMenu.vue";
import { defineComponent, onMounted, h,ref } from 'vue';
import { loadingBarApiRef } from './routes/router'

import AppFooter from "./components/AppFooter.vue";

import { useLoadingBar } from 'naive-ui'


export default defineComponent({
  name: 'App',
  components: {
    AppFooter,
    SideBarMenu,
    AppHeader
  },
  setup() {
    const loadingBar = useLoadingBar()
    onMounted(() => {
      loadingBarApiRef.value = loadingBar
      loadingBar.finish()
    })
  }

});
</script>

<template>
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

</template>

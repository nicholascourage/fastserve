<script>
import { defineComponent, h,ref } from 'vue';

import { useTheme } from '@/composables/useTheme'
import { darkTheme, NIcon, } from 'naive-ui';

import App from './App.vue';

export default defineComponent({
  name: 'AppProvider',
  components: {
    App
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
      <n-loading-bar-provider>
        <App/>
      </n-loading-bar-provider>
    </n-config-provider>

</template>

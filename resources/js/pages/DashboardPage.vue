<template>
  <n-config-provider :theme="theme">
    <n-card> Your current system theme is {{ osTheme }}. </n-card>
  </n-config-provider>
</template>
<script>
import { darkTheme, useOsTheme } from "naive-ui";
import { computed, defineComponent } from "vue";

export default defineComponent({
  setup() {
    const osThemeRef = useOsTheme();
    return {
      theme: computed(() => osThemeRef.value === "dark" ? darkTheme : null),
      osTheme: osThemeRef
    };
  }
});
</script>

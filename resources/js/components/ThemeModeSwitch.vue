<script setup>
import { useTheme } from '@/composables/useTheme'
import { MoonOutline, SunnyOutline } from "@vicons/ionicons5";
// Shared theme
import {computed} from "vue";

const { mode } = useTheme()

// Reactive switch state
const isDark = computed({
  get: () => mode.value === 'dark',
  set: (val) => {
    mode.value = val ? 'dark' : 'light'
  }
})


</script>

<template>
  <n-switch v-model:value="isDark" size="large">
    <template #checked-icon>
      <n-icon :component="SunnyOutline" />
    </template>
    <template #unchecked-icon>
      <n-icon :component="MoonOutline" />
    </template>
  </n-switch>
</template>

<style scoped>

</style>

<script setup>
import { NLayoutHeader, NSpace, NButton } from 'naive-ui'
import AppLogo from './AppLogo.vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const navigation = [
  { name: 'Dashboard', href: '/', current: true },
  { name: 'Tasks', href: '/tasks', current: false },
  { name: 'Menus', href: '/menus', current: false },

]

function navItemIsCurrent(item) {
  return route.path === item.href
}
</script>

<template>
  <n-layout-header bordered class="bg-white">
    <div class="flex justify-between items-center px-4 max-w-7xl mx-auto h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <app-logo class="h-8" />
      </div>

      <!-- Navigation Links -->
      <n-space :size="24" class="hidden sm:flex">
        <RouterLink
          v-for="item in navigation"
          :key="item.name"
          :to="item.href"
        >
          <n-button
            text
            :type="navItemIsCurrent(item) ? 'primary' : 'default'"
            class="text-sm font-medium"
          >
            {{ item.name }}
          </n-button>
        </RouterLink>
      </n-space>
    </div>
  </n-layout-header>
<!--  <nav class="border-b border-gray-200 bg-white">-->
<!--    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">-->
<!--      <div class="flex h-16 justify-between">-->
<!--        <div class="flex">-->
<!--          <div class="flex shrink-0 items-center">-->
<!--            <appLogo class="h-8" />-->
<!--          </div>-->
<!--          <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">-->
<!--            <RouterLink-->
<!--              v-for="item in navigation"-->
<!--              :key="item.name"-->
<!--              :to="item.href"-->
<!--              :class="[-->
<!--                navItemIsCurrent(item)-->
<!--                  ? 'border-indigo-500'-->
<!--                  : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',-->
<!--                'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium',-->
<!--              ]"-->
<!--            >-->
<!--              {{ item.name }}-->
<!--            </RouterLink>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </nav>-->
</template>

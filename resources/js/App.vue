<script setup>
import AppHeader from './components/AppHeader.vue'
</script>

<template>
  <div class="min-h-full">
    <AppHeader />

    <div class="py-10">
      <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight">
            {{ $route.meta.title }}
          </h1>
        </div>
      </header>
      <main>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
          <RouterView />
        </div>
      </main>
    </div>
  </div>
</template>

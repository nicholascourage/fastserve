<script setup>
defineProps({
  label: {
    type: String,
    required: true,
  },
  errors: {
    type: Array,
    default: null,
  },
})
</script>
<template>
  <div>
    <label class="block text-sm/6 font-medium text-gray-900">
      {{ label }}
    </label>
    <div class="mt-2">
      <slot />
    </div>
    <template v-if="errors">
      <p v-for="error in errors" class="mt-2 text-sm text-red-600">
        {{ error }}
      </p>
    </template>
  </div>
</template>

<script setup>

import PrimaryButton from "./PrimaryButton.vue";
import axios from "axios";

const toggleTask = async (task) => {
  try {
    const updatedStatus = !task.is_completed
    const response = await axios.put(`/api/tasks/${task.id}`, {
      is_completed: updatedStatus,
    })

    task.is_completed = response.data.task.is_completed // Update local state
  } catch (error) {
    console.error('Failed to update task status:', error)
  }
}
defineProps({
  tasks: {
    type: Array,
    required: true,
  },
})
</script>

<template>
  <ul
    role="list"
    class="divide-y divide-gray-100 overflow-hidden bg-white shadow-xs ring-1 ring-gray-900/5 sm:rounded-xl"
  >
    <li
      v-for="task in tasks"
      :key="task.id"
      class="relative flex justify-between gap-x-6 px-4 py-5 sm:px-6"
    >
      <div class="text-sm/6 font-semibold">
        {{ task.title }}
      </div>
      <div class="flex">
        <div class="text-sm/6 text-green-500" v-if="!task.is_completed">Completed</div>
        <div class="text-sm/6 text-red-500" v-else>Not Completed</div>
        <PrimaryButton @click="toggleTask(task)" class="ml-5">Complete </PrimaryButton>
      </div>
    </li>
  </ul>
</template>

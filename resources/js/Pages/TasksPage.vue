<script setup>
import { ref, onMounted, watch } from 'vue'
import axios from 'axios'

const search = ref('')
import TaskList from '../components/TaskList.vue'
import PrimaryButton from '../components/PrimaryButton.vue'
const tasks = ref([])
const loading = ref(false)
const completedOnly = ref(false)

async function loadTasks() {
  const response = await axios.get('/api/tasks')
  tasks.value = response.data.data
}

loadTasks()

const fetchTasks = async () => {
  loading.value = true
  try {
    const response = await axios.get('/api/tasks', {
      params: {
        title: search.value,
        is_completed: completedOnly.value ? 1 : undefined

      }
    })
    tasks.value = response.data.data // Laravel resource response format
  } catch (error) {
    console.error('Failed to fetch tasks:', error)
    tasks.value = []
  } finally {
    loading.value = false
  }
}

// Fetch on initial load
onMounted(fetchTasks)

// Optionally debounce typing or watch `search` to auto-fetch
watch(search, () => {
  fetchTasks()
})

const toggleCompleted = () => {
  completedOnly.value = !completedOnly.value
  fetchTasks()
}
</script>

<template>
  <div>
    <div class="mb-4 flex justify-end">
      <RouterLink to="/tasks/create">
        <PrimaryButton>Add Task</PrimaryButton>
      </RouterLink>

    </div>
    <font-awesome-icon icon="fa-solid fa-house" />

    <div class="flex pb-5">
      <input
        v-model="search"
        @input="fetchTasks"
        type="text"
        placeholder="Search by task title..."
        class="border-3 bg-white border-blue-500 rounded-lg px-3 py-2 w-full "
      />
      <PrimaryButton class="ml-5" @click="toggleCompleted">
        <span v-if="!completedOnly">Show Completed</span>
        <span v-else>Show All</span>
      </PrimaryButton>

    </div>
    <TaskList :tasks="tasks" />
    <p v-if="!tasks.length && !loading">No tasks found</p>
  </div>

</template>

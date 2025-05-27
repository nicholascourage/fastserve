<script setup>
import PrimaryButton from '../components/PrimaryButton.vue'
import BlankButton from '../components/BlankButton.vue'
import TextInput from '../components/TextInput.vue'
import TextareaInput from '../components/TextareaInput.vue'
import InputGroup from '../components/InputGroup.vue'
import { reactive, ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = reactive({
  title: '',
  description: '',
})

const formErrors = ref({})

async function submit() {
  formErrors.value = {}
  try {
    await axios.post('/api/tasks', form)
    router.push('/tasks')
  } catch (error) {
    if (error.response && error.response.status === 422) {
      formErrors.value = error.response.data.errors
    } else {
      console.error('An unexpected error occurred:', error)
    }
  }
}
</script>

<template>
  <form
    class="bg-white shadow-xs ring-1 ring-gray-900/5 sm:rounded-xl"
    @submit.prevent="submit"
  >
    <div class="px-4 py-6 sm:p-8">
      <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <InputGroup
          label="Task Title"
          :errors="formErrors.title"
          class="sm:col-span-4"
        >
          <TextInput v-model="form.title" />
        </InputGroup>

        <InputGroup
          label="Task Description"
          :errors="formErrors.description"
          class="col-span-full"
        >
          <TextareaInput v-model="form.description" />
        </InputGroup>
      </div>
    </div>
    <div
      class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8"
    >
      <RouterLink to="/tasks">
        <BlankButton>Cancel</BlankButton>
      </RouterLink>
      <PrimaryButton type="submit">Save</PrimaryButton>
    </div>
  </form>
</template>

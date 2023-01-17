<script setup>
import { Head, useForm, usePage } from "@inertiajs/inertia-vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const inertia = usePage().props.value;
const form = useForm({
  title: "",
  description: "",
  user_id: inertia.user.id,
});

const submit = () => {
  form.post(route("horario"), {
    onFinish: () => form.reset("title", "description"),
  });
};
</script>
<template>
  <Head title="Horario" />
  <div class="flex flex-col justify-center items-center h-80">
    <form @submit.prevent="submit">
      <div>
        <InputLabel for="title" value="Title" />
        <TextInput
          id="title"
          v-model="form.title"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="title"
        />
        <InputError class="mt-2" :message="form.errors.title" />
      </div>

      <div class="mt-4">
        <InputLabel for="description" value="Description" />
        <textarea
          id="description"
          v-model="form.description"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm resize-none"
          autofocus
          autocomplete="description"
        />
        <InputError class="mt-2" :message="form.errors.description" />
      </div>

      <PrimaryButton
        class="ml-4 mt-2"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Add
      </PrimaryButton>
    </form>
  </div>
</template>

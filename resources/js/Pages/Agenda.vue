<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import { useForm, usePage, Head } from "@inertiajs/inertia-vue3";

const inertia = usePage().props.value;
const form = useForm({
  title: "",
  note: "",
  datetime: "",
  user_id: inertia.user.id,
});

const submit = () => {
  form.post(route("agenda"), {
    onFinish: () => form.reset("title", "note", "datetime"),
  });
};

defineProps({ reminders: Array });
</script>
<template>
  <Head title="Agenda" />
  <AppLayout title="Agenda">
    <template #header>
      <h1>Agenda</h1>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
          <div class="w-1/2">
            <ul>
              <li v-for="reminder in reminders">
                {{ reminder.title }} - {{ reminder.date }}
              </li>
            </ul>
          </div>
          <div class="w-1/2 flex justify-center items-center">
            <form @submit.prevent="submit" class="flex flex-col p-5">
              <input
                type="text"
                name="title"
                id="title"
                placeholder="Title"
                v-model="form.title"
              />
              <input
                type="datetime-local"
                name="datetime"
                id="datetime"
                v-model="form.datetime"
              />
              <textarea
                v-model="form.note"
                placeholder="Add a note"
                class="resize-none"
              />
              <PrimaryButton
                class="ml-4 mt-2"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Add
              </PrimaryButton>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

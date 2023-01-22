<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { defineProps, ref } from "vue";
import DeleteIcon from "../Components/icons/DeleteIcon.vue";
import EditIcon from "../Components/icons/EditIcon.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
const form = useForm({
  title: "",
  note: "",
  datetime: "",
});
const submit = () => {
  form.put(route("agenda.update", props.reminder.id), {
    onFinish: () => form.reset("title", "note", "datetime"),
  });
};

const deleteReminder = () => {
  form.delete(route("agenda.destroy", props.reminder.id));
};
const open = ref(false);
// get a pathname parameter

const props = defineProps({
  reminder: Object,
  edit: Object,
});
</script>
<template>
  <div>
    <button @click="open = true">
      <EditIcon />
    </button>
    <button @click="deleteReminder">
      <DeleteIcon />
    </button>
    <div
      v-if="open"
      class="flex flex-col justify-center items-center absolute top-32 left-1/4 h-2/3 w-1/2 bg-emerald-300 z-10 rounded-md"
    >
      <form @submit.prevent="submit" class="flex flex-col">
        <input
          type="text"
          name="title"
          id="title"
          :placeholder="reminder.title"
          v-model="form.title"
        />
        <input
          type="datetime-local"
          name="datetime"
          id="datetime"
          :placeholder="reminder.datetime"
          required
          v-model="form.datetime"
        />
        <textarea
          v-model="form.note"
          :placeholder="reminder.note"
          class="resize-none"
        />
        <PrimaryButton
          class="ml-4 mt-2"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
          @click="submit"
        >
          Add
        </PrimaryButton>
      </form>
      <button @click="open = false">Close</button>
    </div>
  </div>
</template>

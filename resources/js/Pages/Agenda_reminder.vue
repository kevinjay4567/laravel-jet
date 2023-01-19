<script setup>
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "../Components/PrimaryButton.vue";
const form = useForm({
  title: "",
  note: "",
  datetime: "",
});

const submit = () => {
  form.put(route("agenda.edit"), {
    onFinish: () => form.reset("title", "note", "datetime"),
  });
};

const open = ref(false);

defineProps({
  reminder: Object,
  edit: Object,
});
</script>
<template>
  <div>
    <button @click="open = true">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="25"
        height="25"
        fill="#ccce3b"
        viewBox="0 0 256 256"
      >
        <rect width="256" height="256" fill="none"></rect>
        <path
          d="M92.7,216H48a8,8,0,0,1-8-8V163.3a7.9,7.9,0,0,1,2.3-5.6l120-120a8,8,0,0,1,11.4,0l44.6,44.6a8,8,0,0,1,0,11.4l-120,120A7.9,7.9,0,0,1,92.7,216Z"
          fill="none"
          stroke="#ccce3b"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="16"
        ></path>
        <line
          x1="136"
          y1="64"
          x2="192"
          y2="120"
          fill="none"
          stroke="#ccce3b"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="16"
        ></line>
        <line
          x1="164"
          y1="92"
          x2="68"
          y2="188"
          fill="none"
          stroke="#ccce3b"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="16"
        ></line>
        <line
          x1="95.5"
          y1="215.5"
          x2="40.5"
          y2="160.5"
          fill="none"
          stroke="#ccce3b"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="16"
        ></line>
      </svg>
    </button>
    <div
      v-if="open"
      class="flex flex-col justify-center items-center absolute top-1/2 left-1/4 h-2/3 w-1/2 bg-emerald-300 z-10 rounded-md"
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
        >
          Add
        </PrimaryButton>
      </form>
      <button @click="open = false">Close</button>
    </div>
  </div>
</template>

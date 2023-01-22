<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import ReminderTable from "../Components/ReminderTable.vue";
import ReminderIcon from "../Components/icons/ReminderIcon.vue";
import ExamIcon from "../Components/icons/ExamIcon.vue";
import HomeworkIcon from "../Components/icons/HomeworkIcon.vue";
import { useForm, usePage, Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const inertia = usePage().props.value;
const openReminder = ref(false);
const openExam = ref(false);
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
const orderReminders = (reminders) => {
  return reminders.sort((a, b) => {
    return new Date(a.date) - new Date(b.date);
  });
};
</script>
<template>
  <Head title="Agenda" />
  <AppLayout title="Agenda">
    <div class="pt-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
          <div class="w-1/2 flex flex-col justify-center items-center p-4">
            <ReminderTable :reminders="orderReminders(reminders)" />
          </div>
          <div class="w-1/2 flex flex-col justify-center items-center">
            <button
              @focusin="openReminder = true"
              @focusout="openReminder = false"
              class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 flex justify-center items-center gap-6"
            >
              Reminder
              <ReminderIcon />
            </button>
            <form
              v-if="openReminder"
              @submit.prevent="submit"
              class="flex flex-col p-5"
            >
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
                required
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
            <button
              @focusin="openExam = true"
              @focusout="openExam = false"
              class="focus:outline-none text-white bg-purple-400 hover:bg-purple-500 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 flex justify-center items-center gap-12"
            >
              Exam
              <ExamIcon />
            </button>
            <form v-if="openExam">
              <input type="text" name="title" id="" placeholder="Title" />
            </form>
            <button
              class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 flex justify-center items-center gap-2"
            >Homeworks
            <HomeworkIcon />
          </button>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

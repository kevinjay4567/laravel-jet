<script setup>
import { defineProps, ref } from "vue";

import Agenda_reminder from "../Pages/Agenda_reminder.vue";
import SearchIcon from "../Components/icons/SearchIcon.vue";
import CheckIcon from "../Components/icons/CheckIcon.vue";
import ArrowLeftIcon from "../Components/icons/ArrowLeftIcon.vue";
import ArrowRightIcon from "../Components/icons/ArrowRightIcon.vue";
import DeleteIcon from "./icons/DeleteIcon.vue";
import { Link } from "@inertiajs/inertia-vue3";

const firstPage = ref(0);
const lastPage = ref(5);

const props = defineProps({ reminders: Array });
const shortReminder = (reminders) => {
  return reminders.slice(firstPage.value, lastPage.value);
};
const nextPage = () => {
  if (lastPage.value >= props.reminders.length) {
    return;
  }
  firstPage.value += 6;
  lastPage.value += 6;
};

const prevPage = () => {
  if (firstPage.value === 0) {
    return;
  }
  firstPage.value -= 6;
  lastPage.value -= 6;
};
</script>
<template>
  <div class="flex flex-col">
    <div class="shadow-md sm:rounded-lg min-h-[433px]">
      <div class="pb-4 bg-white">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
          <div
            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
          >
            <SearchIcon />
          </div>
          <input
            type="text"
            id="table-search"
            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Search for items"
          />
        </div>
      </div>
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="p-4">
              <CheckIcon />
            </th>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Date</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="bg-white border-b hover:bg-gray-50"
            v-for="reminder in shortReminder(reminders)"
          >
            <td class="w-4 p-4">
              <div class="flex items-center">
                <input
                  id="checkbox-table-search-1"
                  type="checkbox"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                />
                <label for="checkbox-table-search-1" class="sr-only"
                  >checkbox</label
                >
              </div>
            </td>
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              {{ reminder.title }}
            </th>
            <td class="px-6 py-4">{{ reminder.date }}</td>
            <td class="px-6 py-4">
              <div class="flex gap-2">
                <Agenda_reminder :reminder="reminder" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="w-full flex justify-between px-4 rounded-b-md pt-2">
      <button @click="prevPage">
        <ArrowLeftIcon />
      </button>
      <button @click="nextPage">
        <ArrowRightIcon />
      </button>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps, ref } from "vue";
import Agenda_reminder from "../Pages/Agenda_reminder.vue";

const open = ref(false);

defineProps({ reminders: Array });
</script>
<template>
  <div class="shadow-md sm:rounded-lg" id="container">
    <div class="pb-4 bg-white">
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative mt-1">
        <div
          class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
        >
          <svg
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"
            ></path>
          </svg>
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
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              fill="#37a959"
              viewBox="0 0 256 256"
            >
              <rect width="256" height="256" fill="none"></rect>
              <polyline
                points="216 72 104 184 48 128"
                fill="none"
                stroke="#37a959"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="16"
              ></polyline>
            </svg>
          </th>
          <th scope="col" class="px-6 py-3">Title</th>
          <th scope="col" class="px-6 py-3">Date</th>
          <th scope="col" class="px-6 py-3">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="bg-white border-b hover:bg-gray-50"
          v-for="reminder in reminders"
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
              <a href="#" class="font-medium text-red-600 hover:underline"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="25"
                  height="25"
                  fill="#c83909"
                  viewBox="0 0 256 256"
                >
                  <rect width="256" height="256" fill="none"></rect>
                  <line
                    x1="216"
                    y1="56"
                    x2="40"
                    y2="56"
                    fill="none"
                    stroke="#c83909"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="16"
                  ></line>
                  <line
                    x1="104"
                    y1="104"
                    x2="104"
                    y2="168"
                    fill="none"
                    stroke="#c83909"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="16"
                  ></line>
                  <line
                    x1="152"
                    y1="104"
                    x2="152"
                    y2="168"
                    fill="none"
                    stroke="#c83909"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="16"
                  ></line>
                  <path
                    d="M200,56V208a8,8,0,0,1-8,8H64a8,8,0,0,1-8-8V56"
                    fill="none"
                    stroke="#c83909"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="16"
                  ></path>
                  <path
                    d="M168,56V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40V56"
                    fill="none"
                    stroke="#c83909"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="16"
                  ></path></svg
              ></a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="w-full flex justify-between px-4 rounded-b-md">
      <button>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="25"
          height="25"
          fill="#4e4cc8"
          viewBox="0 0 256 256"
        >
          <rect width="256" height="256" fill="none"></rect>
          <line
            x1="216"
            y1="128"
            x2="40"
            y2="128"
            fill="none"
            stroke="#4e4cc8"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="16"
          ></line>
          <polyline
            points="112 56 40 128 112 200"
            fill="none"
            stroke="#4e4cc8"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="16"
          ></polyline>
        </svg>
      </button>
      <button>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="25"
          height="25"
          fill="#4e4cc8"
          viewBox="0 0 256 256"
        >
          <rect width="256" height="256" fill="none"></rect>
          <line
            x1="40"
            y1="128"
            x2="216"
            y2="128"
            fill="none"
            stroke="#4e4cc8"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="16"
          ></line>
          <polyline
            points="144 56 216 128 144 200"
            fill="none"
            stroke="#4e4cc8"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="16"
          ></polyline>
        </svg>
      </button>
    </div>
  </div>
</template>

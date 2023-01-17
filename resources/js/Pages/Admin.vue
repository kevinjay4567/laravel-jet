<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({ users: Array });
</script>
<template>
  <AppLayout title="Admin">
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h1>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <h1 class="text-xl">Users</h1>
          <Head title="Admin" />
          <ul>
            <li v-for="user in users" :key="user.id" class="flex gap-2">
              <Link :href="`/users/${user.id}`" class="text-blue-400">
                {{ user.name }}
              </Link>
              <span>{{ user.email }} - Role: {{ user.role }}</span>
            </li>
          </ul>
          <div>
            <h1 class="text-xl">
              Total users: {{ users.length }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

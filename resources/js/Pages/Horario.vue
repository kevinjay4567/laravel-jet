<script setup>
import AppLayoutVue from "../Layouts/AppLayout.vue";
import ActivityForm from "../Components/ActivityForm.vue";
import ActivityTable from "../Components/ActivityTable.vue";

defineProps({ activities: Array });
</script>
<template>
  <AppLayoutVue title="Horario">
    <template #header>
      <h1>Horario</h1>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
          <div class="w-1/2">
            <ActivityForm />
          </div>
          <div class="w-1/2 flex justify-center items-center">
            <ul>
              <li v-for="activity in activities">
              {{ activity.title }} - {{ activity.user_id }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </AppLayoutVue>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
  activities: {
    type: Array,
    required: true,
  },
});
</script>
<template>
  <div>
    <h1>Activity Table</h1>
    <ul>
      <li v-for="{ title, description, user_id } in activities">
        <p v-if="user_id === $page.props.user.id">
          {{ title }} - {{ description }}
        </p>
      </li>
    </ul>
  </div>
</template>

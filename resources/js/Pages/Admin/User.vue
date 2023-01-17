<script setup>

defineProps({ user: Object });
</script>
<template>
  <div>
    <h1>user {{ user.name }}</h1>
  </div>
</template>

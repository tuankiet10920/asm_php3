<script setup>
import UserTemplate from './views/user_template.vue';
import AdminTemplate from './views/admin_template.vue';
import { ref } from 'vue'
// 0: user || 1: admin
const template = ref(1)
</script>

<template>
  <UserTemplate v-if="template === 0" />
  <AdminTemplate v-if="template === 1" />
</template>

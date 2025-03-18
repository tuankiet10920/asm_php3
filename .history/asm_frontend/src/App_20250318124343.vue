<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './views/users/Header.vue'
import Footer from './views/users/Footer.vue'
</script>

<template>
  <Header />  
  <RouterView />
  <Footer />  
</template>

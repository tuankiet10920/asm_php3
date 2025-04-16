<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './users/Header.vue'
import Footer from './users/Footer.vue'
import { onMounted } from 'vue'

const props = defineProps({
    config: Object
})



onMounted(() => {
    // <link type="text/css" href="css/bookbook.css" rel="stylesheet" />
    let link = document.createElement('link')
    link.type = "text/css"
    link.href = "css/bookbook.css"
    link.rel = "stylesheet"
    document.getElementsByTagName('head')[0].appendChild(link)
})
</script>
<template>
    <Header />
    <RouterView />
    <Footer />
</template>
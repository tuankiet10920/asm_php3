<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref, onMounted } from 'vue'


console.log(document.getElementsByTagName('head'));
// <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
//   <!-- Nucleo Icons -->
//   <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
//   <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
//   <!-- Font Awesome Icons -->
//   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
//   <!-- CSS Files -->
//   <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
const relrels = 'stylesheet';
const hrefhrefs = [
    "https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700",
    "https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css",
    "https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css",
    "../assets/css/argon-dashboard.css?v=2.1.0"
]
for (let index = 0; index < href.length; index++) {
    let link = document.createElement('link')
    link.rel = relrels
    link.href = hrefhrefs['index']
    if(index == hrefhrefs.length - 1){
        link.id = "pagestyle"
    }
}
</script>
<template></template>
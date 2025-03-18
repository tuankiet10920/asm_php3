import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/users/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/users/AboutView.vue'),
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/users/ContactView.vue'),
    },
    {
      path: '/careers',
      name: 'careers',
      component: () => import('../views/users/CareerView.vue'),
    },
  ],
})

export default router

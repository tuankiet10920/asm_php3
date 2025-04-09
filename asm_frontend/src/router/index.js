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

    // admin
    
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/admin/Dashboard.vue'),
    },
    {
      path: '/tables',
      name: 'tables',
      component: () => import('../views/admin/TablesView.vue'),
    },
    {
      path: '/tutors',

      name: 'tutors',
      component: () => import('../views/admin/TutorsView.vue'),
    },
    {
      path: '/students',

      name: 'students',
      component: () => import('../views/admin/StudentsView.vue'),
    },
    {
      path: '/classes',

      name: 'Classes',
      component: () => import('../views/admin/ClassesView.vue'),
    },
    {
      path: '/payments',

      name: 'Payments',
      component: () => import('../views/admin/PaymentsView.vue'),
    },
    {
      path: '/revenues',

      name: 'Revenues',
      component: () => import('../views/admin/RevenuesView.vue'),
    }
    ,
    {
      path: '/feedbacks',

      name: 'Feedbacks',
      component: () => import('../views/admin/FeedbacksView.vue'),
    },
    {
      path: '/typeclass',

      name: 'typeclass',
      component: () => import('../views/admin/TypeclassView.vue'),
    }
  ],
})

export default router

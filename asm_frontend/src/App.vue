<script setup>
import UserTemplate from './views/user_template.vue';
import Login from './views/login_template.vue';
import AdminTemplate from './views/admin_template.vue';
import TutorTemplate from './views/tutor_template.vue';
import StudentTemplate from './views/student_template.vue';
import { ref, reactive, onMounted, computed, watch } from 'vue';
import { useRouter, useRoute } from 'vue-router';

const code = ref(0);

const router = useRouter();
const route = useRoute();

if (!localStorage.getItem('code')) {
  localStorage.setItem('code', 0)
}

const config = reactive({
  cur: {
    code: 0,
    tem_cur: 'user',
    data: {},
  },
  type: [
    { code: 0, tem: 'user', component: UserTemplate },
    { code: 1, tem: 'admin', component: AdminTemplate },
    { code: 2, tem: 'tutor', component: TutorTemplate },
    { code: 3, tem: 'student', component: StudentTemplate },
  ],
});

const currentComponent = computed(() => {
  const currentType = config.type.find((t) => t.code === code.value);
  return currentType ? currentType.component : UserTemplate; // Default to UserTemplate if not found
});

watch(code.value, (newCode) => {
  if (newCode !== 0) {
    router.push('/dashboard');
  }
});

onMounted(() => {
  const storedCode = localStorage.getItem('code'); // Store code itself rather than tem, much easier to use
  if (storedCode) {
    code.value = parseInt(storedCode); // Parse the stored code as an integer
    const currentType = config.type.find((t) => t.code === code.value);
    if (currentType) {
      config.cur.code = code.value;
      config.cur.tem_cur = currentType.tem;
      if (localStorage.getItem(currentType.tem)) {
        config.cur.data = JSON.parse(localStorage.getItem(currentType.tem));
      }
    }
    if (code.value !== 0) {
      if (route.path === '/') {
        router.push('/dashboard');
      }
    }
  }
});

</script>

<template>
  <component :is="currentComponent" :config="config" />
</template>
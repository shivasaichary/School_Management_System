<script setup>
import StudentAuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <StudentAuthenticatedLayout>

    <Head title="StudentHome" />

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Home Page</h2>
    </template>

    <div>
      <h2>Welcome, {{ studentName }}</h2>
      <div class="student-info mb-5">
        <p><strong>Student ID:</strong> {{ studentId }}</p>
      </div>
    </div>

    <!-- Add other content specific to the student home page here -->

  </StudentAuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      studentId: 3,
      studentName: 'Student',
    };
  },
};
</script>

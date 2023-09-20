<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="TeacherHome" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teacher Home page</h2>
        </template>

        <div>
            <h2>Welcome, {{ teacherName }}</h2>
            <div class="teacher-info mb-5   ">
                <p><strong>Teacher ID:</strong> {{ teacherId }}</p>
            </div>
        </div>

    </TeacherAuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      teacherId: 2,
      teacherName: 'teacher',
    };
  },
};
</script>

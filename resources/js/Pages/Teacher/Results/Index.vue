<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    results: {
        type: Array
    }
})
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Student Results" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Results</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <!-- Add a link to create new student results -->
                        <Link class="btn btn-primary" :href="route('admin.student-results.create')">
                        Add New Student Result
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Subject</th>
                                    <th>Marks Obtained</th>
                                    <th>Date</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="result in results" :key="result.id">
                                    <td>{{ result.id }}</td>
                                    <td>{{ result.student.name }}</td>
                                    <td>{{ result.subject.name }}</td>
                                    <td>{{ result.marks_obtained }}</td>
                                    <td>{{ result.created_at }}</td>
                                    <td>
                                        <Link :href="route('admin.student-results.edit', result)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>
                                    <td>
                                        <Link :href="route('admin.student-results.update', result)"
                                            class="btn btn-secondary">
                                        Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    results: {
        type: Array
    }
})
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Student Results" />

        <template #header>
            <h2 class="font-semibold text-xl text-red-500 leading-tight">Student Results</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-400 bg-transparent overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 text-gray-900 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Code</th>
                                    <th>Student Name</th>
                                    <th>Subject Id</th>
                                    <th>Subject Name</th>
                                    <th>Marks Obtained</th>
                                    <th>Date Of Exam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="result in results" :key="result.id">
                                    <td>{{ result.id }}</td>
                                    <td>{{ result.student_code }}</td>
                                    <td>{{ result.student_name }}</td>
                                    <td>{{ result.subject_code }}</td>
                                    <td>{{ result.subject_name }}</td>
                                    <td>{{ result.marks_obtained }}</td>
                                    <td>{{ result.date_of_exam }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

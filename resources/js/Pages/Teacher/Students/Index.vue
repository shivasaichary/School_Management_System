<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    students: {
        type: Array
    }
})
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Students" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="('student.create')" :href="route('teacher.students.create')">
                        Add New Student
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <table class="table">

                            <thead>

                                <tr>
                                    <th>ID</th>

                                    <th>Student Name</th>

                                    <th>Age</th>

                                    <th>Gender</th>

                                    <th>Phone Number</th>

                                    <th>Email</th>

                                    <th>Address</th>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr v-for="student in students" :key="student.id">

                                    <td>{{ student.id }}</td>

                                    <td>{{ student.student_name }}</td>

                                    <td>{{ student.age }}</td>

                                    <td>{{ student.gender }}</td>

                                    <td>{{ student.phone_number }}</td>

                                    <td>
                                        <a :href="'mailto:' + student.email" class="text-link">{{
                                            student.email
                                        }}</a>
                                    </td>

                                    <td>{{ student.address }}</td>

                                    <td>
                                        <Link :href="route('teacher.students.edit', student)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <Link :href="route('teacher.students.update', student)" class="btn btn-secondary">
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

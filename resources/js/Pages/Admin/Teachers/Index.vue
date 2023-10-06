<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    teachers: {
        type: Array
    }
});


</script>

<template>
    <AuthenticatedLayout>

        <Head title="Teachers" />

        <template #header>
            <h2 class="font-semibold text-xl text-blue-800 leading-tight">Teachers Data</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-2xl xl:rounded-3xl">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="('teacher.create')" :href="route('admin.teachers.create')">
                        Add New Teacher
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 bg-orange-100 overflow-x-scroll">
                        <table class="table">

                            <thead>

                                <tr>
                                    <th>ID</th>

                                    <th>Teacher Code</th>

                                    <th>Teacher Name</th>

                                    <th>Email</th>

                                    <th>D.O.B</th>

                                    <th>Age</th>

                                    <th>Gender</th>

                                    <th>Subject</th>

                                    <th>Designation</th>

                                    <th>Phone Number</th>

                                    <th>Address</th>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr v-for="teacher in teachers" :key="teacher.id">

                                    <td>{{ teacher.id }}</td>

                                    <td>{{ teacher.teacher_code }}</td>

                                    <td>{{ teacher.teacher_name }}</td>

                                    <td>
                                        <a :href="'mailto:' + teacher.email" class="text-link">{{
                                            teacher.email
                                        }}</a>
                                    </td>

                                    <td>{{ teacher.date_of_birth }}</td>

                                    <td>{{ teacher.age }}</td>

                                    <td>{{ teacher.gender }}</td>

                                    <td>{{ teacher.subject }}</td>

                                    <td>{{ teacher.designation }}</td>

                                    <td>{{ teacher.phone_number }}</td>

                                    <td>{{ teacher.address }}</td>

                                    <td>
                                        <Link :href="route('admin.teachers.edit', teacher)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <Link :href="route('admin.teachers.delete', teacher)" class="btn btn-secondary">
                                        delete
                                        </Link>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<!-- <script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    teachers: {
        type: Array
    }
})
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Teachers" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teachers</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="can('teacher.create')" :href="route('admin.teachers.create')">
                        Add New Teacher
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Teacher Name</th>
                                    <th>principal Name</th>
                                    <th>principal Email</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th></th>
                                    <th></th>
                                    <!-- Add more teacher-specific table headings as needed --
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="teacher in teachers" :key="teacher.id">

                                    <td>{{ teacher.id }}</td>

                                    <td>{{ teacher.teacher_name }}</td>

                                    <td>{{ teacher.principal.name }}</td>

                                    <td>
                                        <a :href="'mailto:' + teacher.principal.email" class="text-link">{{
                                            teacher.principal.email
                                        }}</a>
                                    </td>

                                    <td>
                                        <div class="badge badge-primary">{{ teacher.city.name }}</div>
                                    </td>

                                    <td>{{ teacher.address }}</td>


                                    <td>
                                        <Link :href="route('admin.teachers.edit', teacher)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>


                                    <td>
                                        <Link :href="route('admin.teachers.update', teacher)" class="btn btn-secondary">
                                        delete
                                        </Link>
                                    </td>

                                    <!-- Add more teacher-specific table data as needed --
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> -->

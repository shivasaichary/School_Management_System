<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    parents: {
        type: Array
    }
})
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="parents" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">parents Data</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="('parent.create')" :href="route('teacher.parents.create')">
                        Add New parent
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <table class="table">

                            <thead>

                                <tr>
                                    <th>ID</th>

                                    <th>parent Name</th>

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

                                <tr v-for="parent in parents" :key="parent.id">

                                    <td>{{ parent.id }}</td>

                                    <td>{{ parent.parent_name }}</td>

                                    <td>{{ parent.age }}</td>

                                    <td>{{ parent.gender }}</td>

                                    <td>{{ parent.phone_number }}</td>

                                    <td>
                                        <a :href="'mailto:' + parent.email" class="text-link">{{
                                            parent.email
                                        }}</a>
                                    </td>

                                    <td>{{ parent.address }}</td>

                                    <td>
                                        <Link :href="route('teacher.parents.edit', parent)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <Link :href="route('teacher.parents.update', parent)" class="btn btn-secondary">
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

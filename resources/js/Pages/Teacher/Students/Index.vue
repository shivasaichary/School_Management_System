<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

defineProps({
    students: {
        type: Array
    }
})

const form = useForm({

})

const deleteStudent = (student) => {
    form.delete(route('teacher.students.delete', student))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Students" />

        <template #header>
            <h2 class="font-semibold text-xl text-red-500 leading-tight">Students Data</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-2xl xl:rounded-3xl">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="('student.create')" :href="route('teacher.students.create')">
                        Add New Student
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 bg-yellow-100 overflow-x-scroll">
                        <table class="table">

                            <thead>

                                <tr>
                                    <th>ID</th>

                                    <th>Student Name</th>

                                    <th>Student Code</th>

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

                                    <td>{{ student.student_code }}</td>


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
                                        <!-- <Link :href="route('teacher.students.delete', student)" class="btn btn-secondary">
                                        Delete
                                        </Link> -->

                                        <form @submit.prevent="deleteStudent(student)" method="post">

                                            <button type="submit" class="btn btn-secondary">
                                                Delete
                                            </button>
                                        </form>

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

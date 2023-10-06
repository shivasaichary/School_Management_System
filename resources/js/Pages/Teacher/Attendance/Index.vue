
<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from '@inertiajs/vue3';

defineProps({
    attendances: {
        type: Array
    }
})

const form = useForm({

})

const deleteAttendance = (attendance) => {
    form.delete(route('teacher.attendance.delete', attendance))
}

</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Student Attendance" />
        <template #header>
            <h2 class="font-semibold text-xl text-blue-800 leading-tight">Students Attendance</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-2xl xl:rounded-3xl">
                    <div class="p-6">
                        <Link class="btn btn-primary" :href="route('teacher.attendance.create')">
                        Add New Attendance
                        </Link>
                    </div>
                    <div class="p-6 text-gray-900 bg-orange-100 overflow-x-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Code</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="attendance in attendances" :key="attendance.id">
                                    <td>{{ attendance.id }}</td>
                                    <td>{{ attendance.student_code }}</td>
                                    <td>{{ attendance.student_name }}</td>
                                    <td>{{ attendance.date }}</td>
                                    <td>{{ attendance.status }}</td>
                                    <td>
                                        <Link :href="route('teacher.attendance.edit', attendance)"
                                            class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>
                                    <td>
                                        <!-- <Link :href="route('teacher.attendance.update', attendance)"
                                            class="btn btn-secondary">
                                        Delete
                                        </Link> -->

                                        <form @submit.prevent="deleteAttendance(attendance)" method="post">

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

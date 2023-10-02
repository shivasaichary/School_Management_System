<script setup>
import StudentAuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <StudentAuthenticatedLayout>

        <Head title="StudentAttendance" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Attendance</h2>
        </template>

        <div class="background-image">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-2xl xl:rounded-3xl m-5 ">
                        <div class="p-8 text-gray-900 ">
                        <div class="grid sm:grid gap-x-14 gap-y-10 ">


                            <!-- Display Student Attendance Records in a Table -->
                            <div class="flex flex-col mt-3 text-center">
                                <h3 class="text-2xl font-semibold mb-3">Attendance Records</h3>
                                <table class="table-auto justify-items-center">
                                    <thead>
                                        <tr>
                                            <th class="border px-4 py-2">Date</th>
                                            <th class="border px-4 py-2">Day</th>
                                            <th class="border px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="record in attendanceRecords" :key="record.id">
                                            <td class="border px-4 py-2">{{ record.date }}</td>
                                            <td class="border px-4 py-2">{{ getDay(record.date) }}</td>
                                            <td class="border px-4 py-2">{{ record.status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </StudentAuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            StudentId: 'TES-ID1.',
            StudentName: 'Sunny',
            className: 'Tenth',
            section: 'A',
            schoolName: 'TE institutions.',
            address: 'H.No:36/b, Vivekanandha Nagar, Hyderabad.',
            attendanceRecords: [
                // Example attendance records data (you should replace this with actual data)
                { id: 1, date: '2023-09-26', status: 'Present' },
                { id: 1, date: '2023-09-25', status: 'Absent' },
                { id: 1, date: '2023-09-24', status: 'Holiday' },
                { id: 1, date: '2023-09-23', status: 'Present' },
                { id: 1, date: '2023-09-22', status: 'Late' },
                { id: 1, date: '2023-09-21', status: 'Present' },
                { id: 1, date: '2023-09-20', status: 'Absent' },
                { id: 1, date: '2023-09-19', status: 'Present' },
                { id: 1, date: '2023-09-18', status: 'Present' },
                { id: 1, date: '2023-09-17', status: 'Holiday' },
                { id: 1, date: '2023-09-16', status: 'Present' },

            ],

        };

    },

    methods: {
        getDay(date) {
            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const dayIndex = new Date(date).getDay();
            return daysOfWeek[dayIndex];
        },
    },
};
</script>

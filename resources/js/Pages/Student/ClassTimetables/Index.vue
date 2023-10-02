<script setup>
import StudentAuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <StudentAuthenticatedLayout>

        <Head title="StudentClassTimetables" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Class Timetable</h2>
        </template>

        <div class="background-image">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-2xl xl:rounded-3xl m-5">
                    <div class="p-8 text-gray-900">
                        <div class="grid sm:grid gap-x-14 gap-y-10">

                            <!-- Display Class Timetable -->

                            <!-- <div class="flex flex-col mt-3 text-center">
                                <h3 class="text-2xl font-semibold mb-3">Class Timetable</h3>
                                <table class="table-auto justify-items-center"> -->

                            <div class="flex flex-col m-3 text-center align-center" v-for="day in daysOfWeek" :key="day">
                                <h3 class="text-2xl font-semibold mb-3">{{ day }}</h3>
                                <table class=" table-auto justify-items-center">

                                    <!-- Add your class timetable headers here -->
                                    <thead>
                                        <tr>
                                            <th class="border px-4 py-2">Teacher</th>
                                            <th class="border px-4 py-2">Subject</th>
                                            <th class="border px-4 py-2">Time</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Add your class timetable data here -->
                                        <tr v-for="timetableEntry in shuffle(getClassTimetable(day))"
                                            :key="timetableEntry.id">
                                            <td class="border px-4 py-2">{{ timetableEntry.Teacher }}</td>
                                            <td class="border px-4 py-2">{{ timetableEntry.subject }}</td>
                                            <td class="border px-4 py-2">{{ timetableEntry.time }}</td>

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

            classTimetable: [
                { id: 1, day: 'Monday', time: '9:00 AM - 10:00 AM', subject: 'Telugu', Teacher: 'teacher1' },
                { id: 1, day: 'Monday', time: '10:00 AM - 11:00 AM', subject: 'Hindi', Teacher: 'teacher2' },
                { id: 1, day: 'Monday', time: '11:00 AM - 12:00 PM', subject: 'English', Teacher: 'teacher3' },
                { id: 1, day: 'Monday', time: '1:00 PM - 2:00 PM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 1, day: 'Monday', time: '2:00 PM - 3:00 PM', subject: 'Science', Teacher: 'teacher5' },
                { id: 1, day: 'Monday', time: '3:00 PM - 4:00 PM', subject: 'social', Teacher: 'teacher6' },

                { id: 2, day: 'Tuesday', time: '9:00 AM - 10:00 AM', subject: 'Hindi', Teacher: 'teacher2' },
                { id: 2, day: 'Tuesday', time: '10:00 AM - 11:00 AM', subject: 'English', Teacher: 'teacher3' },
                { id: 2, day: 'Tuesday', time: '11:00 AM - 12:00 PM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 2, day: 'Tuesday', time: '1:00 PM - 2:00 PM', subject: 'Science', Teacher: 'teacher5' },
                { id: 2, day: 'Tuesday', time: '2:00 PM - 3:00 PM', subject: 'social', Teacher: 'teacher6' },
                { id: 2, day: 'Tuesday', time: '3:00 PM - 4:00 PM', subject: 'Telugu', Teacher: 'teacher1' },

                { id: 3, day: 'wednesday', time: '9:00 AM - 10:00 AM', subject: 'English', Teacher: 'teacher3' },
                { id: 3, day: 'wednesday', time: '10:00 AM - 11:00 AM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 3, day: 'wednesday', time: '11:00 AM - 12:00 PM', subject: 'science', Teacher: 'teacher5' },
                { id: 3, day: 'wednesday', time: '1:00 PM - 2:00 PM', subject: 'social', Teacher: 'teacher6' },
                { id: 3, day: 'wednesday', time: '2:00 PM - 3:00 PM', subject: 'Telugu', Teacher: 'teacher1' },
                { id: 3, day: 'wednesday', time: '3:00 PM - 4:00 PM', subject: 'Hindi', Teacher: 'teacher2' },

                { id: 4, day: 'Thursday', time: '9:00 AM - 10:00 AM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 4, day: 'Thursday', time: '10:00 AM - 11:00 AM', subject: 'Science', Teacher: 'teacher5' },
                { id: 4, day: 'Thursday', time: '11:00 AM - 12:00 PM', subject: 'Social', Teacher: 'teacher6' },
                { id: 4, day: 'Thursday', time: '1:00 PM - 2:00 PM', subject: 'Telugu', Teacher: 'teacher1' },
                { id: 4, day: 'Thursday', time: '2:00 PM - 3:00 PM', subject: 'Hindi', Teacher: 'teacher2' },
                { id: 4, day: 'Thursday', time: '3:00 PM - 4:00 PM', subject: 'English', Teacher: 'teacher3' },

                { id: 5, day: 'Friday', time: '9:00 AM - 10:00 AM', subject: 'Telugu', Teacher: 'teacher1' },
                { id: 5, day: 'Friday', time: '10:00 AM - 11:00 AM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 5, day: 'Friday', time: '11:00 AM - 12:00 PM', subject: 'Hindi', Teacher: 'teacher2' },
                { id: 5, day: 'Friday', time: '1:00 PM - 2:00 PM', subject: 'Science', Teacher: 'teacher5' },
                { id: 5, day: 'Friday', time: '2:00 PM - 3:00 PM', subject: 'Social', Teacher: 'teacher6' },
                { id: 5, day: 'Friday', time: '3:00 PM - 4:00 PM', subject: 'Yoga', Teacher: 'teacher7' },

                { id: 6, day: 'Saturday', time: '9:00 AM - 10:00 AM', subject: 'English', Teacher: 'teacher3' },
                { id: 6, day: 'Saturday', time: '10:00 AM - 11:00 AM', subject: 'Computers', Teacher: 'teacher8' },
                { id: 6, day: 'Saturday', time: '11:00 AM - 12:00 PM', subject: 'Maths', Teacher: 'teacher4' },
                { id: 6, day: 'Saturday', time: '1:00 PM - 2:00 PM', subject: 'Science', Teacher: 'teacher5' },
                { id: 6, day: 'Saturday', time: '2:00 PM - 3:00 PM', subject: 'Social', Teacher: 'teacher6' },
                { id: 6, day: 'Saturday', time: '3:00 PM - 4:00 PM', subject: 'Games', Teacher: 'teacher9' },

            ],
            daysOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        };
    },

    methods: {
        getClassTimetable(day) {
            // Filter the class timetable data for the specified day
            return this.classTimetable.filter(entry => entry.day.toLowerCase() === day.toLowerCase());
        },

        shuffle(array) {
            // Fisher-Yates shuffle algorithm
            let currentIndex = array.length, randomIndex, temporaryValue;
            while (currentIndex !== 0) {
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }
            return array;
        },
    },
};
</script>

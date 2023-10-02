<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="TeacherHome" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teacher Home page</h2>
        </template>

        <div class="background-image">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-2xl xl:rounded-3xl m-5">
                    <div class="p-8 text-gray-900 ">
                        <div class="grid sm:grid gap-x-14 gap-y-10 ">

                            <div class="text-4xl m-3 text-center">Welcome</div>
                            <div class="grid grid-cols-2 gap-x-10 gap-y-10 ">

                                <div class="text-xl mt-2">
                                    <div class="teacher-info m-5 ">
                                        <p><strong>Teacher Name:</strong> {{ teacherName }} </p>
                                    </div>
                                    <div class="teacher-info m-5 ">
                                        <p><strong>Teacher ID:</strong> {{ teacherId }}</p>
                                    </div>
                                    <div class="subject-info m-5">
                                        <p><strong>Subject:</strong> {{ subject }}</p>
                                    </div>
                                    <div class="school-name m-5">
                                        <p><strong>School Name:</strong> {{ schoolName }}</p>
                                    </div>
                                    <div class="address m-5">
                                        <p><strong>Address:</strong> {{ address }}</p>
                                    </div>
                                    <div class="designation m-5">
                                        <p><strong>Designation:</strong> {{ designation }}</p>
                                    </div>
                                    <div class="about m-5">
                                        <p><strong>About:</strong> {{ about }}</p>
                                    </div>
                                </div>

                                <div class="p-3 m-4 ">
                                    <img src="../Pages/Images/teacher-home.jpg" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </TeacherAuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            teacherId: 'TET-ID1.',
            teacherName: 'teacher',
            subject: 'Maths.',
            schoolName: 'TE institutions.',
            address: 'H.No:365/b, Vivekanandha Nagar, vizag.',
            designation: 'B.Ed.',
            about: 'Teaches Mathematical Concepts and Formulas to Students from Elementary to High School.',
        };
    },
};

</script>

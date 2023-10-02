<script setup>
import StudentAuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <StudentAuthenticatedLayout>

        <Head title="StudentHome" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Home page</h2>
        </template>

        <div class="background-image">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-2xl xl:rounded-3xl m-5 ">
                    <div class="p-8 text-gray-900 ">
                        <div class="grid sm:grid gap-x-14 gap-y-10 ">

                            <div class="text-4xl m-3 text-center">Welcome</div>
                            <div class="grid grid-cols-2 gap-x-10 gap-y-10 ">

                                <div class="text-xl mt-2">
                                    <div class="Student-info m-5 ">
                                        <p><strong>Student Name:</strong> {{ StudentName }} </p>
                                    </div>
                                    <div class="Student-info m-5 ">
                                        <p><strong>Student ID:</strong> {{ StudentId }}</p>
                                    </div>
                                    <div class="subject-info m-5">
                                        <p><strong>Class:</strong> {{ className }}</p>
                                    </div>
                                    <div class="address m-5">
                                        <p><strong>Section:</strong> {{ section }}</p>
                                    </div>

                                    <div class="school-name m-5">
                                        <p><strong>School Name:</strong> {{ schoolName }}</p>
                                    </div>
                                    <div class="school-name m-5">
                                        <p><strong>Student Email: </strong><span class="hover-email"> {{ email }}</span></p>
                                    </div>
                                    <div class="address m-5">
                                        <p><strong>Address:</strong> {{ address }}</p>
                                    </div>

                                </div>

                                <div class="p-2 mb-5 ">
                                    <img src="../Pages/Images/student-home.jpg " />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </StudentAuthenticatedLayout>
</template>

<style>
.hover-email {
    color: blue;
    cursor: pointer;
    transition: color 0.2s ease;
}

.hover-email:hover {
    color: red;
}
</style>

<script>
export default {
    data() {
        return {
            StudentId: 'TES-ID1.',
            StudentName: 'Student',
            className: 'Tenth',
            section: 'A',
            schoolName: 'TE institutions.',
            email: 'student@student.com',
            address: 'H.No:36/b, Vivekanandha Nagar, Hyderabad.',
        };
    },
};

</script>

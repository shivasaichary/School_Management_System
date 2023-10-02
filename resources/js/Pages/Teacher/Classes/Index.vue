<script setup>

// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    teachers: {
        type: Array,
    },
    classes: {
        type: Array, //class=cls;
    },
});

const form =useForm({

})

const deletecls = (cls) => {
    form.delete(route('teacher.classes.delete', cls))
}


</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Classes" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class Timetables</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        {{ route('teacher.classes.create') }}
                        <Link class="btn btn-primary" v-if="('cls.create')" :href="route('teacher.classes.create')">
                        Add New Class
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 overflow-x-scroll">

                        <table class="table">

                            <thead>

                                <tr>
                                    <th>ID</th>

                                    <th>Class Name</th>

                                    <th>Section</th>

                                    <th>Subject</th>

                                    <th>Teacher Name</th>

                                    <th>Starting time</th>

                                    <th>Ending time</th>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr v-for="cls in classes" :key="cls.id">

                                    <td>{{ cls.id }}</td>

                                    <td>{{ cls.class_name }}</td>

                                    <td>{{ cls.section }}</td>

                                    <td>{{ cls.subject }}</td>

                                    <td>{{ cls.teacher_name }}</td>

                                    <td>{{ cls.starting_time }}</td>

                                    <td>{{ cls.ending_time }}</td>

                                    <td>
                                        <Link :href="route('teacher.classes.edit', cls)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <!-- <Link :href="route('teacher.classes.delete', cls)" class="btn btn-secondary">
                                        Delete</Link> -->


                                        <form @submit.prevent="deletecls(cls)" method="post">

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

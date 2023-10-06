<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, useForm } from '@inertiajs/vue3';

const page = usePage()

const form = useForm({})

defineProps({
    school: {
        type: Object
    }
})
</script>

<template>
    <AuthenticatedLayout>

        <Head :title="school.school_name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ school.school_name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll flex flex-col gap-8 ">
                        <div v-for="cls in school.classes" :key="cls.id" class="flex flex-col gap-4  ">
                            <div class="flex justify-between">
                                <div class="">
                                    <div class="text-2xl font-bold">CLASS: {{ cls.class_name }}</div>
                                    <div class="text-lg mt-3 font-semibold">SECTION: {{ cls.section }}</div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-6">
                                <div v-for="student in cls.students" :key="student.id"
                                    class="flex justify-between pb-6 border-b gap-4">

                                    <!-- <link :href="route('students',student)" class="grow flex flex-col gap-2"> -->

                                    <div class="grow flex flex-col gap-2">

                                        <div class="">STUDENT NAME: {{ student.student_name }}</div>
                                        <div class="">AGE: {{ student.age }}</div>
                                        <div class="">GENDER: {{ student.gender }}</div>
                                        <div class="">PH.NO: {{ student.phone_number }}</div>
                                        <div class="">EMAIL: {{ student.email }}</div>
                                        <div class="">ADDRESS: {{ student.address }}</div>

                                        <!-- <div class="grow flex items-end">
                                            <button class="btn btn-primary btn-sm" type="button">
                                                Edit student
                                            </button>
                                        </div> -->

                                    </div>

                                    <!-- You can replace this image with student photo -->
                                    <div class="flex flex-col w-52 h-52 mb-2 justify-center gap-2">

                                       <div class="flex">
                                            <img class="w-full h-36 aspect-video rounded"
                                            :src="`https://picsum.photos/seed/${student.id}/200/110?blur=2`" />
                                        </div>

                                            <div class="flex mx-auto">STUDENT ID: {{ student.student_code }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

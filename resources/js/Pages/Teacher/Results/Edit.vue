<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
    result: {
        type: Object
    }
})

const form = useForm({
    student_name: props.result.student_name,
    student_code: props.result.student_code,
    subject_name: props.result.subject_name,
    subject_code: props.result.subject_code,
    marks_obtained: props.result.marks_obtained,
    date_of_exam: props.result.date_of_exam,  //created_at
})

const submit = () => {
    form.patch(route('teacher.results.update', props.result), {
        student_name: form.student_name,
        student_code: form.student_code,
        subject_name: form.subject_name,
        subject_code: form.subject_code,
        marks_obtained: form.marks_obtained,
        date_of_exam: form.date_of_exam,
    })
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit Student Result for ' + result.student_name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit Student Result for ' + result.student_name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <form @submit.prevent="submit" class="flex flex-col gap-4">
                            <div class="form-group">
                                <InputLabel for="student_name" value="Student Name" />
                                <TextInput id="student_name" type="text" v-model="form.student_name"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.student_name" />
                            </div>

                            <div class="form-group">
                                <InputLabel for="student_code" value="Student Code" />
                                <TextInput id="student_code" type="text" v-model="form.student_code"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.student_code" />
                            </div>

                            <div class="form-group">
                                <InputLabel for="subject_name" value="Subject" />
                                <TextInput id="subject_name" type="text" v-model="form.subject_name"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.subject_name" />
                            </div>

                            <div class="form-group">
                                <InputLabel for="subject_code" value="Subject Code" />
                                <TextInput id="subject_code" type="text" v-model="form.subject_code"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.subject_code" />
                            </div>

                            <div class="form-group">
                                <InputLabel for="marks_obtained" value="Marks Obtained" />
                                <TextInput id="marks_obtained" type="number" v-model="form.marks_obtained"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.marks_obtained" />
                            </div>

                            <div class="form-group">
                                <InputLabel for="date_of_exam" value="Date Of Exam" />
                                <input id="date_of_exam" type="date_of_exam" v-model="form.date_of_exam"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.date_of_exam" />
                            </div>

                            <div>
                                <PrimaryButton :processing="form.processing">
                                    Update Student Result
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout></template>

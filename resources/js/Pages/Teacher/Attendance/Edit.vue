<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SelectInput from '@/Components/SelectInput.vue'
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({
    students: {
        type: Array
    },
    studentAttendance: {
        type: Object
    }
})

const form = useForm({
    student_code: props.studentAttendance.student_code,
    date: props.studentAttendance.date,
    status: props.studentAttendance.status
})

const submit = () => {
    form.put(route('teacher.attendance.update', props.studentAttendance))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit Student Attendance for ' + studentAttendance.student_name" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit Student Attendance for ' + studentAttendance.student_name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">

                                <div class="form-group">
                                    <InputLabel for="student_name" value="Student Name" />
                                    <SelectInput id="student_name" v-model="form.student_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.student_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="student_code" value="Student Code" />
                                    <SelectInput id="student_code" v-model="form.student_code"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.student_code" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="date" value="Date" />
                                    <TextInput id="date" type="date" v-model="form.date" :disabled="form.processing" />
                                    <InputError :message="form.errors.date" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="status" value="Status" />
                                    <SelectInput id="status" v-model="form.status" :options="['Present', 'Absent']"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.status" />
                                </div>

                                <div>
                                    <PrimaryButton :processing="form.processing">Update Student Attendance</PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

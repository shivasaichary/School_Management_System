<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';

const props = defineProps({
    student: {
        type: Object
    },
    classes: {
        type: Array
    }
})

const form = useForm({
    // class_id: props.student.class_id,
    student_name: props.student.student_name,
    student_code: props.student.student_code,
    age: props.student.age,
    gender: props.student.gender,
    phone_number: props.student.phone_number,
    email: props.student.email,
    address: props.student.address,
})

const genderOptions = [
    { id: 'male', name: 'Male' },
    { id: 'female', name: 'Female' },
    { id: 'other', name: 'Other' }
]

const submit = () => {
    form.put(route('teacher.students.update', props.student))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit ' + student.student_name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + student.student_name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">
                                <!-- <div class="form-group">
                                    <InputLabel for="class_id" value="Class" />
                                    <TextInput id="class_id" type="text" v-model="form.class_id"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.class_id" />
                                </div> -->

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
                                    <InputLabel for="age" value="Age" />
                                    <TextInput id="age" type="number" v-model="form.age" :disabled="form.processing" />
                                    <InputError :message="form.errors.age" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="gender" value="Gender" />
                                    <SelectInput id="gender" v-model="form.gender" :options="genderOptions"
                                        :disabled="form.processing" :optionValue="`name`" :optionLabel="`name`" />
                                    <InputError :message="form.errors.gender" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="phone_number" value="Phone Number" />
                                    <TextInput id="phone_number" type="text" v-model="form.phone_number"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.phone_number" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" type="email" v-model="form.email" :disabled="form.processing" />
                                    <InputError :message="form.errors.email" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="address" value="Address" />
                                    <TextInput id="address" type="text" v-model="form.address"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.address" />
                                </div>

                                <div>
                                    <PrimaryButton :disabled="form.processing"> Update Student </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

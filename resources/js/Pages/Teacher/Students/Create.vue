<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';

const props = defineProps({
    classes: {
        type: Array
    },
    cls_id: {
        type: String
    }
})

const genderOptions = [
    { id: 'male', name: 'Male' },
    { id: 'female', name: 'Female' },
    { id: 'other', name: 'Other' }
]

const form = useForm({
    // cls_id: props.cls_id,
    student_name: '',
    student_code: '',
    phone_number: '',
    gender: '',
    email: '',
    address: '',
    age:'',
})
const submit = () => {
    form.post(route('teacher.students.store'))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head title="Add New student" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New student</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">

                                <!-- <div class="form-group">
                                    <InputLabel for="cls_id" value="class id" />
                                    <TextInput id="cls_id" type="text" v-model="form.cls_id" :disabled="form.processing" />
                                    <InputError :message="form.errors.cls_id" />
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
                                    <PrimaryButton :disabled="form.processing"> Create New student </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

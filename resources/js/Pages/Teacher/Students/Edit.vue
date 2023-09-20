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
    class_id: props.student.class_id,
    name: props.student.name,
    age: props.student.age
})

const submit = () => {
    form.patch(route('teacher.students.update', props.student))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit ' + student.name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + student.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">
                                <div class="form-group">
                                    <InputLabel for="class_id" value="Class" />
                                    <SelectInput id="class_id" v-model="form.class_id" :options="classes" option-value="id"
                                        option-label="name" :default-option="{
                                            id: '',
                                            name: 'Select Class'
                                        }" :disabled="form.processing" />
                                    <InputError :message="form.errors.class_id" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="name" value="Name" />
                                    <TextInput id="name" type="text" v-model="form.name" :disabled="form.processing" />
                                    <InputError :message="form.errors.name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="age" value="Age" />
                                    <TextInput id="age" type="number" v-model="form.age" :disabled="form.processing" />
                                    <InputError :message="form.errors.age" />
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

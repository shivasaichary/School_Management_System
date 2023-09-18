<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue'
const props = defineProps({
    classes: {
        type: Array
    },
    cls_id: {
        type: String
    }
})
const form = useForm({
    cls_id: props.cls_id,
    name: '',
    price: ''
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
                                <div class="form-group">
                                    <InputLabel for="cls_id" value="cls" />
                                    <SelectInput id="cls" v-model="form.cls_id" :options="classes"
                                        option-value="id" option-label="name" :default-option="{
                                            id: '',
                                            name: 'student cls'
                                        }" :disabled="form.processing" />
                                    <InputError :message="form.errors.cls_id" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="name" value="Name" />
                                    <TextInput id="name" type="text" v-model="form.name" :disabled="form.processing" />
                                    <InputError :message="form.errors.name" />
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

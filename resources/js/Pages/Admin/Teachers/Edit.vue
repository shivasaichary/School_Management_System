<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    teacher: {
        type: Object
    },
})

const form = useForm({
    teacher_name: props.teacher.name,
    email: props.teacher.email,
    subject: props.teacher.subject,
})

const submit = () => {
    form.patch(route('admin.teachers.update', props.teacher.id), {
        onSuccess: () => {
            "Teacher Updated Successfully"
        },
    })
}

</script>


<template>

    <AuthenticatedLayout>

        <Head :title="'Edit ' + teacher.name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + teacher.name }}
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 overflow-x-scroll">

                        <div class="p-6 text-gray-900 overflow-x-scroll">

                            <form @submit.prevent="submit" class="flex flex-col gap-4">

                                <div class="form-group">
                                    <InputLabel for="teacher_name" value="Teacher Name" />
                                    <TextInput id="teacher_name" type="text" v-model="form.teacher_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.teacher_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" type="email" v-model="form.email" :disabled="form.processing" />
                                    <InputError :message="form.errors.email" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="subject" value="Subject" />
                                    <TextInput id="subject" type="text" v-model="form.subject"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.subject" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="address" value="Address" />
                                    <TextareaInput id="address" v-model="form.address" class="resize-none" rows="3"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.address" />
                                </div>

                                <div>
                                    <PrimaryButton :processing="form.processing">Update school</PrimaryButton>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </AuthenticatedLayout>

</template>


<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
    cls: {
        type: Object
    }
})

const form = useForm({
    class_name: props.cls.class_name,
    subject: props.cls.subject,
    section: props.cls.section,
    teacher_name: props.cls.teacher_name,
    starting_time: props.cls.starting_time,
    ending_time: props.cls.ending_time,
})

const submit = () => {
    form.put(route('teacher.classes.update', props.cls))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit ' + cls.class_name" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + cls.class_name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <form @submit.prevent="submit" class="flex flex-col gap-4">
                            <div class="form-group">
                                <InputLabel for="class_name" value="Class Name" />
                                <TextInput id="class_name" type="text" v-model="form.class_name" :disabled="form.processing" />
                                <InputError :message="form.errors.class_name" />
                            </div>
                            <div class="form-group">
                                <InputLabel for="subject" value="Subject" />
                                <TextInput id="subject" type="text" v-model="form.subject" :disabled="form.processing" />
                                <InputError :message="form.errors.subject" />
                            </div>
                            <div class="form-group">
                                <InputLabel for="section" value="Section" />
                                <TextInput id="section" type="text" v-model="form.section" :disabled="form.processing" />
                                <InputError :message="form.errors.section" />
                            </div>
                            <div class="form-group">
                                <InputLabel for="teacher_name" value="Teacher Name" />
                                <TextInput id="teacher_name" type="text" v-model="form.teacher_name"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.teacher_name" />
                            </div>
                            <div class="form-group">
                                <InputLabel for="starting_time" value="Starting Time" />
                                <TextInput id="start_time" type="text" v-model="form.starting_time"
                                    :disabled="form.processing" />
                                <InputError :message="form.errors.starting_time" />
                            </div>
                            <div class="form-group">
                                <InputLabel for="ending_time" value="Ending Time" />
                                <TextInput id="ending_time" type="text" v-model="form.ending_time" :disabled="form.processing" />
                                <InputError :message="form.errors.ending_time" />
                            </div>

                            <div>
                                <PrimaryButton :processing="form.processing">
                                    Update Student class
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

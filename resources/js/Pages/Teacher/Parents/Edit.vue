<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';

const props = defineProps({
    parent: {
        type: Object
    },
})

const form = useForm({
    parent_name: props.parent.parent_name,
    age: props.parent.age,
    gender: props.parent.gender,
    phone_number: props.parent.phone_number,
    email: props.parent.email,
    address: props.parent.address,
})

const genderOptions = [
    { id: 'male', name: 'Male' },
    { id: 'female', name: 'Female' },
    { id: 'other', name: 'Other' }
]

const submit = () => {
    form.patch(route('teacher.parents.update', props.parent))
}
</script>

<template>
    <TeacherAuthenticatedLayout>

        <Head :title="'Edit ' + parent.parent_name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + parent.parent_name }}
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
                                    <TextInput id="class_id" type="text" v-model="form.class_id"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.class_id" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="parent_name" value="parent Name" />
                                    <TextInput id="parent_name" type="text" v-model="form.parent_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.parent_name" />
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
                                    <PrimaryButton :disabled="form.processing"> Update parent </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

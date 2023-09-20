<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

defineProps({
    teacher: {
        type: Object
    }
})

const form = useForm({
    name: '',
    email: '',
    subject: '',
    address: '',
})

const submit = () => {
    form.post(route('admin.teachers.store'))
}

</script>

<template>
    <AuthenticatedLayout>

        <Head title="Add New Teacher" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Teacher</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">


                                <div class="form-group">
                                    <InputLabel for="name" value="Teacher Name" />
                                    <TextInput id="name" type="text" v-model="form.name" :disabled="form.processing" />
                                    <InputError :message="form.errors.name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="email" value="Teacher Email" />
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
                                    <PrimaryButton :disabled="form.processing">Create New Teacher</PrimaryButton>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

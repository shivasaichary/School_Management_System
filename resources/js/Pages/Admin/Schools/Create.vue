<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TextareaInput from '@/Components/TextareaInput.vue'
import TextInput from '@/Components/TextInput.vue'

defineProps({
    cities: {
        type: Array
    }
})

const form = useForm({
    school_name: '',
    email: '',
    principal_name: '',
    city_id: '',
    address: ''
})

const submit = () => {
    form.post(route('admin.schools.store'))
}
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Add New School" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New School</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">
                                <div class="form-group">
                                    <InputLabel for="school_name" value="School Name" />
                                    <TextInput id="school_name" type="text" v-model="form.school_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.school_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="email" value="principal Email" />
                                    <TextInput id="email" type="email" v-model="form.email" :disabled="form.processing" />
                                    <InputError :message="form.errors.email" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="principal_name" value="principal Name" />
                                    <TextInput id="principal_name" type="text" v-model="form.principal_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.principal_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="city_id" value="City" />
                                    <SelectInput id="city_id" v-model="form.city_id" :options="cities" option-value="id"
                                        option-label="name" :default-option="{
                                            id: '',
                                            name: 'City Name'
                                        }" :disabled="form.processing" />
                                    <InputError :message="form.errors.city_id" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="address" value="Address" />
                                    <TextareaInput id="address" v-model="form.address" class="resize-none" rows="3"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.address" />
                                </div>

                                <div>
                                    <PrimaryButton :disabled="form.processing">Create New School</PrimaryButton>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

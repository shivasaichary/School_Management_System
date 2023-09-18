<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TextareaInput from '@/Components/TextareaInput.vue'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
    cities: {
        type: Array
    },
    school: {
        type: Object
    }
})

const form = useForm({
    school_name: props.school.name,
    email: props.principal.email,
    principal_name: props.principal.name,
    city: props.school.city_id,
    address: props.school.address
})

const submit = () => {
    form.patch(route('admin.schools.update', props.school))
}
</script>

<template>
    <AuthenticatedLayout>

        <Head :title="'Edit ' + school.name" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Edit ' + school.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-scroll">
                        <div class="p-6 text-gray-900 overflow-x-scroll">
                            <form @submit.prevent="submit" class="flex flex-col gap-4">
                                <div class="form-group">
                                    <InputLabel for="school_name" value="school Name" />
                                    <TextInput id="school_name" type="text" v-model="form.school_name"
                                        :disabled="form.processing" />
                                    <InputError :message="form.errors.school_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" type="email" v-model="form.email" :disabled="true" />
                                    <InputError :message="form.errors.email" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="principal_name" value="Owner Name" />
                                    <TextInput id="principal_name" type="text" v-model="form.principal_name" :disabled="true" />
                                    <InputError :message="form.errors.principal_name" />
                                </div>

                                <div class="form-group">
                                    <InputLabel for="city" value="City" />
                                    <SelectInput id="city" v-model="form.city" :options="cities" option-value="id"
                                        option-label="name" :default-option="{
                                            id: '',
                                            name: 'City Name'
                                        }" :disabled="form.processing" />
                                    <InputError :message="form.errors.city" />
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

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    schools: {
        type: Array
    }
})
const form = useForm({

})
const deleteSchool = (school) => {
    form.delete(route('admin.schools.delete', school))
}
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Schools" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Schools Data</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" bg-black bg-transparent overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6">
                        <Link class="btn btn-primary" v-if="('school.create')" :href="route('admin.schools.create')">
                        Add New School
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 bg-yellow-100 overflow-x-scroll">
                        <table class="table">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>School Name</th>

                                    <th>principal Name</th>

                                    <th>principal Email</th>

                                    <th>City</th>

                                    <th>Address</th>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>
                                <tr v-for="school in schools" :key="school.id">

                                    <td>{{ school.id }}</td>

                                    <td>{{ school.school_name }}</td>

                                    <td>{{ school.principal.name }}</td>

                                    <td>
                                        <a :href="'mailto:' + school.principal.email" class="text-link">{{
                                            school.email
                                        }}</a>
                                    </td>

                                    <td>
                                        <div class="badge badge-primary">{{ school.city.name }}</div>
                                    </td>

                                    <td>{{ school.address }}</td>


                                    <td>
                                        <Link :href="route('admin.schools.edit', school)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <form @submit.prevent="deleteSchool(school)" method="post">

                                            <button type="submit" class="btn btn-secondary">
                                                Delete
                                            </button>
                                        </form>
                                        <!-- <Link :href="route('admin.schools.delete', school)" class="btn btn-secondary">
                                        delete
                                        </Link> -->
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

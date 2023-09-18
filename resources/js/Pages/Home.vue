<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';

defineProps({
    schools: {
        type: Array
    }
})
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Home" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home page</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-gray-900">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-14 gap-y-10">
                            <div v-for="school in schools" :key="school.id">

                                <!-- <Link href="#" class="flex flex-col gap-2"> -->

                                <Link :href="route('school', school)" class="flex flex-col gap-2">

                                <!-- Adjust the content based on your school or student data -->

                                <div> <img class="w-full aspect-video rounded-xl"
                                        :src="`https://picsum.photos/seed/${school.id}/380/220?blur=2`" />
                                </div>

                                <div class="font-bold text-lg ">
                                     {{ school.school_name }}

                                    <!-- Replace with the appropriate property for school or student name -->

                                </div>

                                <div class="text-s text-gray-500">
                                    ADDRESS: {{ school.address }}
                                </div>

                                <!-- <div class="text-lg text-red-600">
                                    Y.O.E: {{ school.yoe }}
                                </div> -->

                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

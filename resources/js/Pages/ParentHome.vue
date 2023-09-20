<script setup>
import ParentAuthenticatedLayout from '@/Layouts/ParentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <ParentAuthenticatedLayout>

        <Head title="ParentHome" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parent Home Page</h2>
        </template>

        <div>
            <h2>Welcome, {{ parentName }}</h2>
            <div class="parent-info">
                <p><strong>Parent ID:</strong> {{ parentId }}</p>
            </div>
        </div>
        
    </ParentAuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            parentId: 4,
            parentName: 'Parent',
        };
    },
};
</script>

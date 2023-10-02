<script setup>
import StudentAuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template><StudentAuthenticatedLayout>

    <Head title="StudentResult" />
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Result</h2>
    </template>
    <div class="background-image">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl xl:rounded-3xl m-5">
                <div class="p-8 text-gray-900">
                    <div class="grid sm:grid gap-x-14 gap-y-10">

                        <div class="flex flex-col mt-3 text-center">
                            <h3 class="text-2xl font-semibold mb-3">Student Result</h3>
                            <table class="table-auto justify-items-center">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Subject</th>
                                        <th class="border px-4 py-2">Marks</th>
                                        <th class="border px-4 py-2">Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="result in results" :key="result.id">
                                        <td class="border px-4 py-2">{{ result.subject }}</td>
                                        <td class="border px-4 py-2">{{ result.marks }}</td>
                                        <td class="border px-4 py-2">{{ result.grade }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</StudentAuthenticatedLayout></template>

<script>
export default {
    data() {
        return {
            results: [
                { id: 1, subject: 'Telugu', marks: 95, grade: 'A+' },
                { id: 1, subject: 'Hindi', marks: 98, grade: 'A+' },
                { id: 1, subject: 'English', marks: 91, grade: 'A+' },
                { id: 1, subject: 'Maths', marks: 90, grade: 'A+' },
                { id: 1, subject: 'Science', marks: 93, grade: 'A+' },
                { id: 1, subject: 'Social', marks: 96, grade: 'A+' },
            ],
        };
    },
};
</script >

<!-- <script>
// import axios from 'axios';

// export default {
//   data() {
//     return {
//       results: [],
//     };
//   },
//   mounted() {
//     axios.get('/results/1') 
//       .then((response) => {
//         this.results = response.data;
//       })
//       .catch((error) => {
//         console.error('Error fetching student results:', error);
//       });
//   },
// };


//  <template>
    //     <StudentAuthenticatedLayout>

    //         <Head title="StudentResult" />
    //         <template #header>
    //             <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Result</h2>
    //         </template>

    //         <div>
    //             <h1>Results from Database</h1>
    //             <ul>
    //                 <li v-for="result in results" :key="result.id">{{ result.column_name }}</li>
    //             </ul>
    //         </div>
    //     </StudentAuthenticatedLayout>
// </template>


// import { ref, onMounted } from 'vue';
// import axios from 'axios';

// export default {
//     props: {
//     studentId: String, // Define the prop for student ID
//   },
//     setup(props) {
//         const results = ref([]);

//         onMounted(() => {
//             axios.get('student/result/${props.studentId}') // Use the correct route URL
//                 .then((response) => {
//                     results.value = response.data;
//                 })
//                 .catch((error) => {
//                     console.error('Error fetching data:', error);
//                 });
//         });

//         return { results };
//     },
// };
// </script> -->


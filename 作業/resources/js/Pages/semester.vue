<script setup>


</script>
<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {  Link } from '@inertiajs/vue3';
export default {
    
    components: {
        Link,
         AuthenticatedLayout,
     
    },
    props:{
      
    },
    
};
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">課表列表</h2>
            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Link href="/addSemester"><button type="button" class="bg-green-500 ml-1 mt-1 mb-1 p-2 rounded text-white">新增</button></Link>
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead> 
                        <tr>
                            <th>序號</th>
                            <th>學年</th>
                            <th>學期</th>
                            <th>操作</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                                    <td>1</td>
                                    <td>113</td>
                                   <td>上</td>
                                    <td class="flex gap-3">
                                        <button class="rounded text-white bg-green-500 p-2">
                                           寄送
                                        </button>
                                        <Link href="/changeSemester"><button class="rounded text-white bg-blue-500 p-2">
                                                編輯
                                        </button></Link>
                                       
                                        <button class="rounded text-white bg-red-500 p-2">
                                            刪除
                                        </button>
                                    </td>
                                </tr>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
table {
    @apply min-w-full border border-gray-300;
}

th,
td {
    @apply py-2 px-4 border border-gray-300;
}

th {
    @apply bg-gray-200 font-semibold text-left;
}

</style>    
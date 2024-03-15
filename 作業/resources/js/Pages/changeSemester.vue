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

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯課表</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="flex mr-4"> 
                   <div class="flex flex-col ml-4 mt-8 w-1/2 ">
                    學年度
                    <input type="text" class=" h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8 w-1/2">
                   學期
                    <input type="text" class=" h-[30px]">
                   </div>
                </div>
                <div class="flex justify-between mt-8 ml-4 mr-4">
                   <div class="w-2/5 h-60">
                         <div class="all">全部課程</div>   
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead> 
                       <tr >
                       
                        <th >課程</th>
                        <th >教師</th> 
                    </tr>
                        
                    </thead> 
                    <tbody>
                         
                        <tr>
                            <td>國語</td>
                            <td>toyz</td>
                        </tr>
                    </tbody>
                    </table>

                   </div>

                    <div class="flex flex-col justify-center">
                        <div class="text-8xl">➡</div>
                        <div class="text-8xl">⬅</div>
                    </div>

                   <div class="w-2/5 h-60">
                         <div class="all">學期課程</div>   
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead> 
                       <tr >
                       
                        <th >課程</th>
                        <th >教師</th> 
                    </tr>
                        
                    </thead> 
                    <tbody>
                         
                        <tr>
                            <td>國語</td>
                            <td>toyz</td>
                        </tr>
                    </tbody>
                    </table>

                   </div>
                </div>
                  
                   <div class="flex justify-center ml-4 mt-20 mb-12">
                    <Link href="/semester"><button class="rounded text-white bg-gray-500 p-2 mr-4">返回列表</button></Link>
                    <button class="rounded text-white bg-blue-500 p-2 ml-4">儲存</button>
                   </div>
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
.all{
    @apply bg-gray-200 font-semibold py-2 px-4 border border-gray-300 text-center;
}

</style>    
<script setup>

</script>
<script>
import {  Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    
    components: {
            Link,
         AuthenticatedLayout,
        
     
    },
    props:{
        myClasses:{
        type:Array,
        required:true,
      },
    },
    methods: {
        // removeBooks(id){
        //     this.$inertia.post('/removeBooks',{id:id,},{
        //         onSuccess: (res) =>{
        //            const msg= res.props.flash.message;
        //             alert(msg);
        //         } 
               
        //     });
        // }
            addId(id){
                this.$inertia.post('/addId',{
                    id:id,
                });
            },
        removeClasses(id){
            this.$inertia.post('/removeClasses',{id:id,},{
                onSuccess: (res) =>{
                   const msg= res.props.flash.message;
                    alert(msg);
                } 
               
            });
        },
        returnId(){
            this.$inertia.get('/CourseClass', { 
                rule:1,
             });
        },
        allId(){
            this.$inertia.get('/CourseClass', { 
                rule:0,
             });
        }

    },
};
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">課程列表</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Link href="/saveClass"><button type="button" class="bg-green-500 ml-1 mt-1 mb-1 p-2 rounded text-white">新增</button></Link>
                    <button @click="returnId" class="rounded text-white bg-red-500 p-2">
                                            取id19以下
                                        </button>
                                        <button @click="allId" class="rounded text-white bg-red-500 p-2">
                                            取全部
                                        </button>
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead> 
                        <tr>
                            <th>序號</th>
                            <th>課程名稱</th>
                            <th>課程照片</th>
                            <th>操作</th>
                        </tr>
                    </thead> 
                    <tbody >
                        <tr v-for="(item,index) in myClasses" :key="item.id">
                                    <td>{{index+1}}</td>
                                    <td>{{item.className}}</td>
                                    <td>圖片</td>
                                    <td class="flex gap-3">
                                        
                                       <button @click="addId(item)" class="rounded text-white bg-blue-500 p-2">
                                                編輯
                                        </button>
                                       
                                        <button @click="removeClasses(item.id)" class="rounded text-white bg-red-500 p-2">
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
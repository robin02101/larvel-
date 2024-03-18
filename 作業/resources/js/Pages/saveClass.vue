<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {  Link } from '@inertiajs/vue3';
export default {
    data(){
        return{
            className:'',
            classIntroduce:'',
        }
    },
    components: {
        Link,
         AuthenticatedLayout,
     
    },
    methods:{
        // addClass(){
        //     this.$inertia.get('/addBooks')
        // },
        addClasses(){
            this.$inertia.post('/addClasses',{
                className:this.className,
                classIntroduce:this.classIntroduce,
            },{
                onSuccess: (res) =>{
                   const msg= res.props.flash.message;
                   Swal.fire(msg);
                } 
            })
        },
    },
    props:{
      
    },
    
};
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新增課程</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="flex flex-col ml-4 mt-8">
                    課程名稱
                    <input type="text" v-model="className" placeholder="請輸入課程名稱" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    課程簡介
                    <input type="text" v-model="classIntroduce" placeholder="請輸入課程簡介" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    課程照片
                    <input type="file" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex justify-center ml-4 mt-8 mb-8">
                    <Link href="/CourseClass"><button class="rounded text-white bg-gray-500 p-2 mr-4">返回列表</button></Link>
                    <button class="rounded text-white bg-blue-500 p-2 ml-4" @click="addClasses()">儲存</button>
                   </div>
                </div>
            </div>
        </div>

    

</AuthenticatedLayout>
</template>
<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {  Link } from '@inertiajs/vue3';
export default {
    data(){
        return{
            editClassname:this.myClasses.id.className,
            editClassintroduce:this.myClasses.id.classIntroduce,
            id:this.myClasses.id.id ,
        }
    },
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
    methods:{
       
        updateClasses(){
            this.$inertia.post('/updateClasses',{
                id:this.id,
                className:this.editClassname,
                classIntroduce:this.editClassintroduce,
            },{
                onSuccess: (res) =>{
                   const msg= res.props.flash.message;
                   Swal.fire(msg);
                } 
            })
        },
    },
};
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯課程</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                   <div class="flex flex-col ml-4 mt-8">
                    課程名稱
                    <input v-model="editClassname" type="text" class="w-4/5 h-[30px]">
                   </div>
                   <div  class="flex flex-col ml-4 mt-8">
                    課程簡介
                    <input v-model="editClassintroduce" type="text" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    課程照片
                    <input type="file" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex justify-center ml-4 mt-8 mb-8">
                    <Link href="/CourseClass"><button class="rounded text-white bg-gray-500 p-2 mr-4">返回列表</button></Link>
                    <button class="rounded text-white bg-blue-500 p-2 ml-4" @click="updateClasses()">儲存</button>
                   </div>
                </div>
            </div>
        </div>

    

</AuthenticatedLayout>
</template>
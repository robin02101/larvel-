<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {  Link } from '@inertiajs/vue3';
export default {
    data(){
        return{
            teachersName:'',
            teacherIntroduce:'',
            teacherClass:'0',
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
      
        addTeacher(){
            this.$inertia.post('/addTeacher',{
                
                teacherClass:this.teacherClass,
                teacherName:this.teachersName,
                teacherIntroduce:this.teacherIntroduce,
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新增教師</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col ml-4 mt-8">
                    課程
                    <select class="mr-2 w-2/5" v-model="teacherClass">
                        <option value="0">請選擇課程</option>
                        <option :value="myClass.className" v-for="(myClass,index) in myClasses" :key="myClass.id">{{myClass.className}}</option>
                    </select>
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    教師名稱
                    <input  v-model="teachersName" type="text" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    教師簡介
                    <input  v-model="teacherIntroduce" type="text" class="w-4/5 h-[30px]">
                   </div>
                   
                   <div class="flex justify-center ml-4 mt-8 mb-8">
                    <Link href="/text"><button class="rounded text-white bg-gray-500 p-2 mr-4">返回列表</button></Link>
                    <button @click="addTeacher()" class="rounded text-white bg-blue-500 p-2 ml-4">儲存</button>
                   </div>
                </div>
            </div>
        </div>

    

</AuthenticatedLayout>
</template>
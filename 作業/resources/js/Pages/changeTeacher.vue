<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {  Link } from '@inertiajs/vue3';
export default {
    data(){
        return{
            editTeachername:this.teacher.id.teacherName,
            editTeacherintroduce:this.teacher.id.teacherIntroduce,
           id:this.teacher.id.id ,
          
           editteacherClass:this.teacher.id.teacherClass,
        } 
    },
    components: {
        Link,
         AuthenticatedLayout,
     
    },
    props:{
        teacher:{
        type:Array,
        required:true,
      },
      myClasses:{
            type:Array,
            required:true,
        },
    },
    methods:{
       
        updateTeacher(){
           this.$inertia.post('/updateTeacher',{
               id:this.id,
               teacherName:this.editTeachername,
               teacherIntroduce:this.editTeacherintroduce,
               teacherClass:this.editteacherClass,
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">編輯教師</h2>
            
        </template>

     
<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-3/5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col ml-4 mt-8">
                    課程
                    <select class="mr-2 w-2/5" v-model="editteacherClass">
                       
                        <option :value="myClass.className" v-for="(myClass,index) in myClasses" :key="myClass.id">{{myClass.className}}</option>
                    </select>
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    教師名稱
                    <input v-model="editTeachername" type="text" class="w-4/5 h-[30px]">
                   </div>
                   <div class="flex flex-col ml-4 mt-8">
                    教師簡介
                    <input v-model="editTeacherintroduce" type="text" class="w-4/5 h-[30px]">
                   </div>
                   
                   <div class="flex justify-center ml-4 mt-8 mb-8">
                    <Link href="/text"><button class="rounded text-white bg-gray-500 p-2 mr-4">返回列表</button></Link>
                    <button @click="updateTeacher()" class="rounded text-white bg-blue-500 p-2 ml-4">儲存</button>
                   </div>
                </div>
            </div>
        </div>

    

</AuthenticatedLayout>
</template>
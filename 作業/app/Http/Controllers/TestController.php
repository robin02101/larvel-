<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\myClass;
use App\Models\teacher;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(Request $request)
    {
        // $rule = $request->rule ?? 0 ;

        // if ($rule == 1) {
        //     $class = myClass::where('id', '<', 19)->get();
        // } else {
        //     $class = myClass::get();
        // }
        $class = myClass::get();
    
        return Inertia::render('CourseClass', [
            'myClasses' => $class,

        ]);
    }
    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $path=public_path(). '/uploads'. $name;
        move_uploaded_file($file,$path);
        
    }
    // public function changeIndex()
    // {
    //     // $class = myClass::get();
    //        $class = myClass::where('id','<',19)->get();
    //             return Inertia::render('CourseClass', [
    //                 'myClasses' => $class,
    //             ]);
    // }
    public function classIndex()
    {
        $class = myClass::get();
       
        return Inertia::render('addTeacher', [
            'myClasses' => $class,

        ]);
    }
    // public function classIndex2()
    // {
    //     $class = myClass::get();
       
    //     return Inertia::render('changeTeacher', [
    //         'myClasses' => $class,

    //     ]);
    // }

    public function indexTeacher()
    {
        $teacher = teacher::get();

        return Inertia::render('text', [
            'teacher' => $teacher,

        ]);
    }
    // public function index(){
    //     $books = Book::get();

    // return Inertia::render('CourseClass',[
    //     'books' => $books,

    // ]);
    // }
    // public function store(){

    // $arr=[1,2,3,4];
    // $newArr=[];

    // foreach ($arr as $item) {
    //     // dump($item);
    //     // array_push($newArr,$item+1);

    //     array_push($newArr,1+$item.'元');
    // }


    // $data=[
    //     [
    //         'id' =>1,
    //         'name' =>'toyz',
    //     ],
    //     [
    //         'id' =>2,
    //         'name' =>'bebe',
    //     ],

    // ];
    // $newData=[];
    // foreach($data as $value){

    //     array_push($newData,$value['name']);
    // }
    // dd($newData);

    // $teachers=[
    //     (object)[
    //         'id'=>1,
    //         'name' =>'張三'
    //     ],
    //     (object)[
    //         'id'=>2,
    //         'name' =>'李四'
    //     ],
    // ];
    // $newTeachers=[];

    // foreach($teachers as $teacher){
    //     $newTeachers[]=$teacher ->name;
    // }
    // dd($newTeachers); `


    //    $data = [
    //         ['name' => '哈利波特', 'price' => 500],
    //         ['name' => '魔戒', 'price' => 600],
    //     ];
    //     for($i=0;$i<2;$i++){
    //         foreach ($data as $item) {
    //         Book::create($item);

    //     }};

    //     return redirect('/CourseClass');
    // return Inertia::render('Dashboard');
    // }

    public function add(Request $request)
    {

        try {
            myClass::create([
                'className' => $request->className,
                'classIntroduce' => $request->classIntroduce,

            ]);
            $message = '成功';
        } catch (\Throwable $th) {
            $message = '失敗';
        }
        return redirect('/CourseClass')->with(['message' => $message]);
    }
    public function remove(Request $request)
    {
        $class = myClass::find($request->id);


        if ($class) {
            // 刪除書本
            $class->delete();
            $message = '成功';
        } else {
            // 找不到此書本
            $message = '失敗';
        }
        return redirect('/CourseClass')->with(['message' => $message]);
    }

    public function addTeacher(Request $request)
    {

        try {
            teacher::create([
               'teacherClass'=>$request->teacherClass,
                'teacherName' => $request->teacherName,
                'teacherIntroduce' => $request->teacherIntroduce,

            ]);
            $message = '成功';
        } catch (\Throwable $th) {
            $message = '失敗';
        }
        return redirect('/text')->with(['message' => $message]);
    }

    public function removeTeacher(Request $request)
    {
        $teacher = teacher::find($request->id);


        if ($teacher) {
            // 刪除書本
            $teacher->delete();
            $message = '成功';
        } else {
            // 找不到此書本
            $message = '失敗';
        }
        return redirect('/text')->with(['message' => $message]);
    }

    public function updateClasses(Request $request)
    {
        try {
            $class =  myClass::find($request->id);

            $class->update([
                'className' => $request->className,
                'classIntroduce' => $request->classIntroduce,

            ]);
            $message = '成功';
        } catch (\Throwable $th) {
            $message = '失敗';
        }
        return redirect('/CourseClass')->with(['message' => $message]);
    }

    public function updateTeacher(Request $request)
    {
        try {
            $teacher = teacher::find($request->id);

            $teacher->update([
                'teacherName' => $request->teacherName,
                'teacherIntroduce' => $request->teacherIntroduce,
                'teacherClass' => $request->teacherClass,
            ]);
            $message = '成功';
        } catch (\Throwable $th) {
            $message = '失敗';
        }
        return redirect('/text')->with(['message' => $message]);
    }
    public function addId(Request $request)
    {

        // dd( $request->all());
        return Inertia::render('changeClass', [
            'myClasses' => $request->all(),

        ]);
    }
    public function teacherAddid(Request $request)
    {  $class = myClass::get();
        return Inertia::render('changeTeacher', [
            'teacher' => $request->all(),
            'myClasses' => $class,
        ]);
    }
}

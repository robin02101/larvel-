<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
     protected $fillable = [
        'teacherName',
        'teacherIntroduce',
        'teacherClass',
     ];
   //   public function my_classes()
   //   {       //自己對應的id 去對應對方的userId
   //       return $this->belongsTo(myClass::class,'classId','id');
   //   }
}

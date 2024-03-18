<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'className',
        'classIntroduce',
     ];
    //  public function teacher()
    // {       //回應
    //     return $this->hasMany(teacher::class,'classId','id');
    // }
}

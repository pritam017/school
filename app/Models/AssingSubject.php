<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssingSubject extends Model
{
    use HasFactory;
    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
    public function subject(){
        return $this->belongsTo(Student::class, 'subject_id','id');
    }
}

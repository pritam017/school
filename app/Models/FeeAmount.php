<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;

    public function fee(){
        return $this->belongsTo(Fee::class, 'fee_category_id', 'id');
    }
    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
}

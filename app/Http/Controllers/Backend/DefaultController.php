<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssingSubject;
use App\Models\Student;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getStudent(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudent::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->get();
        return response()->json($allData);

    }
    public function getSubject(Request $request){
        $class_id = $request->class_id;
        $allData = AssingSubject::with(['subject'])->where('class_id',$class_id)->get();
        return response()->json($allData);
    }

}

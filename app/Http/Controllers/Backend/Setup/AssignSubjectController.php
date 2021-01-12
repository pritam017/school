<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssingSubject;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignSubjectController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign_subject = AssingSubject::select('class_id')->groupBy('class_id')->get();
        return view('admin.setup.assign-subject.manage', compact('assign_subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Student::all();
        $classes = StudentClass::all();
        return view('admin.setup.assign-subject.add', compact('subjects','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjectCount = count($request->subject_id);
        if($subjectCount != NULL){
            for($i=0; $i < $subjectCount; $i++){
                $assign_subject = new AssingSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->get_mark = $request->subject_mark[$i];
                $assign_subject->save();
            }
        }

        return redirect()->route('setupAssignSubject.index')->with('success','Subject Assign Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $assign_subject = AssingSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('admin.setup.assign-subject.show', compact('assign_subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
        $assign_subject = AssingSubject::where('class_id',$class_id)->get();

        $subjects = Student::all();
        $classes = StudentClass::all();
        return view('admin.setup.assign-subject.edit', compact('assign_subject','subjects','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        if($request->subject_id == NULL){
            return redirect()->back()->with('error', 'You do not give any data');
        }else{
            AssingSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id', $request->class_id)->delete();
            foreach($request->subject_id as $key=>$value){
                $assign_subject_exist = AssingSubject::where('subject_id',$request->subject_id[$key])->where('class_id', $request->class_id)->first();
            }
            if($assign_subject_exist){
                $assignSubjects = $assign_subject_exist;
            }else{
                $assignSubjects = new AssingSubject();
            }
                    $assignSubjects->class_id = $request->class_id;
                    $assignSubjects->subject_id = $request->subject_id[$key];
                    $assignSubjects->full_mark = $request->full_mark[$key];
                    $assignSubjects->pass_mark = $request->pass_mark[$key];
                    $assignSubjects->get_mark = $request->subject_mark[$key];
                    $assignSubjects->updated_by = Auth::user()->id;
                    $assignSubjects->save();

        }

        return redirect()->route('setupAssignSubject.index')->with('success','Assign Subject Updated');

    }


}


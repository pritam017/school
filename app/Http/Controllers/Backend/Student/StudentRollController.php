<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use Illuminate\Http\Request;
use App\Models\DiscountStudent;
use App\Models\Group;
use App\Models\Shift;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use PDF;
class StudentRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
       return view('admin.student.roll.manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($request->student_id != NULL){
            for($i = 0; $i < count($request->student_id); $i++){
                AssignStudent::where('year_id',$year_id)->where('class_id', $class_id)->where('student_id', $request->student_id[$i])->update(['roll' => $request->roll[$i]]);
            }
        }else{
            return redirect()->back()->with('error', 'There Are No Student');
        }
        return redirect()->route('studentRoll.index')->with('success','Well Done Successfully Roll Genereted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getStudent(Request $request){
        $allData = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($allData);
    }
}

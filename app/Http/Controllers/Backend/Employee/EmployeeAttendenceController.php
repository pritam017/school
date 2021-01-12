<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendence;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendenceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['allData'] = EmployeeAttendence::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
       return view('admin.employee.attendence.manage', $data);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['employees'] = User::where('user_role', 3)->get();
        return view('admin.employee.attendence.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeAttendence::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countEmployee = count($request->employee_id);
        for($i=0; $i < $countEmployee; $i++){
            $attend_status = 'attend_status'.$i;
            $attend =new EmployeeAttendence();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;

            $attend->save();
        }
        return redirect()->route('employeeAttendence.index')->with('success','Data Save Successfuly Done');
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
    public function edit($date)
    {

        $data['editData'] = EmployeeAttendence::where('date',$date)->get();
        $data['employees'] = User::where('user_role', 3)->get();
        return view('admin.employee.attendence.edit', $data);
    }


    public function details($date){
        $data['details'] = EmployeeAttendence::where('date',$date)->get();
        return view('admin.employee.attendence.details', $data);
    }

}

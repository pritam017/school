<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Assignemployee;
use App\Models\Degignation;
use App\Models\FeeAmount;
use App\Models\Group;
use App\Models\Shift;
use App\Models\employeeClass;
use App\Models\EmployeeLeave;
use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = EmployeeLeave::orderBy('id', 'DESC')->get();
       return view('admin.employee.leave.manage', $data);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['leave_purpose'] = LeavePurpose::all();
        $data['employees'] = User::where('user_role', 3)->get();
        return view('admin.employee.leave.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->leave_purpose_id == '0'){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id;
        $employee_leave->save();
        return redirect()->route('employeeLeave.index')->with('success','Data Save Successfuly Done');
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

        $data['editData'] = EmployeeLeave::find($id);
        $data['leave_purpose'] = LeavePurpose::all();
        $data['employees'] = User::where('user_role', 3)->get();
        return view('admin.employee.leave.edit', $data);
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
        if($request->leave_purpose_id == '0'){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employee_leave =  EmployeeLeave::find($id);
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id;
        $employee_leave->save();

        return redirect()->route('employeeLeave.index')->with('success','Data Updated Successfuly Done');
    }
    public function details($id){
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('admin.employee.registration.details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}

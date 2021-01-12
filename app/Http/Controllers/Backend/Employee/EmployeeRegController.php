<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Assignemployee;
use App\Models\Degignation;
use App\Models\FeeAmount;
use App\Models\Group;
use App\Models\Shift;
use App\Models\employeeClass;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeRegController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = User::where('user_role', 3)->get();
       return view('admin.employee.registration.manage', $data);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['degignation'] = Degignation::all();
        return view('admin.employee.registration.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $checkYear = date('Ym', strtotime($request->join_date));
            $employee = User::where('user_role', 3)->orderBy('id', 'DESC')->first();
            if($employee == NULL){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('user_role', 3)->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee+1;
                if($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->user_role = 3;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->degignation_id = $request->degignation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/employee/'), $filename);
                $user['image'] = $filename;

            }
            $user->save();
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_date =date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
        });
        return redirect()->route('employeeReg.index')->with('success','Employee Registration Successfuly Done');
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
        $data['editData'] = User::find($id);
        $data['degignation'] = Degignation::all();
        return view('admin.employee.registration.edit', $data);
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
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->user_role = 3;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->degignation_id = $request->degignation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/employee/'. $user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/employee/'), $filename);
            $user['image'] = $filename;

        }
        $user->save();
        return redirect()->route('employeeReg.index')->with('success','Data Updated Successfuly Done');
    }
    public function details($id){
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('admin.employee.registration.details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}

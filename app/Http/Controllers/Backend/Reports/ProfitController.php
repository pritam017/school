<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountOthersCost;
use App\Models\AccountsStudentFee;
use App\Models\AssignStudent;
use App\Models\EmployeeAttendence;
use App\Models\ExamType;
use App\Models\Model\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use PDF;
class ProfitController extends Controller
{
    public function index(){
        return view('admin.reports.profit.manage');
    }
    public function getProfit(Request $request){
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));

        $student_fee = AccountsStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $others_cost = AccountOthersCost::whereBetween('date',[$sdate, $edate])->sum('amount');
        $emp_salary = AccountEmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');

        $totalcost = $others_cost+$emp_salary;
        $profit = $student_fee -$totalcost;


        $html['thsource'] = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Others Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';
        $color = 'success';

            $html['tdsource'] = '<td>'.$student_fee.'</td>';
            $html['tdsource'] .= '<td>'.$others_cost.'</td>';
            $html['tdsource'] .= '<td>'.$emp_salary.'</td>';
            $html['tdsource'] .= '<td>'.$totalcost.'</td>';
            $html['tdsource'] .= '<td>'.$profit.'</td>';
            $html['tdsource'] .= '<td>';
            $html['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blank" href="'.route('profit.pdf').'?start_date='.$sdate.'&end_date='.$edate.'"><i class="fa fa-file"></i></a>';
            $html['tdsource'] .= '</td>';

return response()->json(@$html);

    }
    public function pdf(Request $request){
        $data['sdate']= date('Y-m', strtotime($request->start_date));
        $data['edate']= date('Y-m', strtotime($request->end_date));
        $data['start_date']= date('Y-m-d', strtotime($request->start_date));
        $data['end_date']= date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('admin.reports.profit.pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
    public function marksheetView(){
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('admin.reports.marksheet.view', $data);
    }
    public function marksheetGet(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
        if($singleStudent == true){
            $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
            $allGreaders = MarksGrade::all();
            return view('admin.reports.marksheet.print', compact('allMarks','allGreaders','count_fail'));
        }else{
            return redirect()->back()->with('error','Sorry This Criteria does not match');
        }
    }
    public function attendenceView(){
        $data['employees'] = User::where('user_role', 3)->get();
        return view('admin.reports.attendence.manage', $data);

    }
    public function attendenceGet(Request $request){
        $employee_id = $request->employee_id;
        if($employee_id != NULL){
            $where[] =['employee_id','like',$employee_id.'%'];
        }
        $date = date('Y-m', strtotime($request->date));
        if($date != NULL){
            $where[] =['date','like',$date.'%'];
        }

        $singleAttendence =  EmployeeAttendence::with(['user'])->where($where)->first();
        if($singleAttendence == true){
        $data['allData'] = EmployeeAttendence::with(['user'])->where($where)->get();
        $data['absents'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
        $data['leaves'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
        $data['month'] = date('M Y', strtotime($request->date));
        $pdf = PDF::loadView('admin.reports.attendence.pdf', $data);
        $pdf->setProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
        }else{
            return redirect()->back()->with('error','Sorry This Criteria does not match');
        }
    }
    public function resultView(){
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('admin.reports.result.view', $data);
    }
    public function resultGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;


        $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id',$exam_type_id)->first();

        if($singleResult == true){
            $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
            $pdf = PDF::loadView('admin.reports.result.pdf',$data);
            $pdf->setProtection(['copy','print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }else{
            return redirect()->back()->with('error','Sorry This Criteria does not match');
        }
    }
    public function idCardView(){
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        return view('admin.reports.id_card.view', $data);
    }
    public function idCarGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;



        $check_data = AssignStudent::where('year_id',$year_id)->where('class_id', $class_id)->first();

        if($check_data == true){
            $data['allData'] = StudentMarks::where('year_id',$year_id)->where('class_id', $class_id)->get();
            $pdf = PDF::loadView('admin.reports.id_card.pdf',$data);
            $pdf->setProtection(['copy','print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }else{
            return redirect()->back()->with('error','Sorry This Criteria does not match');
        }
    }

}

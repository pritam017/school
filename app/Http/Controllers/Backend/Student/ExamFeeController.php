<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;
use PDF;

class ExamFeeController extends Controller
{
    public function index()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
       return view('admin.student.exam-fee.manage', $data);
    }
    public function getStudent(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type = $request->exam_type;
        if($year_id != NULL){
            $where[] =['year_id','like',$year_id.'%'];
        }
        if($class_id != NULL){
            $where[] =['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Exam Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Action</th>';
        foreach($allStudent as $key=> $v){
            $examfee = FeeAmount::where('fee_category_id', 3)->where('class_id', $v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$examfee->amount.'RS'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalfee = $examfee->amount;
            $discount = $v['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discountablefee;

            $html[$key]['tdsource'] .= '<td>'.$finalfee.'RS'.'</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route('student.exam.fee.payslip').'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type='.$request->exam_type.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
return response()->json(@$html);

    }
    public function paySlip(Request $request){
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $data['exam_name'] = ExamType::where('id',$request->exam_type)->first()['name'];

        $data['details'] = AssignStudent::with(['discount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

        $pdf = PDF::loadView('admin.student.exam-fee.exam-fee-pdf', $data);
        $pdf->setProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
}

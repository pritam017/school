<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use App\Models\AccountsStudentFee;
use App\Models\AssignStudent;
use App\Models\Fee;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['allData'] = AccountsStudentFee::all();
       return view('admin.account.student-fee.manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = Fee::all();
        return view('admin.account.student-fee.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        AccountsStudentFee::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $date)->delete();
        $checkData = $request->checkmanage;
        if($checkData != NULL){
           for($i=0;$i<count($checkData); $i++){
               $data = new AccountsStudentFee();
               $data->year_id = $request->year_id;
               $data->class_id = $request->class_id;
               $data->date = $date;
               $data->fee_category_id = $request->fee_category_id;
               $data->student_id = $request->student_id[$checkData[$i]];
               $data->amount = $request->amount[$checkData[$i]];
               $data->save();

           }
        }
        if(!empty($data)||empty($checkData)){
            return redirect()->route('studentFee.index')->with('success', 'Data Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Data Not Save');
        }
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

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m', strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';
        foreach($data as $key=> $std){
            $registrationfee = FeeAmount::where('fee_category_id', $fee_category_id)->where('class_id', $std->class_id)->first();
            $accountstudentfee = AccountsStudentFee::where('student_id', $std->student_id)->where('year_id', $std->year_id)->where('class_id', $std->class_id)->where('fee_category_id', $fee_category_id)->where('date', $date)->first();
            if($accountstudentfee != NULL){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $color = 'success';

            $html[$key]['tdsource'] = '<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value="'.$year_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['student']['name'].'<input type="hidden" name="class_id" value="'.$class_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'Rs'.'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';



            $originalfee = $registrationfee->amount;
            $discount = $std['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (int)$originalfee-(int)$discountablefee;

            $html[$key]['tdsource'] .= '<td>'.'<input type="text" name="amount[]" class="form-control" value="'.$finalfee.'" readonly>'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="student_id" class="form-control" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]"  value="'.$key.'"'.$checked.' style="transform: scale(1.5); margin-left: 10px;">'.'</td>';

        }
return response()->json(@$html);

    }
}

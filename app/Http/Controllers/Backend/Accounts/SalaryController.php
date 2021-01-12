<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendence;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
       $data['allData'] = AccountEmployeeSalary::all();
       return view('admin.account.emp-salary.manage', $data);
    }
    public function create()
    {

        return view('admin.account.emp-salary.add');
    }
    public function getEmployee(Request $request){

        $date = date('Y-m', strtotime($request->date));
        if($date != NULL){
            $where[] =['date','like',$date.'%'];
        }
        $data = EmployeeAttendence::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        $html['thsource']  = '<th>SL</th>';
        $html['thsource']  .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary (This Month)</th>';
        $html['thsource'] .= '<th>Select</th>';
        foreach($data as $key=> $std){
            $account_salary = AccountEmployeeSalary::where('employee_id', $std->employee_id)->where('date', $date)->first();

            if($account_salary != NULL){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $totalattend = EmployeeAttendence::with(['user'])->where($where)->where('employee_id', $std->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status', 'Absent'));
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$std['user']['salary'].'</td>';
            $salary = (float)$std['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;


            $html[$key]['tdsource'] .= '<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="employee_id[]" class="form-control" value="'.$std->employee_id.'">'.'<input type="checkbox" name="checkmanage[]"  value="'.$key.'"'.$checked.' style="transform: scale(1.5); margin-left: 10px;">'.'</td>';

        }
return response()->json(@$html);

    }
    public function store(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        AccountEmployeeSalary::where('date', $date)->delete();
        $checkData = $request->checkmanage;
        if($checkData != NULL){
           for($i=0;$i<count($checkData); $i++){
               $data = new AccountEmployeeSalary();
               $data->date = $date;
               $data->employee_id = $request->employee_id[$checkData[$i]];
               $data->amount = $request->amount[$checkData[$i]];
               $data->save();

           }
        }
        if(!empty($data)||empty($checkData)){
            return redirect()->route('empSalary.index')->with('success', 'Data Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Data Not Save');
        }
    }
}

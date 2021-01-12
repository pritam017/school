<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee_amounts = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('admin.setup.fee-amount.manage', compact('fee_amounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = Fee::all();
        $classes = StudentClass::all();
        return view('admin.setup.fee-amount.add', compact('fees','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if($countClass != NULL){
            for($i=0; $i < $countClass; $i++){
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        return redirect()->route('setupStudentFeeAmount.index')->with('success','Fees Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fee_category_id)
    {
        $fee_amount = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('admin.setup.fee-amount.show', compact('fee_amount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fee_category_id)
    {
        $fee_amount = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $fees = Fee::all();
        $classes = StudentClass::all();
        return view('admin.setup.fee-amount.edit', compact('fee_amount','fees','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee_category_id)
    {
        if($request->class_id == NULL){
            return redirect()->back()->with('error', 'You do not give any data');
        }else{
            FeeAmount::where('fee_category_id', $fee_category_id)->delete();
            $countClass = count($request->class_id);
            for($i=0; $i < $countClass; $i++){
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        return redirect()->route('setupStudentFeeAmount.index')->with('success','Fee Amount Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

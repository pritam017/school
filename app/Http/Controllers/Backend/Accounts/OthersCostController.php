<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use App\Models\AccountOthersCost;
use Illuminate\Http\Request;

class OthersCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AccountOthersCost::orderBy('id', 'DESC')->get();
        return view('admin.account.others-cost.manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.others-cost.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cost = new AccountOthersCost();
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/cost_images/'), $filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();
        return redirect()->route('othersCost.index')->with('success','Data Saved Sucessfully Done');
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
        $data['editData'] = AccountOthersCost::find($id);
        return view('admin.account.others-cost.edit', $data);
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
        $cost =  AccountOthersCost::find($id);
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;
        if($request->file('image')){

            $file = $request->file('image');
            @unlink(public_path('uploads/cost_images/'. $cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('uploads/cost_images/'), $filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();
        return redirect()->route('othersCost.index')->with('success','Data Update Sucessfully Done');
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
}

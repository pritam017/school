<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssingSubject;
use App\Models\DiscountStudent;
use App\Models\Group;
use App\Models\Shift;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class StudentRegController extends Controller
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
        $data['year_id'] = Year::orderBy('id', 'DESC')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'ASC')->first()->id;
       $data['student'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
       return view('admin.student.reg.manage', $data);
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
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        return view('admin.student.reg.add', $data);
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
            $checkYear = Year::find($request->year_id)->name;
            $student = User::where('user_role', 2)->orderBy('id', 'DESC')->first();
            if($student == NULL){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }else{
                $student = User::where('user_role', 2)->orderBy('id', 'DESC')->first()->id;
                $studentId = $student+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->user_role = 2;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($code);
       $user->code = $code;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student/'), $filename);
                $user['image'] = $filename;

            }
            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            $discount_student= new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->discount = $request->discount;
            $discount_student->fee_category_id = '1';
            $discount_student->save();
        });
        return redirect()->route('studentRegistration.index')->with('success','Student Registration Successfuly Done');
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
    public function edit($student_id)
    {
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        return view('admin.student.reg.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        DB::transaction(function () use($request,$student_id) {

            $user = User::where('id', $student_id)->first();

            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->user_role = 2;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('uploads/student/'. $user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student/'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student =  AssignStudent::where('id',$request->id)->where('student_id', $student_id)->first();

            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            $discount_student=  DiscountStudent::where('assign_student_id', $request->id)->first();

            $discount_student->discount = $request->discount;

            $discount_student->save();
        });
        return redirect()->route('studentRegistration.index')->with('success','Data Updtadet Successfuly Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
       $data['student'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
       return view('admin.student.reg.manage', $data);
    }
    public function promotion($student_id)
    {
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        return view('admin.student.reg.promotion', $data);
    }
    public function promotionStore(Request $request,$student_id){
        DB::transaction(function () use($request,$student_id) {

            $user = User::where('id', $student_id)->first();

            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->user_role = 2;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('uploads/student/'. $user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student/'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            $discount_student= new  DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->discount = $request->discount;
            $discount_student->fee_category_id = '1';
            $discount_student->save();
        });
        return redirect()->route('studentRegistration.index')->with('success','Student Promote Successfuly Done');
    }
    public function details($student_id){
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('admin.student.reg.details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}

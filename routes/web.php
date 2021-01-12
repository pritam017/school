<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/phpinfo', function() {
    phpinfo();
});
Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('/user', App\Http\Controllers\Backend\UserController::class);
Route::resource('/profile', App\Http\Controllers\Backend\ProfileController::class);
Route::resource('/setupStudentClass', App\Http\Controllers\Backend\Setup\StudentClassController::class);
Route::resource('/setupStudentYear', App\Http\Controllers\Backend\Setup\StudentYearController::class);
Route::resource('/setupStudentGroup', App\Http\Controllers\Backend\Setup\StudentGroupController::class);
Route::resource('/setupStudentShift', App\Http\Controllers\Backend\Setup\StudentShiftController::class);
Route::resource('/setupStudentFee', App\Http\Controllers\Backend\Setup\FeeController::class);
Route::resource('/setupStudentFeeAmount', App\Http\Controllers\Backend\Setup\FeeAmountController::class);
Route::resource('/setupStudentExamType', App\Http\Controllers\Backend\Setup\ExamTypeController::class);
Route::resource('/setupStudent', App\Http\Controllers\Backend\Setup\StudentController::class);
Route::resource('/setupAssignSubject', App\Http\Controllers\Backend\Setup\AssignSubjectController::class);
Route::resource('/setupDegignation', App\Http\Controllers\Backend\Setup\DegignationController::class);
//Fee Category Id
Route::get('/fee/amount/edit/{fee_category_id}', [App\Http\Controllers\Backend\Setup\FeeAmountController::class, 'edit'])->name('fee.edit');
Route::get('/fee/amount/show/{fee_category_id}', [App\Http\Controllers\Backend\Setup\FeeAmountController::class, 'show'])->name('fee.show');
//Assign Subject Class Id
Route::get('/assign/subject/edit/{class_id}', [App\Http\Controllers\Backend\Setup\AssignSubjectController::class, 'edit'])->name('assign.edit');
Route::get('/assign/subject/show/{class_id}', [App\Http\Controllers\Backend\Setup\AssignSubjectController::class, 'show'])->name('assign.show');
//Student Start
Route::resource('/studentRegistration', App\Http\Controllers\Backend\Student\StudentRegController::class);
Route::resource('/studentRoll', App\Http\Controllers\Backend\Student\StudentRollController::class);
//Student Registration Fee
Route::resource('/regFee', App\Http\Controllers\Backend\Student\RegistrationFeeController::class);
Route::get('/reg/get-student', [App\Http\Controllers\Backend\Student\RegistrationFeeController::class, 'getStudent'])->name('student.reg.get-student');
Route::get('/reg/pay/slip', [App\Http\Controllers\Backend\Student\RegistrationFeeController::class, 'paySlip'])->name('student.registration.fee.payslip');

Route::get('/year/class/wise/', [App\Http\Controllers\Backend\Student\StudentRegController::class, 'search'])->name('search.student');
Route::get('/register/student/edit/{student_id}', [App\Http\Controllers\Backend\Student\StudentRegController::class, 'edit'])->name('regStudent.edit');
Route::get('/register/student/promotion/{student_id}', [App\Http\Controllers\Backend\Student\StudentRegController::class, 'promotion'])->name('regStudent.promotion');
Route::post('/register/student/promotion/store/{student_id}', [App\Http\Controllers\Backend\Student\StudentRegController::class, 'promotionStore'])->name('regStudent.promotion.store');
Route::get('/register/student/details/{student_id}', [App\Http\Controllers\Backend\Student\StudentRegController::class, 'details'])->name('regStudent.details');
Route::get('/roll/get-student', [App\Http\Controllers\Backend\Student\StudentRollController::class, 'getStudent'])->name('student.roll.get-student');

//Student Monthly Fee
Route::get('/monthlyFee', [App\Http\Controllers\Backend\Student\MonthlyFeeController::class, 'index'])->name('monthlyFee.index');
Route::get('/monthly/get-student', [App\Http\Controllers\Backend\Student\MonthlyFeeController::class, 'getStudent'])->name('student.monthly.fee.get-student');
Route::get('/monthly/pay/slip', [App\Http\Controllers\Backend\Student\MonthlyFeeController::class, 'paySlip'])->name('student.monthly.fee.payslip');
//Student Exam Fee
Route::get('/examFee', [App\Http\Controllers\Backend\Student\ExamFeeController::class, 'index'])->name('examFee.index');
Route::get('/exam/get-student', [App\Http\Controllers\Backend\Student\ExamFeeController::class, 'getStudent'])->name('student.exam.fee.get-student');
Route::get('/exam/pay/slip', [App\Http\Controllers\Backend\Student\ExamFeeController::class, 'paySlip'])->name('student.exam.fee.payslip');
//Employee Registration
Route::resource('/employeeReg', App\Http\Controllers\Backend\Employee\EmployeeRegController::class);
Route::get('/register/employee/details/{id}', [App\Http\Controllers\Backend\Employee\EmployeeRegController::class, 'details'])->name('employeeReg.details');
//Employee Salary
Route::resource('/employeeSalary', App\Http\Controllers\Backend\Employee\EmployeeSalaryController::class);
Route::get('/register/employee/details/{id}', [App\Http\Controllers\Backend\Employee\EmployeeSalaryController::class, 'details'])->name('employeeSalary.details');
//Employee Leave
Route::resource('/employeeLeave', App\Http\Controllers\Backend\Employee\EmployeeLeaveController::class);
//Employee Attendence
Route::resource('/employeeAttendence', App\Http\Controllers\Backend\Employee\EmployeeAttendenceController::class);
Route::get('/employee/attendence/edit/{date}', [App\Http\Controllers\Backend\Employee\EmployeeAttendenceController::class, 'edit'])->name('employee.attendence.edit');
Route::get('/employee/attendence/details/{date}', [App\Http\Controllers\Backend\Employee\EmployeeAttendenceController::class, 'details'])->name('employee.attendence.details');
//Employee Monthly Salary
Route::get('/monthly/salary/view', [App\Http\Controllers\Backend\Employee\MonthlySalaryController::class, 'index'])->name('ems.index');
Route::get('/monthly/salary/get', [App\Http\Controllers\Backend\Employee\MonthlySalaryController::class, 'getSalary'])->name('ems.get');
Route::get('/monthly/salary/pay-slip/{employee_id}', [App\Http\Controllers\Backend\Employee\MonthlySalaryController::class, 'paySlip'])->name('ems.payslip');
//Marks Section
Route::get('/marksEntry', [App\Http\Controllers\Backend\Marks\MarksEntryController::class, 'index'])->name('marksEntry.index');
Route::post('/marksEntry/store', [App\Http\Controllers\Backend\Marks\MarksEntryController::class, 'store'])->name('marksEntry.store');
Route::get('/get-student-marks', [App\Http\Controllers\Backend\Marks\MarksEntryController::class,'getMarks'])->name('get-student-marks');
Route::get('/edit/marks', [App\Http\Controllers\Backend\Marks\MarksEntryController::class,'edit'])->name('marksEntry.edit');
Route::post('/update/marks', [App\Http\Controllers\Backend\Marks\MarksEntryController::class,'update'])->name('marksEntry.update');
Route::get('/get-student', [App\Http\Controllers\Backend\DefaultController::class,'getStudent'])->name('get-student');
Route::get('/get-subject', [App\Http\Controllers\Backend\DefaultController::class,'getSubject'])->name('get-subject');
//Grade Section
Route::resource('/grade', App\Http\Controllers\Backend\Marks\GradeController::class);
//Accounts Student Fee
Route::resource('/studentFee', App\Http\Controllers\Backend\Accounts\StudentFeeController::class);
Route::get('/accounts/fee/get-student', [App\Http\Controllers\Backend\Accounts\StudentFeeController::class, 'getStudent'])->name('student.account.fee.get-student');
//Employee Salary
Route::resource('/empSalary', App\Http\Controllers\Backend\Accounts\SalaryController::class);
Route::get('/accounts/salary/get-employee', [App\Http\Controllers\Backend\Accounts\SalaryController::class, 'getEmployee'])->name('account.salary.get-employee');
//Others Cont
Route::resource('/othersCost', App\Http\Controllers\Backend\Accounts\OthersCostController::class);
//Profit controler
Route::get('/profit/view', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'index'])->name('profit.index');
Route::get('/profit/get', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'getProfit'])->name('profit.get');
Route::get('/profit/pdf/', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'pdf'])->name('profit.pdf');
//Marksheet Generate
Route::get('/marksheet/view', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'marksheetView'])->name('marksheet.view');
Route::get('/marksheet/get', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'marksheetGet'])->name('marksheet.get');
//Attendence Report
Route::get('/attendence/view', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'attendenceView'])->name('attendence.view');
Route::get('/attendence/get', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'attendenceGet'])->name('attendence.get');
//All Student Result
Route::get('/result/view', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'resultView'])->name('result.view');
Route::get('/result/get', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'resultGet'])->name('result.get');
// Student ID Card
Route::get('/id_card/view', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'idCardView'])->name('id_card.view');
Route::get('/id_card/get', [App\Http\Controllers\Backend\Reports\ProfitController::class, 'idCarGet'])->name('id_card.get');


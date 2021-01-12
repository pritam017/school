<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly/Yearly Profit</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td class="col-md-4"><img src="{{ asset('uploads/default.jpg') }}" style="width: 100px; height: 100px" alt=""></td>
                        <td class="col-md-4">
                            <h4><strong>Pacific School</strong></h4>
                            <h5><strong>Siliguri Jalpaiguri</strong></h5>
                            <h6><strong>www.pacificschool.com</strong></h6>
                        </td>
                        <td class="col-md-4"></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Monthly/Yearly Profit</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">
                @php
                $student_fee = App\Models\AccountsStudentFee::whereBetween('date',[$sdate,$edate])->where('fee_category_id', 1)->sum('amount');
                $other_cost = App\Models\AccountOthersCost::whereBetween('date',[$start_date,$end_date])->sum('amount');
                $emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$sdate,$edate])->sum('amount');

                $totalCost = $other_cost+$emp_salary;
                $profit = $student_fee-$totalCost;

                    @endphp
                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td colspan="2"><h4>Reporting Date: {{ date('d M Y', strtotime($start_date))}} - {{ date('d M Y', strtotime($end_date)) }}</h4></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Purpose</td>
                            <td><h4>Amount</h4></td>
                        </tr>
                        <tr>
                            <td>Student Fee</td>
                            <td>{{ $student_fee }}</td>
                        </tr>
                        <tr>
                            <td>Employee Salary</td>
                            <td>{{ $emp_salary }}</td>
                        </tr>
                        <tr>
                            <td>Others Cost</td>
                            <td>{{ $other_cost}} Rs</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Total Cost</td>
                            <td>{{ $totalCost }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Profit</td>
                            <td>{{ $profit }}</td>
                        </tr>
                    </tbody>
                </table>
                <i>Print Date: {{ date('d M Y') }}</i>
            </div>
        </div> <br>
        <div class="col-md-12">
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td style="width: 30%"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align: center;"></td>
                        <hr style="border: solid 1px; width: 60%;">
                        <h6>Principal/Headmaster</h6>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

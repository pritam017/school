<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Salary {{date('M')}}</title>
  
</head>
<body>
    <div class="container">
    @php
    $date = date('Y-m', strtotime($totalattendgroupbyid['0']->date));
    if($date != ''){
        $where[] = ['date','like',$date.'%'];
    }

            $totalattend = App\Models\EmployeeAttendence::with(['user'])->where($where)->where('employee_id', $totalattendgroupbyid['0']->employee_id)->get();
            $singleSalary = (float)$totalattendgroupbyid['0']['user']['salary'];
            $salaryperday = (float)$singleSalary/30;
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $totalsalaryminus = (int)$absentcount*(float)$salaryperday;
            $totalsalary = (int)$singleSalary-(int)$totalsalaryminus;
                @endphp
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
                        <td class="col-md-4"><img src="{{ asset('uploads/employee/'.$totalattendgroupbyid['0']['user']['image']) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Employee Monthly Salary</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">

                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 50%">Employee Name</td>
                            <td>{{ $totalattendgroupbyid['0']['user']['name'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Basic Salary</td>
                            <td>{{ $totalattendgroupbyid['0']['user']['salary'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Total Absent Of This Month</td>
                            <td>{{ $absentcount }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Month</td>
                            <td>{{ date('M Y', strtotime($totalattendgroupbyid['0']->date)) }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Salary For This Month</td>
                            <td>{{ $totalsalary }}</td>
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
                        <h5>Principal/Headmaster</h5>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="border: dashed 1px; width: 96%; mb-5">
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
                        <td class="col-md-4"><img src="{{ asset('uploads/employee/'.$totalattendgroupbyid['0']['user']['image']) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Employee Monthly Salary</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">

                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 50%">Employee Name</td>
                            <td>{{ $totalattendgroupbyid['0']['user']['name'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Basic Salary</td>
                            <td>{{ $totalattendgroupbyid['0']['user']['salary'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Total Absent Of This Month</td>
                            <td>{{ $absentcount }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Month</td>
                            <td>{{ date('M Y', strtotime($totalattendgroupbyid['0']->date)) }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Salary For This Month</td>
                            <td>{{ $totalsalary }}</td>
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
                        <h5>Principal/Headmaster</h5>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

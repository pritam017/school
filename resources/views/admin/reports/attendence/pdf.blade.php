<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendence Report</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td class="col-md-4"><img src="{{ asset('uploads/school.jpg') }}" style="width: 100px; height: 100px" alt=""></td>
                        <td class="col-md-4">
                            <h4><strong>Pacific School</strong></h4>
                            <h5><strong>Siliguri Jalpaiguri</strong></h5>
                            <h6><strong>www.pacificschool.com</strong></h6>
                        </td>
                        <td class="col-md-4"><img src="{{ asset('uploads/employee/'.$allData['0']['user']['image']) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Employee Attendence Report</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">
                <strong>Employee Name:</strong>{{ $allData['0']['user']['name'] }}, <strong>ID No:</strong>
                {{ $allData['0']['user']['id_no'] }}, <strong>Month :</strong> {{ $month }}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Attendence Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $value)
                            <tr>
                                <td width="50%">{{ date('d-m-Y', strtotime($value->date)) }}</td>
                                <td>{{ $value->attend_status }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                <strong>Total Absent: </strong> {{ $absents }}, <strong>Total Leave :</strong> {{ $leaves }}
                            </td>
                        </tr>
                    </tbody>
                </table><br>
                <i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
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
                        <p style="text-align: center;">Principal/Headmaster</p>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="border: dashed 1px; width: 96%; mb-5">


</body>
</html>

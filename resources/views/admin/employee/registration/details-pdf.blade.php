<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
                        <td class="col-md-4"><img src="{{ asset('uploads/employee/'.$details->image) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Employee Registration Card</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">
                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 50%">Employee Name</td>
                            <td>{{ $details->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Father's Name</td>
                            <td>{{ $details->fname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Mother's Name</td>
                            <td>{{ $details->mname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Mobile No</td>
                            <td>{{ $details->mobile }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Address</td>
                            <td>{{ $details->address }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">ID No</td>
                            <td>{{ $details->id_no }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Gender</td>
                            <td>{{ $details->gender }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Relogion</td>
                            <td>{{ $details->religion }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Date Of Birth</td>
                            <td>{{ date('d-m-Y', strtotime($details->dob)) }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Degignation</td>
                            <td>{{ $details->degignation->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Join Date</td>
                            <td>{{ date('d-m-Y', strtotime($details->join_date)) }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Salary</td>
                            <td>{{ $details->salary }}</td>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Exam Fee</title>

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
                        <td class="col-md-4"><img src="{{ asset('uploads/student/'.$details->student->image) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Student Monthly Card</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">
                @php
            $registrationfee = App\Models\FeeAmount::where('fee_category_id', '3')->where('class_id', $details->class_id)->first();
            $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (int)$originalfee-(int)$discountablefee;
                @endphp
                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 50%">ID No</td>
                            <td>{{ $details->student->id_no }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Roll No</td>
                            <td>{{ $details->roll }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Student Name</td>
                            <td>{{ $details->student->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Father's Name</td>
                            <td>{{ $details->student->fname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Mother's Name</td>
                            <td>{{ $details->student->mname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Class</td>
                            <td>{{ $details->class->name }}</td>
                        </tr>

                        <tr>
                            <td style="width: 50%">Year</td>
                            <td>{{ $details->year->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Exam Fee</td>
                            <td>{{ $originalfee }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Discount Fee</td>
                            <td>{{ $discount }}%</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Fee (The Student) of {{ $exam_name }}</td>
                            <td>{{ $finalfee }} Rs</td>
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
                        <td class="col-md-4"><img src="{{ asset('uploads/student/'.$details->student->image) }}" style="width: 100px; height: 100px" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5 style="font-weight: bold; padding-top: 25px">Student Exam Fee</h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12">
                @php
            $registrationfee = App\Models\FeeAmount::where('fee_category_id', '3')->where('class_id', $details->class_id)->first();
            $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (int)$originalfee-(int)$discountablefee;
                @endphp
                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 50%">ID No</td>
                            <td>{{ $details->student->id_no }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Roll No</td>
                            <td>{{ $details->roll }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Student Name</td>
                            <td>{{ $details->student->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Father's Name</td>
                            <td>{{ $details->student->fname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Mother's Name</td>
                            <td>{{ $details->student->mname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Class</td>
                            <td>{{ $details->class->name }}</td>
                        </tr>

                        <tr>
                            <td style="width: 50%">Year</td>
                            <td>{{ $details->year->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Exam Fee</td>
                            <td>{{ $originalfee }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Discount Fee</td>
                            <td>{{ $discount }}%</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Fee (The Student) of {{ $exam_name }}</td>
                            <td>{{ $finalfee }} Rs</td>
                        </tr>
                    </tbody>
                </table>
                <i>Print Date: {{ date('d M Y') }}</i>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

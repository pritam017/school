<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>

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
                        <td class="col-md-4">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 m-auto">
                <h5 style="font-weight: bold; padding-top: 25px;">Results of {{ $allData[0]['exam_type']['exam_type'] }}</h5>
            </div>

        </div> <br>
        <div class="col-md-12">
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td><strong>Year/Session : </strong>{{ @$allData[0]['year']['name'] }}</td>
                        <td></td>
                        <td></td>
                        <td><strong>Class : </strong>{{ @$allData[0]['class']['name'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div> <br>
        <div class="col-md-12">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th width="5%">S/L</th>
                        <th>Student Name</th>
                        <th>ID No</th>
                        <th class="10%">Letter Grade</th>
                        <th class="10%">Grade Point</th>
                        <th class="15%">Remarks</th>
                    </tr>
                </thead>
                @foreach ($allData as $key => $data)

                @php
                $allMarks = App\Models\StudentMarks::where('year_id', $data->year_id)->where('class_id', $data->class_id)->where('exam_type_id', $data->exam_type_id)->where('student_id', $data->student_id)->get();
                $total_marks = 0;
                $total_point = 0;
                    foreach ($allMarks as $data){
                    $count_fail = App\Models\StudentMarks::where('year_id', $data->year_id)->where('class_id', $data->class_id)->where('exam_type_id', $data->exam_type_id)->where('student_id', $data->student_id)->where('marks','<','33')->get()->count();
                    $get_mark = $data->marks;
                    $grade_marks = App\Models\Model\MarksGrade::where([['start_marks','<=',(int)$get_mark],['end_marks','>=',(int)$get_mark]])->first();
                    $grade_name = $grade_marks->grade_name;
                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                    $total_point = (float)$total_point+(float)$grade_point;
                    }
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data['student']['name'] }}</td>
                        <td>{{ $data['student']['id_no'] }}</td>
                        @php
                       $total_subject = App\Models\StudentMarks::where('year_id', $data->year_id)->where('class_id', $data->class_id)->where('exam_type_id', $data->exam_type_id)->where('student_id', $data->student_id)->get()->count();
                       $total_grade = 0;
                       $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                       $total_grade = App\Models\Model\MarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
                       $grade_point_avg = (float)$total_point/(float)$total_subject;
                        @endphp
                        <td>
                            @if ($count_fail > 0)
                            F
                            @else
                            {{ $total_grade->grade_name }}
                            @endif
                        </td>
                        <td>
                            @if ($count_fail > 0)
                            0.00
                            @else
                            {{ number_format((float)$grade_point_avg,2)}}
                            @endif
                        </td>
                        <td>
                            @if ($count_fail > 0)
                           Fail
                            @else
                            {{ $total_grade->remarks}}
                            @endif
                        </td>

                    </tr>
                <tbody>

                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="border: dashed 1px; width: 96%; mb-5">
        <div class="col-md-12">
            <i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
        </div>
</body>
</html>

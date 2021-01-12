<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID Card</title>

</head>
<body>
    <div class="container">
        @foreach ($allData as $data)
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-3" style="border: 1px solid #000; margin: 0px 110px 0px 110px">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="30%" style="padding: 10px">
                                <img src="{{ asset('uploads/school.jpg') }}" style="height: 73px; width: 63px; border-radious: 5px;" alt="">
                            </td>
                            <td width="40%" class="text-center">
                                <p style="color:red; font-size: 20px; margin-bottom: 5px !important"><strong>Pacific School</strong></p>
                                <p style="padding: 5px; font-size: 20px;" class="btn btn-primary">Student ID Card</p>
                            </td>
                            <td width="30%" class="text-right" style="padding: 10px">
                                <img src="{{ asset('uploads/students/'.$data['student']['image']) }}" style="height: 73px; width: 63px; border-radious: 5px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%" style="10px 3px 10px 5px"><p style="font-size: 16px">
                            <strong>Name: </strong> {{ $data['student']['name'] }} </p>
                            </td>
                            <td width="10%" style="10px 3px 10px 5px"></td>
                            <td width="45%" style="10px 3px 10px 5px"><p style="font-size: 16px">
                                <strong>ID No: </strong> {{ $data['student']['id_no'] }} </p>
                                </td>
                        </tr>
                        <tr>
                            <td width="40%" style="10px 3px 10px 5px"><p style="font-size: 16px">
                            <strong>Session: </strong> {{ $data['year']['name'] }} </p>
                            </td>
                            <td width="20%" style="10px 3px 10px 5px"><strong>Class: </strong>{{ $data['class']['name'] }}</td>
                            <td width="40%" style="10px 3px 10px 5px"><p style="font-size: 16px">
                                <strong>Roll: </strong> {{ $data->roll->roll }} </p>
                                </td>
                        </tr>
                        <tr>
                            <td width="33%" style="15px 3px 5px 3px"></td>
                            <td width="33%" style="15px 3px 5px 3px"></td>
                            <td width="33%" style="15px 3px 5px 3px"></td>
                        </tr>
                        <tr>
                            <td width="50%" style="10px 3px 10px 5px"><p style="font-size: 16px">
                                <strong>Mobile No: </strong> {{ $data['student']['mobile'] }} </p>
                                </td>
                                <td></td>
                                <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <hr style="border: 1px; width: 50%; color: #000; margin-bottom: 0px; margin-left: 290px;">
                                <p class="text-center">Head Master</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>

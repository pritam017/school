
@extends('admin.app')
@section('title', 'Manage Grade Point')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Grade Point <a href="{{ route('grade.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Grade Point</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Grade Name</th>
                    <th>Grade Point</th>
                    <th>Start Marks</th>
                    <th>End Marks</th>
                    <th>Point Range</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr class="{{ $value->id }}">
                    <td>{{ $key+1 }}</td>
                    <td> {{ $value->grade_name}}</td>
                    <td> {{ number_format((float)$value->grade_point,2) }}</td>
                    <td> {{ $value->start_marks}}</td>
                    <td> {{ $value->end_marks}}</td>
                    <td> {{ number_format((float)$value->grade_point,2)}} - {{ ($value->grade_point == 5)?(number_format((float)$value->grade_point,2)):(number_format((float)$value->grade_point+1,2)-(float)0.01)}}</td>
                    <td> {{ $value->remarks}}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('grade.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


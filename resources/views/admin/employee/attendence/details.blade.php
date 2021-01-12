
@extends('admin.app')
@section('title',  'All Employee Attendence' )
@section('content')

<div class="container">
    <div class="card-header">
        <h3>All Employee Attendence <a href="{{ route('employeeAttendence.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Employee Leave List</a></h3>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Employee Name</th>
                <th>Id No</th>
                <th>Attendence Status</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($details as $key =>$value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->user->name }}</td>
                <td>{{ $value->user->id_no }}</td>
                <td>{{ $value->attend_status }}</td>
                <td> {{ date('d-m-Y',strtotime($value->date))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@push('js')

@endpush

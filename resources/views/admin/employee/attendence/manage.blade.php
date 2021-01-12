
@extends('admin.app')
@section('title', 'Manage Employee Attendence')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Employee Attendence <a href="{{ route('employeeAttendence.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Employee Attendence</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr class="{{ $value->id }}">
                    <td>{{ $key+1 }}</td>
                    <td> {{ date('d-m-Y',strtotime($value->date))}}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('employee.attendence.edit', $value->date) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                         <a href="{{ route('employee.attendence.details', $value->date) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


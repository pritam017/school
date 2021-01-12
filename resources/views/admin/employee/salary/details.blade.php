
@extends('admin.app')
@section('title', 'Manage Employee Salary')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Employee Salary Details Info <a href="{{ route('employeeReg.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Employee List</a></h3>
    </div>
    <strong>Employee Name: </strong>{{ $details->name }}
    <strong>Employee ID No: </strong>{{ $details->id_no }}
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Previous Salary</th>
                <th>Increments Salary</th>
                <th>Present Salary</th>
                <th>Effected Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salary_log as $key =>$value)
            <tr>
                @if ($key == "0")
                <td colspan="5" class="text-center"><strong>Joining Salary:</strong>{{$value->previous_salary  }}</td>
                @else
                <td>{{ $key+1 }}</td>
                <td>{{ $value->previous_salary }}</td>
                <td>{{ $value->increment_salary }}</td>
                <td>{{ $value->present_salary }}</td>
                <td>{{ date('d-m-Y', strtotime($value->effected_date)) }}</td>
                @endif
            <td>{{ $value->salary }}</td>
                <td>
                    <div class="btn-group">
                     <a title="Salary Increment" href="{{ route('employeeSalary.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i></a>
                     <a href="{{ route('employeeSalary.details', $value->id) }}" title="Salary View"  class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    </div>
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



@extends('admin.app')
@section('title', 'Manage Employee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Employee <a href="{{ route('employeeReg.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Employee</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Employee Name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Id No</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Join Date</th>
                    @if (Auth::user()->user_role == 1)
                    <th>Code</th>
                    @endif
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->mobile }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->id_no }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->join_date)) }}</td>
                    @if (Auth::user()->user_role == 1)
                <td>{{ $value->code }}</td>
                @endif
                <td>{{ $value->salary }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('employeeReg.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                         <a href="{{ route('employeeSalary.details', $value->id) }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


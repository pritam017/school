
@extends('admin.app')
@section('title', 'Manage Employee Salary')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Employee Salary</h3>
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


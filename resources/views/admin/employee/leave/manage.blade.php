
@extends('admin.app')
@section('title', 'Manage Employee Leave')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Employee Leave <a href="{{ route('employeeLeave.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Employee Leave</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Employee Name</th>
                    <th>Id No</th>
                    <th>Purpose</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->user->id_no }}</td>
                    <td>{{ $value->purpose->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->start_date)) }} to {{ date('d-m-Y', strtotime($value->end_date)) }}</td>

                    <td>
                        <div class="btn-group">
                         <a href="{{ route('employeeLeave.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


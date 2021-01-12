
@extends('admin.app')
@section('title', 'Student Shift')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Shift <a href="{{ route('setupStudentShift.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Shift</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Shift Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shifts as $key =>$shift)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $shift->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentShift.edit', $shift->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>


                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


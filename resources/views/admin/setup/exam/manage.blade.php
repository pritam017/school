
@extends('admin.app')
@section('title', 'Student Fee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Fee <a href="{{ route('setupStudentFee.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Fee</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Fee Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $key =>$fee)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fee->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentFee.edit', $fee->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


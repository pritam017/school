
@extends('admin.app')
@section('title', 'Student Year')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Year <a href="{{ route('setupStudentYear.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Year</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($years as $key =>$year)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $year->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentYear.edit', $year->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


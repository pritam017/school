
@extends('admin.app')
@section('title', 'Subject')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Subject <a href="{{ route('setupStudent.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Subject</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Subject Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key =>$std)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $std->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudent.edit', $std->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


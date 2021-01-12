
@extends('admin.app')
@section('title', 'Assign Subject')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Assign Subject<a href="{{ route('setupAssignSubject.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Assign Subject</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Class Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assign_subject as $key =>$fee)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fee->class->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('assign.show', $fee->class_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                         <a href="{{ route('assign.edit', $fee->class_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


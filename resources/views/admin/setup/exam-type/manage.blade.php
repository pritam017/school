
@extends('admin.app')
@section('title', 'Exam Type')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Exam Type <a href="{{ route('setupStudentExamType.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Exam Type</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Exam Type Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exam_types as $key =>$exam)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $exam->exam_type }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentExamType.edit', $exam->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


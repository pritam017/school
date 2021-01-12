
@extends('admin.app')
@section('title', 'Student class')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Class <a href="{{ route('setupStudentClass.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Class</a></h3>
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
                @foreach ($classes as $key =>$class)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentClass.edit', $class->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                         <form id="delete_from_{{$class->id}}" method="POST" action="{{ route('setupStudentClass.update', $class->id) }}">
                             @csrf
                             @method('DELETE')
                             <a href="javascript:void(0);" data-id="{{$class->id}}" class="_delete_data btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                         </form>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection


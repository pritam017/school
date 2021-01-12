
@extends('admin.app')
@section('title', 'Student Group')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Group <a href="{{ route('setupStudentGroup.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Group</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $key =>$group)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupStudentGroup.edit', $group->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>


                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection



@extends('admin.app')
@section('title', 'User View')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All User <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add New</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key =>$user)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->code }}</td>
                    <td>
                       <div class="btn-group">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                        <form id="delete_from_{{$user->id}}" method="POST" action="{{ route('user.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:void(0);" data-id="{{$user->id}}" class="_delete_data btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </form>
                       </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#SL</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
</div>
@endsection



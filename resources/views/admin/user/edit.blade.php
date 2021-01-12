
@extends('admin.app')
@section('title', 'Edit User')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add User</h3>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">User Role</label>
            <select name="role" class="form-control" id="">
                <option value="">Select Role</option>
                <option value="Admin"{{ $user->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                <option value="Operator" {{ $user->role == 'Operator' ? 'selected' : '' }}>Operator</option>
            </select>
          </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
          <input type="submit" value="Update User" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection


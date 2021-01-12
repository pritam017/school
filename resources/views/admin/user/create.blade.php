
@extends('admin.app')
@section('title', 'Add User')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add User</h3>
    </div>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">User Role</label>
            <select name="role" class="form-control" id="">
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Operator">Operator</option>
            </select>
          </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
                {{ ($errors->has('email')) ? ($errors->first('email')): '' }}
              </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Add User" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection


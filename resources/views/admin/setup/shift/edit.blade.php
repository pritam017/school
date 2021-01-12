
@extends('admin.app')
@section('title', 'Update Shift')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Shift <a href="{{ route('setupStudentShift.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Shift List</a></h3>
    </div>
    <form action="{{ route('setupStudentShift.update', $shift->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Shift Name</label>
          <input type="text" name="name" value="{{ $shift->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Shift" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection


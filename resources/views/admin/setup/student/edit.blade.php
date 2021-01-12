
@extends('admin.app')
@section('title', 'Update Subject')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Subject <a href="{{ route('setupStudent.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Subject List</a></h3>
    </div>
    <form action="{{ route('setupStudent.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Subject Name</label>
          <input type="text" name="name" value="{{ $student->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Subject" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection



@extends('admin.app')
@section('title', 'Add Class')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Class <a href="{{ route('setupStudentClass.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Class List</a></h3>
    </div>
    <form action="{{ route('setupStudentClass.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="exampleFormControlInput1">Class Name</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Class" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection


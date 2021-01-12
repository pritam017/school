
@extends('admin.app')
@section('title', 'Add Group')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Group <a href="{{ route('setupStudentGroup.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Group List</a></h3>
    </div>
    <form action="{{ route('setupStudentGroup.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Group Name</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Group" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection


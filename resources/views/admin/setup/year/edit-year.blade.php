
@extends('admin.app')
@section('title', 'Update Year')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Year <a href="{{ route('setupStudentYear.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Year List</a></h3>
    </div>
    <form action="{{ route('setupStudentYear.update', $year->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Year</label>
          <input type="text" name="name" value="{{ $year->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Class" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection

